<?php

namespace App\Repositories;

use App\Admin;
use App\Content;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Requests\UpdateAdminProfileRequest;
use App\Ticket;
use App\User;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\DB;

/**
 * Class AdminRepository
 *
 * @package \App\Repositories
 */
class AdminRepository
{
    public function getUsersCount()
    {
        $usersCount = DB::table('users')
            ->count();

        return $usersCount;
    }

    public function getNewMessagesCount($departmentId)
    {
        $newMessagesCount = DB::table('tickets')
            ->where('status', 1)
            ->where('department', $departmentId)
            ->count();

        return $newMessagesCount;
    }

    public function getUnpaidInvoicesCount()
    {
        $unpaidInvoicesCount = DB::table('invoices')
            ->where('status', 7)
            ->count();

        return $unpaidInvoicesCount;
    }

    public function getProjectsCount()
    {
        $projectsCount = DB::table('projects')
            ->count();

        return $projectsCount;
    }

    public function insertUser(AddUserRequest $addUserRequest)
    {
        DB::table('users')
            ->insert([
                'fname' => $addUserRequest->fname,
                'lname' => $addUserRequest->lname,
                'email' => $addUserRequest->email,
                'password' => bcrypt($addUserRequest->password),
                'role' => 1,
                'phone' => $addUserRequest->phone,
                'ip_address' => '0.0.0.0',
                'login_time' => null,
                'note' => $addUserRequest->note,
                'created_fa' => Verta::now(),
                'created_at' => Carbon::now(),
            ]);
    }

    public function getAllUsers()
    {
        $allUsers = DB::table('users')->orderBy('created_fa', 'desc')->get();

        return $allUsers;
    }

    public function getEditUser($userId)
    {
        $editUser = DB::table('users')
            ->where('id', $userId)
            ->first();

        return $editUser;
    }

    //Update Using Query Builder
    public function updateUser($userId, EditUserRequest $editUserRequest)
    {
        $user = User::find($userId);

        if(! empty($editUserRequest->password))
            $user->password = bcrypt($editUserRequest->password);

        DB::table('users')
            ->where('id', $userId)
            ->update([
                'fname' => $editUserRequest->fname,
                'lname' => $editUserRequest->lname,
                'email' => $editUserRequest->email,
                'password' => $user->password,
                'phone' => $editUserRequest->phone,
                'telegram' => $editUserRequest->telegramChatId,
                'telegram_number' => $editUserRequest->telegramNumber,
                'telegram_user' => $editUserRequest->telegramUsername,
                'note' => $editUserRequest->note,
                'updated_at' => Carbon::now(),
            ]);
    }

    //Update Using Laravel Eloquent
    public function updateAdminProfile($adminId, UpdateAdminProfileRequest $updateAdminProfileRequest)
    {
        $admin = Admin::findOrFail($adminId);

        if(! empty($updateAdminProfileRequest->password))
            $admin->password = bcrypt($updateAdminProfileRequest->password);

        $admin->fname = $updateAdminProfileRequest->fname;

        $admin->lname = $updateAdminProfileRequest->lname;

        $admin->email = $updateAdminProfileRequest->email;

        $admin->phone = $updateAdminProfileRequest->phone;

        $admin->note = $updateAdminProfileRequest->note;

        $admin->telegram = $updateAdminProfileRequest->telegramChatId;

        $admin->telegram_number = $updateAdminProfileRequest->telegramNumber;

        $admin->telegram_user = $updateAdminProfileRequest->telegramUsername;

        $admin->save();
    }

    public function getAdminStatistics($adminId)
    {
        $adminStatistics =
            [
                'adminTicketCount' => Ticket::where('is_admin', $adminId)->count(),
                'adminContentCount' => Content::where('is_admin', $adminId)->count(),
            ];

        return $adminStatistics;
    }

    public function getAllProjects()
    {
        $allProjects = DB::table('projects')
            ->orderBy('created_fa', 'desc')
            ->get();

        return $allProjects;
    }

    public function getAllStatuses()
    {
        $allStatuses = DB::table('statuses')
            ->orderBy('id', 'asc')
            ->get();

        return $allStatuses;
    }

    public function getAllPriorities()
    {
        $allPriorities = DB::table('priorities')
            ->orderBy('id', 'asc')
            ->get();

        return $allPriorities;
    }
}