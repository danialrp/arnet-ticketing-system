@extends('layout.master')

@section('title', 'ایجاد درخواست جدید')

@section('content')

    <div class="row expanded padding-top-1">
        <div class="large-12 columns">
            <div class="row expanded grey-bg-4 grey-text-4 small-fontsize-2 bordered padding-vertical-0-5">
                <div class="large-12 columns">
                    <span class="">درخواست جدید</span>
                </div>
            </div>
            <div class="row expanded white-bg bordered-no-top padding-top-2">
                <div class="large-12 columns">
                    <form role="form" method="post" action="{{ action('TicketController@sendNewTicket') }}">
                        {!! csrf_field() !!}
                        <input name="ticket_title" type="text" placeholder="عنوان" value="{{old('ticket_title')}}">
                        <textarea name="ticket_description" id="load-editor" class="" placeholder="توضیحات"></textarea>
                        <div class="input-group">
                            <div class="large-1 padding-right-1">
                                <button type="submit" class="button blue-bg expanded">ارسال به پشتیبانی</button>
                            </div>

                            <label class="large-1 padding-right-1">
                                <select name="projectId" class="small-fontsize">
                                    {{--<option value="" disabled selected>پروژه</option>--}}
                                    @foreach($userProjects as $userProject)
                                        <option value="{{$userProject->id}}">{{$userProject->title}}</option>
                                    @endforeach
                                </select>
                            </label>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection