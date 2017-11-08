@extends('admin_layout.master')

@section('title', 'کنترل پنل مدیریت')

@section('title-content','داشبورد')

@section('title-content-sub','کنترل پنل')

@section('content')

    <!-- Info boxes -->
    <div class="row">

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">کاربران سیستم</span>
                    <span class="info-box-number">{{ $dashboardInfo['usersCount'] }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion-email-unread"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">پیغام جدید</span>
                    <span class="info-box-number">{{ $dashboardInfo['newMessagesCount'] }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="ion-ios-albums-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">فاکتور پرداخت نشده</span>
                    <span class="info-box-number">{{ $dashboardInfo['unpaidInvoicesCount'] }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion-android-folder-open"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">پروژه</span>
                    <span class="info-box-number">{{ $dashboardInfo['projectsCount'] }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection