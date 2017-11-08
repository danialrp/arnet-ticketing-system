@extends('layout.master')

@section('title', 'پروفایل کاربری')

@section('content')

    <div class="row expanded padding-top-1">
        <div class="large-12 columns">
            <div class="row expanded grey-bg-4 grey-text-4 small-fontsize-2 bordered padding-vertical-0-5">
                <div class="large-12 columns">
                    <span class="">تغییر کلمه عبور</span>
                </div>
            </div>
            <div class="row expanded white-bg bordered-no-top padding-top-2">
                <div class="large-12 columns">
                    <form role="form" method="post" action="{{ action('UserController@updatePassword') }}">

                        {!! csrf_field() !!}

                        <div class="input-group">

                            <div class="large-12 padding-right-1">

                                <input class="large-6 large-offset-3" name="old_password" type="password" placeholder="کلمه عبور فعلی" value="">

                                <input class="large-6 large-offset-3" name="new_password" type="password" placeholder="کلمه عبور جدید" value="">

                                <input class="large-6 large-offset-3" name="new_re_password" type="password" placeholder="تکرار کلمه عبور جدید" value="">

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