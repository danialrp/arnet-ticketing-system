@extends('admin_layout.master')

@section('title', 'مدیریت کاربران سیستم')

@section('title-content','مدیریت کاربران')

@section('title-content-sub','کاربران سیستم')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">کاربران</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="users-table" class="table table-bordered table-hover">
                        <thead bgcolor="#fbfbfb">
                        <tr>
                            <th>شناسه</th>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>ایمیل</th>
                            <th>تلفن</th>
                            <th>تاریخ عضویت</th>
                            <th>یادداشت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allUsers as $allUser)
                            <tr>
                                <td>{{ $allUser->id }}</td>
                                <td>{{ $allUser->fname }}</td>
                                <td>{{ $allUser->lname }}</td>
                                <td>{{ $allUser->email }}</td>
                                <td>{{ $allUser->phone }}</td>
                                <td>{{ date('H:i - y/m/d ', strtotime($allUser->created_fa ))}}</td>
                                <td>{{ $allUser->note }}</td>
                                <td>
                                    <a href="{{ action('AdminUserController@editUser', $allUser->id) }}"
                                       class="btn btn-primary btn-xs">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot bgcolor="#fbfbfb">
                        <tr>
                            <th>شناسه</th>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>ایمیل</th>
                            <th>تلفن</th>
                            <th>تاریخ عضویت</th>
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