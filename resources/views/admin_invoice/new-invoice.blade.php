@extends('admin_layout.master')

@section('title', 'مدیریت فاکتور')

@section('title-content','مدیریت فاکتور')

@section('title-content-sub','لیست فاکتورها')

@section('content')

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">صدور فاکتور</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{ action('AdminInvoiceController@newInvoice') }}">
            {{ csrf_field() }}
            <div class="box-body">
                <div class="row">
                    <div class="form-group col-xs-6">
                        <label for="input-invoice-amount">مبلغ(ریال)</label>
                        <input name="invoice_amount" type="text" class="form-control" id="input-invoice-amount"
                               placeholder="ریال" value="{{ old('invoice_amount') }}">
                    </div>

                    <div class="form-group col-xs-6">
                        <label for="input-invoice-description">توضیحات</label>
                        <input name="invoice_description" type="text" class="form-control" id="input-invoice-description"
                               placeholder="(اختیاری)" value="{{ old('invoice_description') }}">
                    </div>

                    <div class="form-group col-xs-6">
                        <label>کاربر</label>
                        <select name="user_select" class="form-control select2" style="width: 100%;">
                            <option value="" selected disabled>انتخاب کاربر</option>
                            @foreach($allUsers as $allUser)
                                <option value="{{ $allUser->id }}">{{ $allUser->fname. ' ' .$allUser->lname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-xs-6">
                        <label>درخواست</label>
                        <select name="ticket_select" class="form-control select2" style="width: 100%;">
                            {{--Ajax--}}
                        </select>
                    </div>

                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">صدور فاکتور</button>
            </div>
        </form>
    </div>
    <!-- /.box -->
    <div id="test"></div>

@endsection