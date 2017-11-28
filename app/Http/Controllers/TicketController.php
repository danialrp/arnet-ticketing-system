<?php

namespace App\Http\Controllers;

use App\Classes\TicketClass;
use App\Http\Requests\SendMessageRequest;
use App\Http\Requests\SendTicketRequest;
use App\Repositories\TicketRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/**
 * @property TicketRepository TicketRepository
 * @property TicketClass TicketClass
 */

class TicketController extends Controller
{
    public function __construct(TicketRepository $ticketRepository, TicketClass $ticketClass)
    {
        $this->middleware('auth');

        $this->TicketRepository = $ticketRepository;

        $this->TicketClass = $ticketClass;
    }

    public function getAllTickets()
    {
        $allTickets = $this->TicketRepository->getAllTickets(Auth::user()->id);

        return view('ticket.all', compact('allTickets'));
    }

    public function replyTicket($ticketId)
    {
        $ticketInfo = $this->TicketRepository->getTicketInfo($ticketId, Auth::user()->id);

        $allMessagesCount = $this->TicketRepository->getAllMessagesCount($ticketId);

        $ticketSender = $this->TicketRepository->getTicketSender($ticketId);

        $ticketInvoice = $this->TicketRepository->getTicketInvoice($ticketId, Auth::user()->id);

        $ticketDepartment = $this->TicketRepository->getTicketDepartment($ticketId);

        $allTicketMessages = $this->TicketRepository->getAllTicketMessages($ticketId);

        $priorities = $this->TicketRepository->getAllPriorities();

        return view('ticket.reply', compact([
            'ticketInfo',
            'allMessagesCount',
            'ticketSender',
            'ticketInvoice',
            'ticketDepartment',
            'allTicketMessages',
            'priorities'
        ]));
    }

    public function sendReplyTicket($ticketId, SendMessageRequest $sendMessageRequest)
    {
        $url = $sendMessageRequest->fullUrl();

        $is_admin = 0;

        $ticketPriority = $sendMessageRequest->get('priority_select');

        $contentId = $this->TicketRepository->insertTicketMessage(
            Auth::user()->id, $ticketId, $is_admin, $sendMessageRequest
        );

        $adminTicketUrl = url('/'). '/admin/tickets/' .$ticketId;

        $this->TicketRepository->updateTicketStatus($ticketId, 1);

        $this->TicketRepository->updateTicketPriority($ticketId, $ticketPriority);

        if ($sendMessageRequest->hasFile('attachment_file'))
        {
            $inputName = 'attachment_file';

            //SAVE FILE TO DISK FROM REQUEST
            $attachedFile = $this->TicketClass->saveAttachmentFileToDisk(
                $sendMessageRequest, $inputName, $contentId
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

        //NOTIFY ADMIN AFTER USER REPLY TO TICKET VIA TELEGRAM
        $this->TicketClass->notifyAdminViaTelegramForNewReply($contentId, $adminTicketUrl);

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

    public function ticketDone($ticketId)
    {
        $ticketStatus = 5;
        $this->TicketRepository->updateTicketStatus($ticketId, $ticketStatus);

        return redirect()->back();
    }

    public function newTicket()
    {
        $userProjects = $this->TicketRepository->getUserProjects(Auth::user()->id);

        return view('ticket.new', compact('userProjects'));
    }

    public function sendNewTicket(SendTicketRequest $sendTicketRequest)
    {
        $userId = Auth::user()->id;
        $departmentId = 1;
        $projectId = $sendTicketRequest->projectId;
        $ticketTitle = $sendTicketRequest->ticket_title;
        $ticketDescription = $sendTicketRequest->ticket_description;
        $ticketPriority = 1;
        $ticketStatus = 1;

        $ticketId = $this->TicketRepository->insertTicket(
            $userId, $departmentId, $projectId, $ticketTitle, $ticketDescription, $ticketPriority, $ticketStatus
        );

        Session::flash('message', 'درخواست شما با موفقیت ثبت شد! اکنون می توانید پیغام خود را ارسال کنید.');

        return redirect()->action('TicketController@replyTicket', $ticketId);
    }
}
