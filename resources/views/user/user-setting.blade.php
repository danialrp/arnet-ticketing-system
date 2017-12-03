@extends('layout.master')

@section('title', 'پروفایل کاربری')

@section('content')

    <div class="row expanded padding-top-1">
        <div class="large-12 columns">
            <div class="row expanded grey-bg-4 grey-text-4 small-fontsize-2 bordered padding-vertical-0-5">
                <div class="large-12 columns">
                    <span class=""><i class="fa fa-unlock"></i> تغییر کلمه عبور </span>
                </div>
            </div>
            <div class="row expanded white-bg bordered-no-top padding-top-2">
                <div class="large-12 columns">
                    <form role="form" method="post" action="{{ action('UserController@updatePassword') }}">

                        {!! csrf_field() !!}

                        <div class="input-group">

                            <div class="large-12 padding-right-1">

                                <label for="" class="large-6 large-offset-3">کلمه عبور فعلی
                                    <input class="" name="old_password" type="password" placeholder="کلمه عبور فعلی" value="">
                                </label>

                                <label for="" class="large-6 large-offset-3">کلمه عبور جدید
                                    <input class="" name="new_password" type="password" placeholder="کلمه عبور جدید" value="">
                                </label>

                                <label for="" class="large-6 large-offset-3">تکرار کلمه عبور جدید
                                    <input class="" name="new_re_password" type="password" placeholder="تکرار کلمه عبور جدید" value="">
                                </label>


                                <div class="large-6 large-offset-3">
                                    <button type="submit" class="button blue-bg expanded">بروزرسانی</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row expanded padding-top-1">
        <div class="large-12 columns">
            <div class="row expanded grey-bg-4 grey-text-4 small-fontsize-2 bordered padding-vertical-0-5">
                <div class="large-12 columns">
                    <span class=""><i class="fa fa-telegram"></i> شناسه تلگرام </span>
                </div>
            </div>
            <div class="row expanded white-bg bordered-no-top padding-top-2">
                <div class="large-12 columns">
                    <form role="form" method="post" action="{{ action('UserController@updateTelegramChatId') }}">

                        {!! csrf_field() !!}

                        <div class="input-group">

                            <div class="large-12 padding-right-1">
                                
                                <div class="callout warning large-6 large-offset-3">
                                    <span> برای دریافت هشدار در تلگرام لطفا ربات آرنت با نام  </span>
                                    <span class="eng-font"> <b>ArnetCodeBot@</b> </span>
                                    <span> را در تلگرام خود جستجو کنید و سپس کلید Start را بزنید یا یک پیغام دلخواه به آن ارسال کنید. </span>
                                </div>

                                <label for="" class="large-6 large-offset-3 text-right">شماره تلگرام (با فرمت 989xxxxxxxxx+)
                                    <input dir="ltr" id="" class="" name="telegramNumber" type="text" placeholder="Telegram Number" value="{{ $userProfile['telegramNumber'] }}">
                                </label>

                                <label for="" class="large-6 large-offset-3 text-right">نام کاربری تلگرام (با فرمت username@)
                                    <input dir="ltr" class="" name="telegramUsername" type="text" placeholder="Telegram @Username" value="{{ $userProfile['telegramUsername'] }}">
                                </label>

                                <label for="" class="large-6 large-offset-3 text-right"> شناسه تلگرام (در صورتی که توسط مدیریت مقداردهی شده است لطفا شناسه کاربری را تغییر ندهید)
                                    <input dir="ltr" class="" name="telegramChatId" type="text" placeholder="Telegram Chat Id" value="{{ $userProfile['telegramChatId'] }}">
                                </label>


                                <div class="large-6 large-offset-3">
                                    <button type="submit" class="button blue-bg expanded">بروزرسانی</button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection