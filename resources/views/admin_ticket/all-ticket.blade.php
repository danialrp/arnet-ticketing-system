@extends('admin_layout.master')

@section('title', 'نمایش درخواست‌ها')

@section('title-content','مدیریت درخواست')

@section('title-content-sub','لیست درخواست‌ها')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">درخواست کاربران</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="tickets-table" class="table table-bordered table-hover">
                        <thead bgcolor="#fbfbfb">
                        <tr>
                            <th>شناسه</th>
                            <th>عنوان</th>
                            <th>وضعیت</th>
                            <th>اولویت</th>
                            <th>آخرین بروزرسانی</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allTickets as $allTicket)
                            <tr>
                                <td><a href="{{ action('AdminTicketController@showReplyTicket', $allTicket->ticketId) }}">#{{ $allTicket->reference_number }}</a></td>

                                <td><a href="{{ action('AdminTicketController@showReplyTicket', $allTicket->ticketId) }}">{{ $allTicket->title }}</a></td>

                                <td><span class="label {{$allTicket->color_code}}">{{ $allTicket->fa_name }}</span></td>

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

                                <td>{{Verta::parse($allTicket->updated_fa)->format('l j %B %Y - H:i')}}</td>

                                <td>
                                    <a href="{{ action('AdminTicketController@showReplyTicket', $allTicket->ticketId) }}"
                                       class="btn btn-primary btn-xs">
                                        <i class="fa fa-reply" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot bgcolor="#fbfbfb">
                        <tr>
                            <th>شناسه</th>
                            <th>عنوان</th>
                            <th>وضعیت</th>
                            <th>اولویت</th>
                            <th>آخرین بروزرسانی</th>
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