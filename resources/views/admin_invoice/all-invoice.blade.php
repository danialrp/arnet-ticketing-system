@extends('admin_layout.master')

@section('title', 'مدیریت فاکتور')

@section('title-content','مدیریت فاکتور')

@section('title-content-sub','لیست فاکتورها')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">فاکتورها</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="invoices-table" class="table table-bordered table-hover">
                        <thead bgcolor="#fbfbfb">
                        <tr>
                            <th>شناسه</th>
                            <th>مبلغ</th>
                            <th>وضعیت</th>
                            <th>کاربر</th>
                            <th>تاریخ صدور</th>
                            <th>تاریخ پرداخت</th>
                            <th>یادداشت</th>
                            <th>عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($allInvoices as $allInvoice)
                            <tr>
                                <td>{{ '#'. $allInvoice->invoice_ref_number }}</td>

                                <td>{{ number_format($allInvoice->invoice_amount,0,".",","). ' ' .'ریال' }}</td>

                                <td><span class="label {{$allInvoice->status_color_code}}">{{ $allInvoice->status_name }}</span></td>

                                <td>{{ $allInvoice->owner_fname. ' ' .$allInvoice->owner_lname }}</td>

                                <td>{{ Verta::parse($allInvoice->invoice_date)->format('l j %B %Y - H:i')}}</td>

                                @if($allInvoice->invoice_paid)
                                    <td>{{ Verta::parse($allInvoice->invoice_paid)->format('l j %B %Y - H:i')}}</td>
                                @else
                                    <td>--</td>
                                @endif

                                <td>{{ $allInvoice->invoice_note }}</td>

                                <td>
                                    <a href="{{ action('AdminInvoiceController@paidInvoice', $allInvoice->invoice_id) }}"
                                       class="btn btn-primary btn-xs">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </a>

                                    <a href="{{ action('AdminInvoiceController@deleteInvoice', $allInvoice->invoice_id) }}"
                                       class="btn btn-primary btn-xs">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot bgcolor="#fbfbfb">
                        <tr>
                            <th>شناسه</th>
                            <th>مبلغ</th>
                            <th>وضعیت</th>
                            <th>کاربر</th>
                            <th>تاریخ صدور</th>
                            <th>تاریخ پرداخت</th>
                            <th>یادداشت</th>
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