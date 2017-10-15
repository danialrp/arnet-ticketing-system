@extends('admin_layout.master')

@section('title', 'ارسال درخواست جدید')

@section('title-content','مدیریت درخواست‌ها')

@section('title-content-sub','درخواست جدید')

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">ثبت درخواست جدید</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{ action('AdminTicketController@newTicket') }}">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="row">
                    <div class="form-group col-xs-12">
                        <label for="ticket_title"></label>
                        <input name="ticket_title" type="text" class="form-control" id="InputEmail" placeholder="عنوان درخواست" value="{{ old('ticket_title') }}">
                    </div>
                    <div class="form-group col-xs-12">
                        {{--<label for="ticket_description"></label>--}}
                        <textarea name="ticket_description" id="load-editor" class="" placeholder="توضیحات"></textarea>
                    </div>
                    <div class="form-group col-xs-4">
                        <label>پروژه</label>
                        <select name="project_select" class="form-control select2" style="width: 100%;">
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}">{{ $project->title }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-xs-4">
                        <label>وضعیت</label>
                        <select name="status_select" class="form-control select2" style="width: 100%;">
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->fa_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-xs-4">
                        <label>اولویت</label>
                        <select name="priority_select" class="form-control select2" style="width: 100%;">
                            @foreach($priorities as $priority)
                                <option value="{{ $priority->id }}">{{ $priority->fa_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">درخواست جدید</button>
            </div>
        </form>
    </div>
    <!-- /.box -->

@endsection