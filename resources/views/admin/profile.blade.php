@extends('admin_layout.master')

@section('title', 'پروفایل مدیریت')

@section('title-content','پروفایل')

@section('title-content-sub','مشخصات کاربری مدیر')

@section('content')

    <div class="row">

        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('/back/img/user1-128x128.jpg') }}" alt="User profile picture">

                    <h3 class="profile-username text-center">{{ Auth::guard('web_admin')->user()->fname. ' ' .Auth::guard('web_admin')->user()->lname }}</h3>

                    <p class="text-muted text-center">{{ Auth::guard('web_admin')->user()->departmentAdmin->fa_name }}</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>درخواست‌های ارسالی</b> <a class="pull-right">{{ $adminStatistics['adminTicketCount'] }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>پاسخ‌ها</b> <a class="pull-right">{{ $adminStatistics['adminContentCount'] }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>آخرین ورود</b> <a class="pull-right">{{ Verta::parse(Auth::guard('web_admin')->user()->login_time)->format('l j %B %Y - H:i') }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>آدرس ip</b> <a class="pull-right">{{ Auth::guard('web_admin')->user()->ip_address }}</a>
                        </li>
                    </ul>

                    <a href="{{ action('AdminController@showDashboard') }}" class="btn btn-primary btn-block">بازگشت</a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>


        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#admin-profile" data-toggle="tab">مشخصات کاربری</a></li>
                    <li><a href="#admin-info" data-toggle="tab">سایر مشخصات</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="admin-profile">
                        <form role="form" method="post" autocomplete="off" action="{{ action('AdminController@updateProfile') }}">
                            {{ csrf_field() }}
                            <div class="box-body">

                                <div class="row">
                                    <div class="form-group col-xs-6">
                                        <label for="first-name">نام</label>
                                        <input name="fname" type="text" class="form-control" id="first-name" placeholder="نام"
                                               value="{{ Auth::guard('web_admin')->user()->fname }}">
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <label for="last-name">نام خانوادگی</label>
                                        <input name="lname" type="text" class="form-control" id="last-name" placeholder="نام خانوادگی"
                                               value="{{ Auth::guard('web_admin')->user()->lname }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-xs-6">
                                        <label for="email">ایمیل</label>
                                        <input dir="ltr" name="email" type="text" class="form-control" id="email" placeholder="ایمیل"
                                               value="{{ Auth::guard('web_admin')->user()->email }}">
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <label for="password">کلمه عبور</label>
                                        <input name="password" type="password" class="form-control" id="password" placeholder="کلمه عبور" autocomplete="off">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-xs-6">
                                        <label for="phone-number">تلفن</label>
                                        <input dir="ltr" name="phone" type="text" class="form-control" id="phone-number" placeholder="تلفن"
                                               value="{{ Auth::guard('web_admin')->user()->phone }}">
                                    </div>
                                    <div class="form-group col-xs-6">
                                        <label for="note">یادداشت</label>
                                        <input name="note" type="text" class="form-control" id="note" placeholder="یادداشت(اختیاری)"
                                               value="{{ Auth::guard('web_admin')->user()->note }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-xs-4">
                                        <label for="telegram_chat_id">شناسه تلگرام</label>
                                        <input dir="ltr" name="telegramChatId" type="text" class="form-control" id="telegram_chat_id" placeholder="شناسه تلگرام"
                                               value="{{ Auth::guard('web_admin')->user()->telegram }}">
                                    </div>
                                    <div class="form-group col-xs-4">
                                        <label for="telegram_username">نام کاربری تلگرام</label>
                                        <input dir="ltr" name="telegramUsername" type="text" class="form-control" id="telegram_username" placeholder="نام کاربری تلگرام"
                                               value="{{ Auth::guard('web_admin')->user()->telegram_user }}">
                                    </div>
                                    <div class="form-group col-xs-4">
                                        <label for="telegram_number">شماره تلگرام</label>
                                        <input dir="ltr" name="telegramNumber" type="text" class="form-control" id="telegram_number" placeholder="شماره تلگرام"
                                               value="{{ Auth::guard('web_admin')->user()->telegram_number }}">
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">بروزرسانی پروفایل</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="admin-info">
                        <p>اطلاعاتی برای نمایش وجود ندارد.</p>
                    </div>
                    <!-- /.tab-pane -->

                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->


    </div>

@endsection