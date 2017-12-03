<?php

namespace App\Http\Controllers;

use App\Classes\TicketClass;
use App\Http\Requests\AdminSendMessageRequest;
use App\Http\Requests\AdminSendTicketRequest;
use App\Http\Requests\AdminUpdateStatusPriorityRequest;
use App\Repositories\AdminRepository;
use App\Repositories\TicketRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/**
 * @property AdminRepository AdminRepository
 * @property TicketRepository TicketRepository
 * @property TicketClass TicketClass
 */
class AdminTicketController extends Controller
{
    public function __construct(AdminRepository $adminRepository, TicketRepository $ticketRepository, TicketClass $ticketClass)
    {
        $this->middleware('admin_auth');

        $this->AdminRepository = $adminRepository;

        $this->TicketRepository = $ticketRepository;

        $this->TicketClass = $ticketClass;
    }

    public function showNewTicket()
    {
        $projects = $this->AdminRepository->getAllProjects();

        $statuses = $this->AdminRepository->getAllStatuses();

        $priorities = $this->AdminRepository->getAllPriorities();

        return view('admin_ticket.new-ticket', compact([
            'projects',
            'statuses',
            'priorities',
        ]));
    }

    public function newTicket(AdminSendTicketRequest $adminSendTicketRequest)
    {
        $adminId = Auth::guard('web_admin')->user()->id;

        $ticketId = $this->TicketRepository->insertAdminTicket($adminSendTicketRequest, $adminId);

        Session::flash('message', 'درخواست جدید با موفقیت ثبت شد!');

        return redirect()->action('AdminTicketController@showReplyTicket', $ticketId);
    }

    public function showAllTickets()
    {
        $departmentId = Auth::guard('web_admin')->user()->department;

        $allTickets = $this->TicketRepository->getAllAdminTickets($departmentId);

        return view('admin_ticket.all-ticket', compact('allTickets'));
    }

    public function showReplyTicket($ticketId)
    {
        $ticketSender = $this->TicketRepository->getTicketSender($ticketId);

        $ticketInfo = $this->TicketRepository->getTicketInfo($ticketId, $ticketSender->id);

        $allMessagesCount = $this->TicketRepository->getAllMessagesCount($ticketId);

        $ticketInvoice = $this->TicketRepository->getTicketInvoice($ticketId, $ticketSender->id);

        $statuses = $this->AdminRepository->getAllStatuses();

        $priorities = $this->AdminRepository->getAllPriorities();

        $allTicketMessages = $this->TicketRepository->getAllAdminTicketMessages($ticketId);

        return view('admin_ticket.reply-ticket', compact([
            'ticketSender',
            'ticketInfo',
            'allMessagesCount',
            'ticketInvoice',
            'statuses',
            'priorities',
            'allTicketMessages',
        ]));
    }

    public function sendReplyTicket($ticketId, AdminSendMessageRequest $adminSendMessageRequest)
    {
        $url = $adminSendMessageRequest->fullUrl();

        $is_admin = Auth::guard('web_admin')->user()->id;

        $contentId = $this->TicketRepository->insertAdminTicketMessage($ticketId, $is_admin, $adminSendMessageRequest);

        $userTicketUrl = url('/'). '/tickets/' .$ticketId;

        if ($adminSendMessageRequest->hasFile('attachment_file'))
        {
            $inputName = 'attachment_file';

            //SAVE FILE TO DISK FROM REQUEST
            $attachedFile = $this->TicketClass->saveAdminAttachmentFileToDisk(
                $adminSendMessageRequest, $inputName, $contentId
            );

            $extension = $attachedFile['extension'];
            $fileName = $attachedFile['fileName'];
            $originalFileName = $attachedFile['originalFileName'];
            $fileUrl = $attachedFile['fileUrl'];

            //INSERT FILE INFORMATION TO DATABASE
            $this->TicketRepository->insertTicketAttachment(
                $contentId, $extension, $fileName, $originalFileName, $fileUrl
            );
        }

        //NOTIFY USER AFTER ADMIN REPLY TO TICKET VIA EMAIL
//         $this->TicketClass->notifyUserViaEmailForNewReply($contentId, $userTicketUrl);

        //NOTIFY USER AFTER ADMIN REPLY TO TICKET VIA TELEGRAM
        $this->TicketClass->notifyUserViaTelegramForNewReply($contentId, $userTicketUrl);

        Session::flash('message', 'پیغام شما با موفقیت ارسال شد!');

        return redirect($url);
    }

    public function downloadAttachmentFile($attachmentId)
    {
        if (! $fileInfo = $this->TicketClass->downloadAttachment($attachmentId))
            return redirect()->back()->with('message', 'در حال حاضر امکان دریافت فایل وجود ندارد! کد خطا(0)');

        return response()->download(
            storage_path($fileInfo->file_url . $fileInfo->filename), $fileInfo->original_filename
        );
    }

    public function ticketUpdateStatusPriority($ticketId, AdminUpdateStatusPriorityRequest $adminUpdateStatusPriorityRequest)
    {
        $ticketStatus = $adminUpdateStatusPriorityRequest->status_select;

        $ticketPriority = $adminUpdateStatusPriorityRequest->priority_select;

        $this->TicketRepository->updateTicketStatus($ticketId, $ticketStatus);

        $this->TicketRepository->updateTicketPriority($ticketId, $ticketPriority);

        Session::flash('message', 'وضعیت درخواست با موفقیت بروزرسانی شد!');

        return redirect()->back();
    }

    public function deleteContent($contentId)
    {
        $this->TicketRepository->deleteContentById($contentId);

        Session::flash('message', 'پیغام مورد نظر با موفقیت حذف شد!');

        return redirect()->back();
    }

    public function deleteTicket($ticketId)
    {
        $this->TicketRepository->deleteTicketById($ticketId);

        Session::flash('message', 'درخواست مورد نظر با موفقیت حذف گردید!');

        return redirect()->back();
    }

}
