<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminAddProjectRequest;
use App\Http\Requests\AdminEditProjectRequest;
use App\Repositories\AdminRepository;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

/**
 * @property ProjectRepository ProjectRepository
 * @property AdminRepository AdminRepository
 */
class AdminProjectController extends Controller
{
    public function __construct(ProjectRepository $projectRepository, AdminRepository $adminRepository)
    {
        $this->middleware('admin_auth');

        $this->ProjectRepository = $projectRepository;

        $this->AdminRepository = $adminRepository;
    }

    public function showAllProjects()
    {
        $allProjects = $this->ProjectRepository->getAllProjects();

        return view('admin_project.all-project', compact('allProjects'));
    }

    public function showNewProject()
    {
        $allUsers = $this->ProjectRepository->getAllUsers();

        $statuses = $this->AdminRepository->getAllStatuses();

        return view('admin_project.new-project', compact([
            'allUsers',
            'statuses'
        ]));
    }

    public function newProject(AdminAddProjectRequest $adminAddProjectRequest)
    {
        $this->ProjectRepository->insertNewProject($adminAddProjectRequest);

        Session::flash('message', 'پروژه جدید با موفقیت ثبت شد!');

        return redirect()->action('AdminProjectController@showAllProjects');
    }

    public function showEditProject($projectId)
    {
        $projectInfo = $this->ProjectRepository->getProjectInfo($projectId);

        $statuses = $this->AdminRepository->getAllStatuses();

        $allUsers = $this->ProjectRepository->getAllUsers();

        return view('admin_project.edit-project', compact([
            'projectInfo',
            'statuses',
            'allUsers'
        ]));
    }

    public function editProject($projectId, AdminEditProjectRequest $adminEditProjectRequest)
    {
        $this->ProjectRepository->editProjectInfo($projectId, $adminEditProjectRequest);

        Session::flash('message', 'اطلاعات پروژه با موفقیت بروزرسانی گردید!');

        return redirect()->back();
    }
}
