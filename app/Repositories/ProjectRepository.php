<?php

namespace App\Repositories;

use App\Http\Requests\AdminAddProjectRequest;
use App\Http\Requests\AdminEditProjectRequest;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\DB;

/**
 * Class ProjectRepository
 *
 * @package \App\Repositories
 */
class ProjectRepository
{
    public function __construct()
    {

    }

    public function getAllProjects()
    {
        $allProjects = DB::table('projects')
            ->join('users', 'projects.owner', 'users.id')
            ->join('statuses', 'projects.status', 'statuses.id')
            ->select(
                'projects.id as project_id',
                'projects.title as project_title',
                'projects.created_fa as project_created_fa',
                'projects.note as project_note',
                'statuses.fa_name as status_fa_name',
                'statuses.color_code as status_color_code',
                'users.fname as owner_fname',
                'users.lname as owner_lname'
            )
            ->groupBy('projects.id')
            ->orderBy('projects.created_fa', 'desc')
            ->get();

        return $allProjects;
    }

    public function getAllUsers()
    {
        $allUsers = DB::table('users')
            ->where('role', 1)
            ->select('id', 'fname', 'lname')
            ->get();

        return $allUsers;
    }

    public function insertNewProject(AdminAddProjectRequest $adminAddProjectRequest)
    {
        DB::table('projects')
            ->insert([
                'title' => $adminAddProjectRequest->project_title,
                'owner' => $adminAddProjectRequest->user_select,
                'status' => $adminAddProjectRequest->status_select,
                'note' => $adminAddProjectRequest->project_note,
                'created_fa' => Verta::now(),
                'created_at' => Carbon::now()
            ]);
    }

    public function getProjectInfo($projectId)
    {
        $projectInfo = DB::table('projects')
            ->join('users', 'users.id', 'projects.owner')
            ->join('statuses', 'statuses.id', 'projects.status')
            ->where('projects.id', $projectId)
            ->select(
                'projects.id as project_id',
                'projects.title as project_title',
                'projects.note as project_note',
                'users.id as owner_id',
                'users.fname as owner_fname',
                'users.lname as owner_lname',
                'statuses.id as status_id',
                'statuses.fa_name as status_fa_name'
            )
            ->first();

        return $projectInfo;
    }

    public function editProjectInfo($projectId, AdminEditProjectRequest $adminEditProjectRequest)
    {
        DB::table('projects')
            ->where('id', $projectId)
            ->update([
                'title' => $adminEditProjectRequest->project_title,
                'note' => $adminEditProjectRequest->project_note,
                'status' => $adminEditProjectRequest->status_select,
                'owner' => $adminEditProjectRequest->user_select,
                'updated_at' => Carbon::now()
            ]);
    }
}