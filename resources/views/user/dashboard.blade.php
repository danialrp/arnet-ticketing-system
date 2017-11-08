@extends('layout.master')

@section('title', 'پنل پشتیبانی')

@section('content')

    <div class="row expanded padding-1" data-equalizer>
        <div class="large-2 columns">
            <div class="info-box darkblue-bg white-text panel black-shadow" data-equalizer-watch>
                <div class="row">
                    <div class="large-12 columns text-center eng-font big-fontsize-2">{{$dashboardAllCounts['time']->format('H:i')}}</div>
                    <div class="large-12 columns text-center mid-fontsize">
                        {{$dashboardAllCounts['time']->formatWord(' l ') . " " . $dashboardAllCounts['time']->format('j %B %Y')}}
                    </div>
                    <div class="large-12 columns text-center mid-fontsize"> <hr> </div>
                    <div class="large-12 columns">
                        <div id="time-box" class="row expanded padding-1">
                            <div class="large-4 columns text-center">
                                <a href="{{ action('UserController@showSetting') }}"><i class="fa fa-cog fa-lg"></i></a>
                            </div>

                            <div class="large-4 columns text-center">
                                <a href="#"><i class="fa fa-bell fa-lg"></i></a>
                            </div>

                            <div class="large-4 columns text-center">
                                <a href="{{ action('TicketController@getAllTickets') }}"><i class="fa fa-tasks fa-lg"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @auth
            <div class="large-2 columns">
                <div class="info-box blue-bg white-text panel black-shadow" data-equalizer-watch>
                    <div class="row padding-1">
                        <div class="large-12 columns text-center"><i class="fa fa-user fa-4x"></i></div>
                    </div>
                    <div class="row expanded">
                        <div class="large-12 columns text-center mid-fontsize-2 bold-font">
                            <h5 class=""> {{Auth::user()->fname}} {{Auth::user()->lname}} </h5>
                            <h6 class="eng-font"> {{Auth::user()->email}} <i class="fa fa-envelope"></i></h6>
                            <h6 class="eng-font"> {{Auth::user()->phone}} <i class="fa fa-phone-square"></i></h6>
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
                        <h5 class="eng-font stat">{{$dashboardAllCounts['unreadTickets']}}</h5>
                        <h6 class="">پیغام خوانده نشده</h6>
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
                        <h5 class="eng-font stat">{{$dashboardAllCounts['unpaidInvoices']}}</h5>
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
                        <h5 class="eng-font stat">{{$dashboardAllCounts['allMessages']}}</h5>
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
                        <h5 class="eng-font stat">{{$dashboardAllCounts['allProjects']}}</h5>
                        <h6 class="">پروژه</h6>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{--END OF INFO-BOXES--}}

    <div class="row expanded padding-1">

        @if(count($projectDetails) > 0)
            <div class="large-4 columns">
                <table class="hover ">
                    <thead>
                    <tr class="grey-bg-4 grey-text-4 bordered">
                        <th>پروژه‌ها</th>
                        <th></th>
                        {{--<th></th>--}}
                        {{--<th></th>--}}
                    </tr>
                    </thead>

                    <thead>
                    <tr class="grey-text-2 bordered-no-bottom">
                        <th>پروژه</th>
                        <th class="text-center">وضعیت</th>
                        {{--<th class="text-center">تیکت‌ها</th>--}}
                        {{--<th class="text-center">پیغام‌ها</th>--}}
                    </tr>
                    </thead>

                    <tbody class="small-fontsize-4 bordered-no-top">
                    @foreach($projectDetails as $projectDetail)
                        <tr>
                            <td>{{$projectDetail->title}}</td>

                            <td class="text-center"><span class="label {{$projectDetail->color_code}}">{{$projectDetail->fa_name}}</span></td>
                            {{--<td class="text-center">0</td>--}}
                            {{--<td class="text-center">0</td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="large-4 columns text-center">داده‌ای برای نمایش وجود ندارد!</div>
        @endif

        @if(count($ticketDetails) > 0)
            <div class="large-8 columns">
                <table class="hover">
                    <thead>
                    <tr class="grey-bg-4 grey-text-4 bordered">
                        <th>درخواست‌ها</th>
                        <th></th>
                        <th></th>
                        {{--<th></th>--}}
                        <th></th>
                        {{--<th></th>--}}
                    </tr>
                    </thead>

                    <thead>
                    <tr class="grey-text-2 bordered-no-bottom">
                        <th>شماره</th>
                        <th>عنوان</th>
                        <th class="text-center">وضعیت</th>
                        {{--<th class="text-center">پیغام‌ها</th>--}}
                        <th class="text-center">آخرین بروزرسانی</th>
                        {{--<th>آخرین پیام</th>--}}
                    </tr>
                    </thead>

                    <tbody class="small-fontsize-4 bordered-no-top">
                    @foreach($ticketDetails as $ticketDetail)
                        <tr>
                            <td class="eng-font">#{{$ticketDetail->reference_number}}</td>

                            @if($ticketDetail->status == 8)
                                <td class="font-bold">
                                    <a href={{action('TicketController@replyTicket', $ticketDetail->id)}}>{{$ticketDetail->title}}</a>
                                </td>
                            @else
                                <td>
                                    <a href={{action('TicketController@replyTicket', $ticketDetail->id)}}>{{$ticketDetail->title}}</a>
                                </td>
                            @endif

                            <td class="text-center"><span class="label {{$ticketDetail->color_code}}">{{$ticketDetail->fa_name}}</span></td>

                            {{--<td class="text-center eng-font">6</td>--}}

                            <td class="text-center eng-font">{{date('H:i - y/m/d ', strtotime($ticketDetail->updated_fa))}}</td>

                            {{--<td>پشتیبان سیستم</td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @else
                <div class="large-8 columns text-center">داده‌ای برای نمایش وجود ندارد!</div>
            @endif
    </div>

@endsection