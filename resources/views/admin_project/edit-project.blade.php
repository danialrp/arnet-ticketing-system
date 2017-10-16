@extends('admin_layout.master')

@section('title', 'مدیریت پروژه')

@section('title-content','مدیریت پروژه')

@section('title-content-sub', $projectInfo->project_title)

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">جزییات پروژه</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{ action('AdminProjectController@editProject', $projectInfo->project_id) }}">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="row">
                    <div class="form-group col-xs-12">
                        <label for="project_title">عنوان پروژه</label>
                        <input name="project_title" type="text" class="form-control"
                               id="InputEmail" placeholder="عنوان پروژه" value="{{ $projectInfo->project_title }}">
                    </div>
                    <div class="form-group col-xs-12">
                        <label for="project_note">یادداشت</label>
                        <input name="project_note" type="text" class="form-control"
                               id="InputEmail" placeholder="یادداشت" value="{{ $projectInfo->project_note }}">
                    </div>
                    <div class="form-group col-xs-6">
                        <label>کاربر</label>
                        <select name="user_select" class="form-control select2" style="width: 100%;">
                            <option value="{{ $projectInfo->owner_id }}">{{ $projectInfo->owner_fname. ' ' .$projectInfo->owner_lname }}</option>
                            @foreach($allUsers as $allUser)
                                <option value="{{ $allUser->id }}">{{ $allUser->fname. ' ' .$allUser->lname }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-xs-6">
                        <label>وضعیت</label>
                        <select name="status_select" class="form-control select2" style="width: 100%;">
                            <option value="{{ $projectInfo->status_id }}">{{ $projectInfo->status_fa_name }}</option>
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->fa_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">بروزرسانی</button>
            </div>
        </form>
    </div>
    <!-- /.box -->

@endsection