<?php

namespace App\Repositories;
use App\Http\Requests\UpdateTelegramIdRequest;
use App\Http\Requests\UpdateUserPassword;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            ->where('deleted', 0)
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

    public function getUserProfile($userId)
    {

        $user = User::findOrFail($userId);

//        $telegramChatId = $user->telegram;

        $userProfile =
            [
                'telegramChatId' => $user->telegram,
                'telegramUsername' => $user->telegram_user,
                'telegramNumber' => $user->telegram_number,
            ];

        return $userProfile;
    }

    public function updateUserPass($userId, UpdateUserPassword $updateUserPassword)
    {
        $user = User::findOrFail($userId);

        if (Hash::check($updateUserPassword->old_password, $user->password)) {

            $user->password = bcrypt($updateUserPassword->new_password);

            $user->save();

            return true;
        }

        return false;
    }

    public function UpdateTelegram($userId, UpdateTelegramIdRequest $updateTelegramIdRequest)
    {
        $user = User::findOrFail($userId);

        $user->telegram = $updateTelegramIdRequest->telegramChatId;

        $user->telegram_number = $updateTelegramIdRequest->telegramNumber;

        $user->telegram_user = $updateTelegramIdRequest->telegramUsername;

        $user->save();

        return true;
    }

}