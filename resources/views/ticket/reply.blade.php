@extends('layout.master')

@section('title', '#درخواست ' . $ticketInfo->reference_number)

@section('content')

    <div class="row expanded padding-1">

        {{--TICKET-INFOBOX-RIGHT--}}
        <div class="large-4 columns">
            <table class="hover unstriped">
                <thead>
                <tr class="grey-bg-4 grey-text-4 bordered">
                    <th>#{{ $ticketInfo->reference_number }}</th>
                    <th></th>
                </tr>
                </thead>

                {{--<thead>
                <tr class="grey-text-2">
                    <th>پروژه</th>
                    <th>وضعیت</th>
                    <th>تیکت‌ها</th>
                    <th>پیغام‌ها</th>
                </tr>
                </thead>--}}

                <tbody class="small-fontsize-4 bordered-no-top">
                <tr>
                    <td><i class="fa fa-info-circle vertically-middle" aria-hidden="true"></i> <span class="vertically-middle">وضعیت</span></td>
                    <td class="text-right"><span class="label {{ $ticketInfo->color_code }}">{{ $ticketInfo->fa_name }}</span></td>
                </tr>
                <tr>
                    <td><i class="fa fa-info-circle vertically-middle" aria-hidden="true"></i><span class="vertically-middle"> اولویت</span></td>
                    @switch($ticketInfo->priorityId)
                        @case(1)
                        <td class="text-right primary green-text">{{ $ticketInfo->priority_fa_name }}</td>
                        @break

                        @case(2)
                        <td class="text-right primary yellow-text">{{ $ticketInfo->priority_fa_name }}</td>
                        @break

                        @case(3)
                        <td class="text-right primary red-text">{{ $ticketInfo->priority_fa_name }}</td>
                        @break

                        @default
                        <td class="text-right primary">{{ $ticketInfo->priority_fa_name }}</td>
                    @endswitch
                </tr>
                <tr>
                    <td><i class="fa fa-info-circle vertically-middle" aria-hidden="true"></i><span class="vertically-middle"> آخرین بروزرسانی</span></td>
                    <td class="eng-font text-right">{{ date('H:i - y/m/d ', strtotime($ticketInfo->updated_fa)) }}</td>
                </tr>
                <tr>
                    <td><i class="fa fa-info-circle vertically-middle" aria-hidden="true"></i><span class="vertically-middle"> پروژه</span></td>
                    <td class="text-right">{{ $ticketInfo->project_title }}</td>
                </tr>
                <tr>
                    <td><i class="fa fa-info-circle vertically-middle" aria-hidden="true"></i><span class="vertically-middle"> تعداد پیام‌ها</span></td>
                    <td class="eng-font text-right">{{ $allMessagesCount }}</td>
                </tr>
                <tr>
                    <td><i class="fa fa-info-circle vertically-middle" aria-hidden="true"></i><span class="vertically-middle"> ارسال کننده</span></td>
                    <td class="text-right">{{ $ticketSender->fname. ' ' .$ticketSender->lname }}</td>
                </tr>
                <tr>
                    <td><i class="fa fa-info-circle vertically-middle" aria-hidden="true"></i><span class="vertically-middle"> تاریخ ارسال</span></td>
                    <td class="eng-font text-right">{{ date('H:i - y/m/d ', strtotime($ticketInfo->created_fa)) }}</td>
                </tr>
                {{--<tr>
                    <td><i class="fa fa-info-circle" aria-hidden="true"></i>آخرین ارسال </td>
                    <td class="text-right">پشتیبان سیستم</td>
                </tr>--}}
                @if($ticketInvoice)
                    <tr>
                        <td><i class="fa fa-info-circle vertically-middle" aria-hidden="true"></i><span class="vertically-middle"> شماره فاکتور</span></td>
                        <td class="eng-font text-right">{{ $ticketInvoice->reference_number }}</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-info-circle vertically-middle" aria-hidden="true"></i><span class="vertically-middle"> وضعیت فاکتور</span></td>
                        <td class="text-right"><span class="label {{ $ticketInvoice->color_code }}">{{$ticketInvoice->status}}</span></td>
                    </tr>
                @else
                    <tr>
                        <td><i class="fa fa-info-circle vertically-middle" aria-hidden="true"></i><span class="vertically-middle"> شماره فاکتور</span></td>
                        <td class="eng-font text-right">0</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-info-circle vertically-middle" aria-hidden="true"></i><span class="vertically-middle"> وضعیت فاکتور</span></td>
                        <td class="text-right">--</td>
                    </tr>
                @endif

                </tbody>
            </table>
        </div>

        {{--TICKET-DETAIL-LEFT--}}
        <div class="large-8 columns">
            <div class="callout white-bg-2">
                <div>
                    {{--DETAIL-HEADER--}}
                    <div class="row expanded">
                        <div class="large-12 columns ">

                            <div class="padding-bottom-2">
                                <a id="show-reply-editor" class="button tiny margin-0 blue-bg large-1" href=""><i class="fa fa-reply fa-lg"></i></a>

                                @if($ticketInfo->status == 5)
                                    <a class="button tiny margin-0 blue-bg large-1 disabled">
                                    <span class="bold-font"> <i class="fa fa fa-check fa-lg"> </i>&nbsp;
                                        <span>انجام شده</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </span>
                                    </a>
                                @else
                                    <a class="button tiny margin-0 blue-bg large-1" href="{{ action('TicketController@ticketDone', $ticketInfo->id) }}">
                                    <span class="bold-font"> <i class="fa fa fa-check fa-lg"> </i>&nbsp;
                                        <span>انجام شده</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    </span>
                                    </a>
                                @endif
                            </div>

                        </div>
                    </div>

                    <div class="row expanded"> {{--DETAIL-BODY--}}
                        <div class="large-12 columns">
                            <div class="padding-bottom-0-5">
                                <i class="fa fa-level-down fa-rotate-90 fa-lg padding-horizontal-0-3 grey-text-3"></i>
                                <span class="bold-font grey-text-3">{{ $ticketInfo->title }}</span>
                            </div>

                            <div class="small-fontsize-4 line-height-2 padding-left-2">{!! $ticketInfo->description !!}</div>
                        </div>
                    </div>

                </div>
            </div>

            <div id="send-reply" class="callout white-bg-2 padding-top-1">
                <div class="row expanded"> {{--EDITOR HEADER--}}
                    <div class="large-12 columns">
                        <span><i class="fa fa-long-arrow-left vertically-middle grey-text-3"></i></span>
                        <span class="small-fontsize-2">ارسال به</span>
                        <span class="label grey-bg-2 black-text">{{ $ticketDepartment->department_fa_name }}</span></div>
                </div>

                <hr class="row expanded">

                <div class="row expanded"> {{--EDITOR--}}
                    <form role="form" method="post" enctype="multipart/form-data" action="{{ action('TicketController@sendReplyTicket', $ticketInfo->id) }}">
                        {!! csrf_field() !!}

                        <textarea name="message_body" id="load-editor" class=""></textarea>

                        <div class="input-group">

                            <div class="large-3 padding-right-1">
                                <button type="submit" class="button blue-bg expanded">ارسال به پشتیبانی</button>
                            </div>

                            <div class="padding-right-1">
                                <label for="FileUpload" class="button blue-bg"><span><i class="fa fa-paperclip fa-lg"></i></span></label>
                                <input name="attachment_file" type="file" id="FileUpload" class="show-for-sr">
                            </div>
                            <label class="large-3 padding-right-1">
                                <select name="priority_select" class="small-fontsize-2">
                                    <option value="{{ $ticketInfo->priorityId }}" selected>{{ $ticketInfo->priority_fa_name }}</option>
                                    @foreach($priorities as $priority)
                                        <option value="{{ $priority->id }}">{{ $priority->fa_name }}</option>
                                    @endforeach
                                </select>
                            </label>

                        </div>
                    </form>
                </div>
            </div>

            @foreach( $allTicketMessages as $allTicketMessage )
                <div class="row expanded"> {{--MSGS--}}
                    <div class="large-12 float-right">

                        @if($allTicketMessage->is_admin == 0)
                            <div class="callout grey-bg-3">
                                <div class="padding-bottom-0-3">
                                    <img class="img-circle" src="{{ asset('/image/avatar.png') }}" alt="???">
                                    <span class="grey-text small-fontsize"><a href="#">{{ $allTicketMessage->fname }} {{ $allTicketMessage->lname }}</a></span>
                                </div>
                                @else
                                    <div class="callout grey-bg-3 green-bg-2">
                                        <div class="padding-bottom-0-3">
                                            <img class="img-circle" src="{{ asset('/image/avatar.png') }}" alt="???">
                                            <span class="grey-text small-fontsize"><a href="#">پشتیبانی آرنت</a></span>
                                        </div>
                                        @endif

                                        <div class="grey-text-3 small-fontsize-2">
                                            <div class="padding-bottom-1 padding-left-2">{!! $allTicketMessage->message_body !!}</div>
                                        </div>

                                        <div class="padding-bottom-1 overflow-hidden">
                                            @if($allTicketMessage->original_filename)
                                                <div class="small-fontsize float-left">
                                                    <a class="blue-text"
                                                       href={{action('TicketController@downloadAttachmentFile', $allTicketMessage->attachment_id)}}>
                                                        <i class="fa fa-paperclip fa-lg"></i>
                                                        <span>ضمیمه: </span>
                                                        {{$allTicketMessage->original_filename}}
                                                    </a>
                                                </div>
                                            @endif

                                            <div class="grey-text small-fontsize-0 float-right">
                                                {{ date('H:i@ y/m/d ', strtotime($allTicketMessage->created_fa)) }}
                                            </div>
                                        </div>

                                    </div>

                            </div>
                    </div>  {{--END OF MSGS--}}
                    @endforeach
                    <div class="row expanded padding-horizontal-1">
                        <div class="large-12 columns text-center eng-font">
                            {{ $allTicketMessages->links() }}
                        </div>
                    </div>

                </div>
        </div>

@endsection

