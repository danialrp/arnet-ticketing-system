@extends('admin_layout.master')

@section('title', 'افزودن کاربر جدید')

@section('title-content','مدیریت کاربران')

@section('title-content-sub','کاربر جدید')

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">مشخصات کاربری</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{ action('AdminUserController@createNewUser') }}">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="InputEmail">نام</label>
                        <input name="fname" type="text" class="form-control" id="InputEmail" placeholder="نام" value="{{ old('fname') }}">
                    </div>
                    <div class="form-group col-xs-6">
                        <label for="InputPassword">نام خانوادگی</label>
                        <input name="lname" type="text" class="form-control" id="InputPassword" placeholder="نام خانوادگی" value="{{ old('lname') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="InputEmail">ایمیل</label>
                        <input name="email" type="text" class="form-control" id="InputEmail" placeholder="ایمیل" value="{{ old('email') }}">
                    </div>
                    <div class="form-group col-xs-6">
                        <label for="InputPassword">کلمه عبور</label>
                        <input name="password" type="password" class="form-control" id="InputPassword" placeholder="کلمه عبور">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="exampleInputEmail1">تلفن</label>
                        <input name="phone" type="text" class="form-control" id="exampleInputEmail1" placeholder="تلفن" value="{{ old('phone') }}">
                    </div>
                    <div class="form-group col-xs-6">
                        <label for="exampleInputPassword1">یادداشت</label>
                        <input name="note" type="text" class="form-control" id="exampleInputPassword1" placeholder="یادداشت(اختیاری)" value="{{ old('note') }}">
                    </div>
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">کاربر جدید</button>
            </div>
        </form>
    </div>
    <!-- /.box -->

@endsection