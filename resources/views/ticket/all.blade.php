@extends('layout.master')

@section('title', 'درخواست‌های پشتیبانی')

@section('content')

    <div class="row expanded padding-1">
        @if(count($allTickets) > 0)
            <div class="large-12 columns">
                <table class="hover">
                    <thead>
                    <tr class="grey-bg-4 grey-text-4 bordered">
                        <th>درخواست‌ها</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        {{--<th></th>--}}
                        {{--<th></th>--}}
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>

                    <thead>
                    <tr class="grey-text-2 bordered-no-bottom">
                        <th>شناسه</th>
                        <th>عنوان</th>
                        <th class="text-center">وضعیت</th>
                        <th>اولویت</th>
                        {{--<th>آخرین پیغام</th>--}}
                        {{--<th class="text-center">تعداد پیغام‌ها</th>--}}
                        <th class="text-center">آخرین بروزرسانی</th>
                        <th class="text-center">عملیات</th>
                    </tr>
                    </thead>

                    <tbody class="small-fontsize-4 bordered-no-top">
                    @foreach($allTickets as $allTicket)
                        <tr>
                            @if($allTicket->status == 8)
                                <td class="eng-font font-bold">
                                    <a href={{action('TicketController@replyTicket', $allTicket->ticketId)}}>#{{$allTicket->reference_number}}</a>
                                </td>
                            @else
                                <td class="eng-font">
                                    <a href={{action('TicketController@replyTicket', $allTicket->ticketId)}}>#{{$allTicket->reference_number}}</a>
                                </td>
                            @endif


                            @if($allTicket->status == 8)
                                <td class="font-bold">
                                    <a href={{action('TicketController@replyTicket', $allTicket->ticketId)}}>{{$allTicket->title}}</a>
                                </td>
                            @else
                                <td>
                                    <a href={{action('TicketController@replyTicket', $allTicket->ticketId)}}>{{$allTicket->title}}</a>
                                </td>
                            @endif

                            <td class="text-center"><span class="label {{$allTicket->color_code}}">{{$allTicket->fa_name}}</span></td>

                            @switch($allTicket->priorityId)
                                @case(1)
                                <td><span class="green-text">{{$allTicket->priority_fa_name}}</span></td>
                                @break

                                @case(2)
                                <td><span class="yellow-text">{{$allTicket->priority_fa_name}}</span></td>
                                @break

                                @case(3)
                                <td><span class="red-text">{{$allTicket->priority_fa_name}}</span></td>
                                @break

                                @default
                                <td><span class="">{{$allTicket->priority_fa_name}}</span></td>
                            @endswitch

                            {{--<td>پشتیبان سیستم</td>--}}
                            {{--<td class="eng-font text-center">6</td>--}}

                            <td class="eng-font text-center">{{date('H:i - y/m/d ', strtotime($allTicket->updated_fa))}}</td>

                            <td class="text-center">
                                @if($allTicket->ticketStatusId == 5)
                                    <a class="button tiny margin-0 blue-bg disabled">
                                        <i class="fa fa-check"></i>
                                    </a>
                                @else
                                    <a class="button tiny margin-0 blue-bg"
                                       href="{{action('TicketController@ticketDone', $allTicket->ticketId)}}">
                                        <i class="fa fa-check"></i>
                                    </a>
                                @endif

                                <a class="button tiny margin-0 green-bg"
                                   href="{{action('TicketController@replyTicket', $allTicket->ticketId)}}">
                                    <i class="fa fa-reply"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="large-12 columns text-center">داده‌ای برای نمایش وجود ندارد!</div>
        @endif
    </div>
    <div class="row expanded padding-horizontal-1">
        <div class="large-12 columns text-center eng-font">
            {{$allTickets->links()}}
        </div>
    </div>

@endsection