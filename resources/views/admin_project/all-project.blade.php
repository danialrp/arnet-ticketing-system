@extends('admin_layout.master')

@section('title', 'مدیریت پروژه')

@section('title-content','مدیریت پروژه')

@section('title-content-sub','لیست پروژه‌ها')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">پروژه‌ها</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="projects-table" class="table table-bordered table-hover">
                        <thead bgcolor="#fbfbfb">
                        <tr>
                            <th>عنوان</th>
                            <th>کاربر</th>
                            <th>وضعیت</th>
                            <th>تاریخ ثبت</th>
                            <th>یادداشت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allProjects as $allProject)
                            <tr>
                                <td><a href="{{ action('AdminProjectController@showEditProject', $allProject->project_id) }}">{{ $allProject->project_title }}</a></td>

                                <td>{{ $allProject->owner_fname. ' ' .$allProject->owner_lname }}</td>

                                <td><span class="label {{$allProject->status_color_code}}">{{ $allProject->status_fa_name }}</span></td>

                                <td>{{date('H:i - y/m/d ', strtotime($allProject->project_created_fa))}}</td>

                                <td>{{ $allProject->project_note }}</td>

                                <td>
                                    <a href="{{ action('AdminProjectController@showEditProject', $allProject->project_id) }}"
                                       class="btn btn-primary btn-xs">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot bgcolor="#fbfbfb">
                        <tr>
                            <th>عنوان</th>
                            <th>کاربر</th>
                            <th>وضعیت</th>
                            <th>تاریخ ثبت</th>
                            <th>یادداشت</th>
                            <th>عملیات</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>

@endsection