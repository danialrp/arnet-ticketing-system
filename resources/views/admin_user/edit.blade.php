@extends('admin_layout.master')

@section('title', 'ویرایش کاربر')

@section('title-content','مدیریت کاربران')

@section('title-content-sub', 'ویرایش اطلاعات کاربری')

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $user->fname. " " .$user->lname }}</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{ action('AdminUserController@editUser', $user->id) }}">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="InputEmail"></label>
                        <input name="fname" type="text" class="form-control" id="InputEmail" placeholder="نام" value="{{ $user->fname }}">
                    </div>
                    <div class="form-group col-xs-6">
                        <label for="InputPassword"></label>
                        <input name="lname" type="text" class="form-control" id="InputPassword" placeholder="نام خانوادگی" value="{{ $user->lname }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="InputEmail"></label>
                        <input name="email" type="text" class="form-control" id="InputEmail" placeholder="ایمیل" value="{{ $user->email }}">
                    </div>
                    <div class="form-group col-xs-6">
                        <label for="InputPassword"></label>
                        <input name="password" type="password" class="form-control" id="InputPassword" placeholder="کلمه عبور">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="exampleInputEmail1"></label>
                        <input name="phone" type="text" class="form-control" id="exampleInputEmail1" placeholder="تلفن" value="{{ $user->phone }}">
                    </div>
                    <div class="form-group col-xs-6">
                        <label for="exampleInputPassword1"></label>
                        <input name="note" type="text" class="form-control" id="exampleInputPassword1" placeholder="یادداشت(اختیاری)" value="{{ $user->note }}">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">بروزرسانی کاربر</button>
            </div>
        </form>
    </div>
    <!-- /.box -->

@endsection