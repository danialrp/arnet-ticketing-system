@extends('layout.master')

@section('title', 'فاکتورها')

@section('content')

    <div class="row expanded padding-1">
        <div class="large-12 columns">
            <table class="hover">
                <thead>
                <tr class="grey-bg-4 grey-text-4 bordered">
                    <th>فاکتورها</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>

                <thead>
                <tr class="grey-text-2 bordered-no-bottom">
                    <th>شناسه فاکتور</th>
                    <th class="text-center">وضعیت</th>
                    <th>جزییات</th>
                    <th>مبلغ</th>
                    <th class="text-center">تاریخ صدور</th>
                    <th class="text-center">عملیات</th>
                </tr>
                </thead>

                <tbody class="small-fontsize-4 bordered-no-top">
                @foreach($userInvoices as $userInvoice)
                    <tr>
                        <td class="eng-font">#{{ $userInvoice->reference_number }}</td>

                        <td class="text-center"><span class="label {{ $userInvoice->statusColorCode }}">{{ $userInvoice->statusFaName }}</span></td>

                        @if($userInvoice->ticketId)
                            <td class="">{{ $userInvoice->ticketTitle }} (درخواست {{ $userInvoice->TicketReferenceNumber }}#)</td>
                        @else
                            <td class="">{{ $userInvoice->invoiceDescription }}</td>
                        @endif

                        <td>
                            <span class="eng-font">{{ number_format($userInvoice->amount,0,".",",") }}</span>
                            <span class="small-fontsize"> ریال </span>
                        </td>

                        <td class="eng-font text-center">{{ date('H:i - y/m/d ', strtotime($userInvoice->created_fa)) }}</td>

                        <td class="text-center">
                            <a class="button tiny margin-0 green-bg disabled">
                                <i class="fa fa-credit-card"></i>
                                <span class="small-fontsize">پرداخت آنلاین</span>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row expanded padding-horizontal-1">
        <div class="large-12 columns text-center eng-font">
            {{$userInvoices->links()}}
        </div>
    </div>

@endsection