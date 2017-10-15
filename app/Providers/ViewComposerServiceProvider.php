<?php

namespace App\Providers;

use App\Admin;
use App\Department;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeHeader();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function composeHeader()
    {
        view()->composer('admin_partial.header', function ($view) {
            if (! Auth::guard('web_admin'))
                $view;

            $departmentFname = Department::where('id', Auth::guard('web_admin')->user()->department)
                ->select('fa_name')
                ->first();

            $adminRegisterFaDate = Admin::where('id', Auth::guard('web_admin')->user()->id)
                ->select('created_at')
                ->first();

            $AdminRegDate = new Verta($adminRegisterFaDate->created_at);

            $view->with([
                'departmentFname' => $departmentFname->fa_name,
                'adminRegisterFaDate' => $AdminRegDate->format('%B'. ' ماه ' .'%Y'),
            ]);
        });
    }
}
