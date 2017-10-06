@extends('admin_layout.master')

@section('title', 'پنل پشتیبانی')

@section('content')

    <div class="row expanded padding-1" data-equalizer>
        <div class="large-2 columns">
            <div class="info-box darkblue-bg white-text panel black-shadow" data-equalizer-watch>
                <div class="row">
                    <div class="large-12 columns text-center eng-font big-fontsize-2">10:32</div>
                    <div class="large-12 columns text-center mid-fontsize">چهارشنبه ۳۱ شهریور ۱۳۹۶</div>
                    <div class="large-12 columns text-center mid-fontsize"> <hr> </div>
                    <div class="large-12 columns">
                        <div id="time-box" class="row expanded padding-1">
                            <div class="large-4 columns text-center">
                                <a href="#"><i class="fa fa-cog fa-lg"></i></a>
                            </div>

                            <div class="large-4 columns text-center">
                                <a href="#"><i class="fa fa-bell fa-lg"></i></a>
                            </div>

                            <div class="large-4 columns text-center">
                                <a href="#"><i class="fa fa-tasks fa-lg"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @auth('web_admin')
            <div class="large-2 columns">
                <div class="info-box blue-bg white-text panel black-shadow" data-equalizer-watch>
                    <div class="row padding-1">
                        <div class="large-12 columns text-center"><i class="fa fa-user fa-4x"></i></div>
                    </div>
                    <div class="row expanded">
                        <div class="large-12 columns text-center mid-fontsize-2 bold-font">
                            <h5 class=""> {{Auth::guard('web_admin')->user()->fname}} {{Auth::guard('web_admin')->user()->lname}} </h5>
                            <h6 class="eng-font"> {{Auth::guard('web_admin')->user()->email}} <i class="fa fa-envelope"></i></h6>
                            <h6 class="eng-font"> {{Auth::guard('web_admin')->user()->phone}} <i class="fa fa-phone-square"></i></h6>
                        </div>
                    </div>
                </div>
            </div>
        @endauth

        <div class="large-2 columns">
            <div class="info-box blue-bg white-text panel black-shadow" data-equalizer-watch>
                <div class="row padding-1">
                    <div class="large-12 columns text-center"><i class="fa fa-commenting-o fa-4x"></i></div>
                </div>
                <div class="row expanded padding-0-3">
                    <div class="large-12 columns text-center mid-fontsize-2 bold-font">
                        <h5 class="eng-font stat">6</h5>
                        <h6 class="">پیغام جدید</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="large-2 columns">
            <div class="info-box blue-bg white-text panel black-shadow" data-equalizer-watch>
                <div class="row padding-1">
                    <div class="large-12 columns text-center"><i class="fa fa-th-large fa-4x"></i></div>
                </div>
                <div class="row expanded padding-0-3">
                    <div class="large-12 columns text-center mid-fontsize-2 bold-font">
                        <h5 class="eng-font stat">0</h5>
                        <h6 class="">فاکتور پرداخت نشده</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="large-2 columns">
            <div class="info-box blue-bg white-text panel black-shadow" data-equalizer-watch>
                <div class="row padding-1">
                    <div class="large-12 columns text-center white-text-2"><i class="fa fa-commenting-o fa-4x"></i></div>
                </div>
                <div class="row expanded padding-0-3">
                    <div class="large-12 columns text-center mid-fontsize-2 bold-font">
                        <h5 class="eng-font stat">64</h5>
                        <h6 class="">کل پیغام‌ها</h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="large-2 columns">
            <div class="info-box blue-bg white-text panel black-shadow" data-equalizer-watch>
                <div class="row padding-1">
                    <div class="large-12 columns text-center"><i class="fa fa-code fa-4x"></i></div>
                </div>
                <div class="row expanded padding-0-3">
                    <div class="large-12 columns text-center mid-fontsize-2 bold-font">
                        <h5 class="eng-font stat">1</h5>
                        <h6 class="">پروژه</h6>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{--END OF INFO-BOXES--}}

    <div class="row expanded padding-1">

        <div class="large-4 columns">
            <table class="hover ">
                <thead>
                <tr class="grey-bg-4 grey-text-4 bordered">
                    <th>پروژه‌ها</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>

                <thead>
                <tr class="grey-text-2 bordered-no-bottom">
                    <th>پروژه</th>
                    <th class="text-center">وضعیت</th>
                    <th class="text-center">تیکت‌ها</th>
                    <th class="text-center">پیغام‌ها</th>
                </tr>
                </thead>

                <tbody class="small-fontsize-4 bordered-no-top">
                <tr>
                    <td>طراحی سایت فروشگاهی</td>
                    <td class="text-center"><span class="label status-processing">درحال انجام</span></td>
                    <td class="text-center">32</td>
                    <td class="text-center">186</td>
                </tr>
                <tr>
                    <td>طراحی سایت فروشگاهی</td>
                    <td class="text-center"><span class="label status-done">انجام شده</span></td>
                    <td class="text-center">32</td>
                    <td class="text-center">186</td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="large-8 columns">
            <table class="hover">
                <thead>
                <tr class="grey-bg-4 grey-text-4 bordered">
                    <th>درخواست‌ها</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>

                <thead>
                <tr class="grey-text-2 bordered-no-bottom">
                    <th>شماره</th>
                    <th>عنوان</th>
                    <th class="text-center">وضعیت</th>
                    <th class="text-center">پیغام‌ها</th>
                    <th class="text-center">آخرین بروزرسانی</th>
                    <th>آخرین پیام</th>
                </tr>
                </thead>

                <tbody class="small-fontsize-4 bordered-no-top">
                <tr>
                    <td class="eng-font">#23213</td>
                    <td><a href="#">درخواست اجرای مجدد کار قبلی</a></td>
                    <td class="text-center"><span class="label status-processing">در حال انجام</span></td>
                    <td class="text-center eng-font">6</td>
                    <td class="text-center eng-font">21/34/96 - 12:22</td>
                    <td>پشتیبان سیستم</td>
                </tr>
                <tr>
                    <td class="eng-font">#23213</td>
                    <td><a href="#">درخواست اجرای مجدد کار قبلی</a></td>
                    <td class="text-center"><span class="label status-processing">در حال انجام</span></td>
                    <td class="text-center eng-font">6</td>
                    <td class="text-center eng-font">21/34/96 - 12:22</td>
                    <td>پشتیبان سیستم</td>
                </tr>
                <tr>
                    <td class="eng-font">#23213</td>
                    <td><a href="#">درخواست اجرای مجدد کار قبلی</a></td>
                    <td class="text-center"><span class="label status-done">انجام شده</span></td>
                    <td class="text-center eng-font">6</td>
                    <td class="text-center eng-font">21/34/96 - 12:22</td>
                    <td>پشتیبان سیستم</td>
                </tr>
                <tr>
                    <td class="eng-font">#23213</td>
                    <td class=""><a href="#">درخواست اجرای مجدد کار قبلی</a></td>
                    <td class="text-center"><span class="label status-new">جدید</span></td>
                    <td class="text-center eng-font">6</td>
                    <td class="text-center eng-font">21/34/96 - 12:22</td>
                    <td>پشتیبان سیستم</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection