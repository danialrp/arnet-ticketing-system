<?php

/**
 * Class TicketRepository
 *
 * @package \App\Repo
 */

namespace App\Repositories;
use App\Classes\TicketClass;
use App\Http\Requests\SendMessageRequest;
use Carbon\Carbon;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Support\Facades\DB;

/**
 * @property TicketClass TicketClass
 */

class TicketRepository
{
    public function __construct(TicketClass $ticketClass)
    {
        $this->TicketClass = $ticketClass;
    }

    public function getAllTickets($userId)
    {
        $allTickets = DB::table('tickets')
            ->join('statuses', 'tickets.status', 'statuses.id')
            ->join('priorities', 'tickets.priority', 'priorities.id')
            ->where('tickets.sender', $userId)
            ->select(
                'tickets.id as ticketId',
                'priorities.fa_name as priority_fa_name',
                'priorities.id as priorityId',
                'tickets.status as ticketStatusId',
                'tickets.*',
                'statuses.*')
            ->groupBy('tickets.id')
            ->orderBy('updated_fa', 'desc')
            ->paginate(10);

        return $allTickets;
    }

    public function getTicketInfo($ticketId, $userId)
    {
        $ticketInfo = DB::table('tickets')
            ->join('statuses', 'tickets.status', 'statuses.id')
            ->join('projects', 'tickets.project', 'projects.id')
            ->join('priorities', 'tickets.priority', 'priorities.id')
            ->where('tickets.id', $ticketId)
            ->where('tickets.sender', $userId)
            ->select(
                'tickets.id as id',
                'tickets.*',
                'statuses.fa_name',
                'statuses.color_code',
                'priorities.id as priorityId',
                'priorities.fa_name as priority_fa_name',
                'projects.title as project_title'
            )
            ->first();

        return $ticketInfo;
    }

    public function getAllMessagesCount($ticketId)
    {
        $allMessageCount = DB::table('contents')
            ->where('ticket_id', $ticketId)
            ->count();

        return $allMessageCount;
    }

    public function getTicketSender($ticketId)
    {
        $ticketSender = DB::table('tickets')
            ->join('users', 'tickets.sender', 'users.id')
            ->where('tickets.id', $ticketId)
            ->select('users.fname', 'users.lname')
            ->first();

        return $ticketSender;
    }

    public function getTicketInvoice($ticketId, $userId)
    {
        $ticketInvoice = DB::table('invoices')
            ->join('statuses', 'invoices.status', 'statuses.id')
            ->where('invoices.ticket_id', $ticketId)
            ->where('invoices.owner', $userId)
            ->select(
                'invoices.reference_number as reference_number',
                'statuses.fa_name as status',
                'statuses.color_code as color_code'
            )
            ->first();

        return $ticketInvoice;
    }

    public function getTicketDepartment($ticketId)
    {
        $ticketDepartment = DB::table('departments')
            ->join('tickets', 'tickets.department', 'departments.id')
            ->where('tickets.id', $ticketId)
            ->select('departments.fa_name as department_fa_name')
            ->first();

        return $ticketDepartment;
    }

    public function getAllTicketMessages($ticketId)
    {
        $allTicketMessages = DB::table('contents')
            ->join('tickets', 'contents.ticket_id', 'tickets.id')
            ->join('users', 'contents.owner', 'users.id')
            ->LeftJoin('attachments', 'contents.id', 'attachments.message_id')
            ->where('contents.ticket_id', $ticketId)
            ->select(
                'attachments.id as attachment_id',
                'attachments.*',
                'users.fname as fname',
                'users.lname as lname',
                'contents.id as message_id',
                'contents.body as message_body',
                'contents.created_fa as created_fa'
            )
            ->orderBy('contents.created_fa', 'desc')
            ->paginate(12);

        return $allTicketMessages;
    }

    public function insertTicketMessage($userId, $ticketId, SendMessageRequest $sendMessageRequest)
    {
        $contentId = DB::table('contents')->insertGetId([
            'owner' => $userId,
            'ticket_id' => $ticketId,
            'body' => $sendMessageRequest->message_body,
            'created_fa' => Verta::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $this->updateTicketUpdatedTime($ticketId);

        return $contentId;
    }

    public function updateTicketUpdatedTime($ticketId)
    {
        DB::table('tickets')
            ->where('id', $ticketId)
            ->update([
                'updated_fa' => Verta::now(),
                'updated_at' => Carbon::now()
            ]);
    }

    public function updateTicketStatus($ticktId, $statusId)
    {
        DB::table('tickets')
            ->where('id', $ticktId)
            ->update([
                'status' => $statusId
            ]);

        return true;
    }

    public function updateTicketPriority($ticketId, $priorityId)
    {
        // SET NOT SELECTED PRIORITY TO DEFAULT(NORMAL)
        if($priorityId == 0)
            $priorityId = 1;

        DB::table('tickets')
            ->where('id', $ticketId)
            ->update([
                'priority' => $priorityId
            ]);

        return true;
    }

    public function insertTicketAttachment($contentId, $extension, $fileName, $originalFileName, $fileUrl)
    {
        DB::table('attachments')
            ->insert([
                'message_id' => $contentId,
                'mime' => $extension,
                'filename' => $fileName,
                'original_filename' => $originalFileName,
                'file_url' => $fileUrl,
                'created_fa' => Verta::now(),
                'created_at' => Carbon::now()
            ]);

        return true;
    }

    public function getUserProjects($userId)
    {
        $userProjects = DB::table('projects')
            ->where('owner', $userId)
            ->select('id', 'title')
            ->orderBy('created_fa', 'desc')
            ->get();

        return $userProjects;
    }

    public function insertTicket($userId, $departmentId, $projectId, $title, $description, $priority, $status)
    {
        $refNumber = $this->TicketClass->generateReferenceNumber();

        $ticketId = DB::table('tickets')
            ->insertGetId([
                'sender' => $userId,
                'department' => $departmentId,
                'project' => $projectId,
                'title' => $title,
                'description' => $description,
                'priority' => $priority,
                'status' => $status,
                'reference_number' => $refNumber,
                'created_fa' => Verta::now(),
                'updated_fa' => Verta::now(),
                'created_at' => Carbon::now()
            ]);

        return $ticketId;
    }

}