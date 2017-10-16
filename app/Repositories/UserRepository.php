<?php

namespace App\Repositories;
use App\Project;
use Illuminate\Support\Facades\DB;

/**
 * Class UserRepository
 *
 * @package \\${NAMESPACE}
 */
class UserRepository
{
    public function getNewMessagesCount($userId)
    {
        $newMessages = DB::table('tickets')
            ->where('sender', $userId)
            ->where('status', 8)
            ->count();

        return $newMessages;
    }


    public function getUnpaidInvoicesCount($userId)
    {
        $unpaidInvoices = DB::table('invoices')
            ->where('owner', $userId )
            ->where('status', 7)
            ->count();

        return $unpaidInvoices;
    }

    public function getAllMessagesCount($userId)
    {
        $allMessages = DB::table('contents')
            ->where('owner', $userId)
            ->count();

        return $allMessages;
    }

    public function getAllProjectsCount($userId)
    {
        $allProjects = DB::table('projects')
            ->where('owner', $userId)
            ->count();

        return $allProjects;
    }

    public function getProjectDetails($userId)
    {
        $allProjects = DB::table('projects')
            ->join('statuses', 'projects.status', 'statuses.id')
            ->where('owner', $userId)
            ->select(
                'projects.id',
                'projects.title',
                'projects.created_fa',
                'statuses.color_code',
                'statuses.fa_name')
            ->orderBy('projects.created_fa', 'desc')
            ->get();

        return $allProjects;
    }

    public function getTicketDetails($userId)
    {
        /*$ticketContentsId = DB::table('contents')
            ->where('owner', $userId)
            ->select('ticket_id')
            ->get();

        $ticketDetails = DB::table('tickets')
            ->select('tickets.*', 'statuses.fa_name')
            ->where('tickets.sender', $userId)
            ->whereIn('contents.ticket_id', $ticketContentsId->pluck('ticket_id')->unique())
            ->join('statuses', 'tickets.status', 'statuses.id')
            ->join('contents', function ($join) {
                $join->on('contents.ticket_id', '=', 'tickets.id');
            })
            ->groupBy('tickets.id')
            ->get();*/

        $ticketDetails = DB::table('tickets')
            ->join('statuses', 'tickets.status', 'statuses.id')
            ->where('tickets.sender', $userId)
            ->select('tickets.id as id', 'tickets.title', 'tickets.reference_number', 'tickets.updated_fa',
                'statuses.id as status', 'statuses.fa_name', 'statuses.color_code')
            ->groupBy('tickets.id')
            ->orderBy('updated_fa', 'desc')
            ->take(10)
            ->get();

        return $ticketDetails;
    }

}