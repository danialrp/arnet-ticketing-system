@extends('admin_layout.master')

@section('title', 'ویرایش کاربر')

@section('title-content','مدیریت کاربران')

@section('title-content-sub', 'ویرایش اطلاعات کاربری')

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $user->fname. " " .$user->lname }}</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" autocomplete="off" action="{{ action('AdminUserController@editUser', $user->id) }}">
            {{ csrf_field() }}
            <div class="box-body">

                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="InputEmail">نام</label>
                        <input name="fname" type="text" class="form-control" id="InputEmail" placeholder="نام" value="{{ $user->fname }}">
                    </div>
                    <div class="form-group col-xs-6">
                        <label for="InputPassword">نام خانوادگی</label>
                        <input name="lname" type="text" class="form-control" id="InputPassword" placeholder="نام خانوادگی" value="{{ $user->lname }}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="InputEmail">ایمیل</label>
                        <input dir="ltr" name="email" type="text" class="form-control" id="InputEmail" placeholder="ایمیل" value="{{ $user->email }}">
                    </div>
                    <div class="form-group col-xs-6">
                        <label for="InputPassword">کلمه عبور</label>
                        <input name="password" type="password" class="form-control" id="InputPassword" placeholder="کلمه عبور" autocomplete="off">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="phone_number">تلفن</label>
                        <input dir="ltr" name="phone" type="text" class="form-control" id="phone_number" placeholder="تلفن" value="{{ $user->phone }}">
                    </div>
                    <div class="form-group col-xs-6">
                        <label for="note">یادداشت</label>
                        <input name="note" type="text" class="form-control" id="note" placeholder="یادداشت(اختیاری)" value="{{ $user->note }}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-xs-4">
                        <label for="telegram_chat_id">شناسه تلگرام</label>
                        <input dir="ltr" name="telegramChatId" type="text" class="form-control" id="telegram_chat_id" placeholder="شناسه تلگرام" value="{{ $user->telegram }}">
                    </div>
                    <div class="form-group col-xs-4">
                        <label for="telegram_username">نام کاربری تلگرام</label>
                        <input dir="ltr" name="telegramUsername" type="text" class="form-control" id="telegram_username" placeholder="نام کاربری تلگرام" value="{{ $user->telegram_user }}">
                    </div>
                    <div class="form-group col-xs-4">
                        <label for="telegram_number">شماره تلگرام</label>
                        <input dir="ltr" name="telegramNumber" type="text" class="form-control" id="telegram_number" placeholder="شماره تلگرام" value="{{ $user->telegram_number }}">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">بروزرسانی کاربر</button>
            </div>
        </form>
    </div>
    <!-- /.box -->

@endsection