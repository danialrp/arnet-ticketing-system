@extends('admin_layout.master')

@section('title', 'مدیریت درخواست')

@section('title-content', $ticketInfo->title)

@section('title-content-sub',  '#'.$ticketInfo->reference_number)

@section('content')

    <div class="row">
        <div class="col-md-3">

            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">#{{ $ticketInfo->reference_number }}</h3>

                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">

                        <li><a><i class="fa fa-info-circle"></i> وضعیت
                                <span class="label pull-right {{ $ticketInfo->color_code }}">{{ $ticketInfo->fa_name }}</span></a></li>

                        <li><a><i class="fa fa-info-circle"></i> اولویت
                                @switch($ticketInfo->priorityId)
                                    @case(1)
                                    <span class="pull-right green-text">{{ $ticketInfo->priority_fa_name }}</span>
                                    @break

                                    @case(2)
                                    <span class="pull-right yellow-text">{{ $ticketInfo->priority_fa_name }}</span>
                                    @break

                                    @case(3)
                                    <span class="pull-right red-text">{{ $ticketInfo->priority_fa_name }}</span>
                                    @break

                                    @default
                                    <span class="pull-right yellow-text">{{ $ticketInfo->priority_fa_name }}</span>
                                @endswitch
                            </a></li>

                        <li><a><i class="fa fa-info-circle"></i> آخرین بروزرسانی
                                <span class="pull-right">{{ Verta::parse($ticketInfo->updated_fa)->format('l j %B %y - H:i') }}</span></a></li>

                        <li><a><i class="fa fa-info-circle"></i> پروژه
                                <span class="pull-right">{{ $ticketInfo->project_title }}</span></a></li>

                        <li><a><i class="fa fa-info-circle"></i> تعداد پیام‌ها
                                <span class="pull-right">{{ $allMessagesCount }}</span></a></li>

                        <li><a><i class="fa fa-info-circle"></i>ارسال کننده
                                <span class="pull-right">{{ $ticketSender->fname. ' ' .$ticketSender->lname }}</span></a></li>

                        <li><a><i class="fa fa-info-circle"></i>تاریخ ارسال
                                <span class="pull-right">{{ Verta::parse($ticketInfo->created_fa)->format('l j %B %y - H:i') }}</span></a></li>

                        @if($ticketInvoice)
                            <li><a><i class="fa fa-info-circle"></i>شماره فاکتور
                                    <span class="pull-right">{{ $ticketInvoice->reference_number }}</span></a></li>

                            <li><a><i class="fa fa-info-circle"></i>وضعیت فاکتور
                                    <span class="label pull-right {{ $ticketInvoice->color_code }}">{{ $ticketInvoice->status }}</span></a></li>
                        @else
                            <li><a><i class="fa fa-info-circle"></i>شماره فاکتور
                                    <span class="pull-right">0</span></a></li>

                            <li><a><i class="fa fa-info-circle"></i>وضعیت فاکتور
                                    <span class="pull-right">--</span></a></li>
                        @endif
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /. box -->

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">بروزرسانی</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="{{ action('AdminTicketController@ticketUpdateStatusPriority', $ticketInfo->id) }}">
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <label></label>
                            <select name="status_select" class="form-control select2" style="width: 100%;">
                                <option value="{{ $ticketInfo->status_id }}" selected>{{ $ticketInfo->fa_name }}</option>
                                @foreach($statuses as $status)
                                    <option value="{{ $status->id }}">{{ $status->fa_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-xs-12">
                            <label></label>
                            <select name="priority_select" class="form-control select2" style="width: 100%;">
                                <option value="{{ $ticketInfo->priorityId }}" selected>{{ $ticketInfo->priority_fa_name }}</option>
                                @foreach($priorities as $priority)
                                    <option value="{{ $priority->id }}">{{ $priority->fa_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-block margin-bottom">بروزرسانی</button>
                </div>
            </form>
            </div>
            <!-- /.box .box-primary -->

        </div>
        <!-- /.col-md-3 -->

        <div class="col-md-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $ticketInfo->title }}</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    {!! $ticketInfo->description !!}
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">ارسال پاسخ جدید</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" enctype="multipart/form-data" action="{{ action('AdminTicketController@sendReplyTicket', $ticketInfo->id) }}">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="row">
                            <div class="form-group col-xs-12">
                                {{--<label for="ticket_description"></label>--}}
                                <textarea name="message_body" id="load-editor" class="" placeholder="توضیحات"></textarea>
                            </div>
                            <div class="form-group col-xs-4">
                                <label>وضعیت</label>
                                <select name="status_select" class="form-control select2" style="width: 100%;">
                                    <option value="{{ $ticketInfo->status_id }}" selected>{{ $ticketInfo->fa_name }}</option>
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->fa_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-xs-4">
                                <label>اولویت</label>
                                <select name="priority_select" class="form-control select2" style="width: 100%;">
                                    <option value="{{ $ticketInfo->priorityId }}" selected>{{ $ticketInfo->priority_fa_name }}</option>
                                    @foreach($priorities as $priority)
                                        <option value="{{ $priority->id }}">{{ $priority->fa_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">ارسال پاسخ</button>
                        <label for="file-upload"></label>
                        <input name="attachment_file" class="pull-right" type="file" id="file-upload">
                    </div>
                </form>
            </div>
            <!-- /.box .box-primary -->

            <!-- DIRECT CHAT PRIMARY -->
            <div class="box box-primary direct-chat direct-chat-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">پیغام ها</h3>

                    <div class="box-tools pull-right">
                        <span data-toggle="tooltip" title="پیغام‌ ها" class="badge bg-light-blue">{{ $allMessagesCount }}</span>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                            <i class="fa fa-comments"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages">
                    @foreach($allTicketMessages as $allTicketMessage)
                        @if($allTicketMessage->is_admin == 0)
                            <!-- Message to the right -->
                                <div class="direct-chat-msg right">
                                    <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-right">
                                            {{ $allTicketMessage->fname. ' ' .$allTicketMessage->lname }}
                                        </span>
                                        <span class="direct-chat-timestamp pull-left">
                                            {{ Verta::parse($allTicketMessage->created_fa)->format('l j %B %y - H:i') }}
                                        </span>
                                    </div>
                                    <!-- /.direct-chat-info -->
                                    <img class="direct-chat-img" src="{{ asset('/back/img/user3-128x128.jpg') }}" alt="Message User Image"><!-- /.direct-chat-img -->
                                    <div class="direct-chat-text small-fontsize">
                                        {!! $allTicketMessage->message_body !!}
                                        <br/>
                                        @if($allTicketMessage->original_filename)
                                            <a class="label bg-aqua" href={{action('AdminTicketController@downloadAttachmentFile', $allTicketMessage->attachment_id)}}>
                                                <i class="fa fa-paperclip fa-lg"></i>
                                                <span>ضمیمه: </span>
                                                {{$allTicketMessage->original_filename}}
                                            </a>
                                        @endif
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->
                        @else
                            <!-- Message. Default to the left -->
                                <div class="direct-chat-msg">
                                    <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-left">
                                            {{ Auth::guard('web_admin')->user()->fname. ' ' .Auth::guard('web_admin')->user()->lname }}
                                        </span>
                                        <span class="direct-chat-timestamp pull-right">
                                            {{ Verta::parse($allTicketMessage->created_fa)->format('l j %B %y - H:i') }}
                                        </span>
                                    </div>
                                    <!-- /.direct-chat-info -->
                                    <img class="direct-chat-img" src="{{ asset('/back/img/user1-128x128.jpg') }}" alt="Message User Image"><!-- /.direct-chat-img -->
                                    <div class="direct-chat-text small-fontsize">
                                        {!! $allTicketMessage->message_body !!}
                                        <br/>
                                        @if($allTicketMessage->original_filename)
                                            <a class="label bg-aqua" href={{action('AdminTicketController@downloadAttachmentFile', $allTicketMessage->attachment_id)}}>
                                                <i class="fa fa-paperclip fa-lg"></i>
                                                <span>ضمیمه: </span>
                                                {{$allTicketMessage->original_filename}}
                                            </a>
                                        @endif
                                    </div>
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->
                            @endif
                        @endforeach
                    </div>
                    <!--/.direct-chat-messages-->

                    <!-- Contacts are loaded here -->
                    <div class="direct-chat-contacts">
                        <ul class="contacts-list">
                            <li>اطلاعات تکمیلی</li>
                            <!-- End Contact Item -->
                        </ul>
                        <!-- /.contatcts-list -->
                    </div>
                    <!-- /.direct-chat-pane -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">

                </div>
                <!-- /.box-footer-->
            </div>
            <!--/.direct-chat -->
        </div>
        <!-- /.col-md-9 -->
    </div>
    <!-- /.row -->


@endsection