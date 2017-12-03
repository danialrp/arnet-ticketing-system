<div class="top-bar">
    <div class="align-center">
        <div class="h5 bold-font white-text align-center padding-left-1">سیستم پشتیبانی آرنت</div>
    </div>
    <div class="top-bar-right">
        <ul class="menu padding-right-2">
            @if(Auth::user())
                <li class="menu-text small-fontsize grey-text">
                    <i class="fa fa-user-circle-o"></i>
                    <span>{{Auth::user()->fname}}</span>
                    <span>{{Auth::user()->lname}}</span>
                    <span> -- </span>
                    @if(Auth::user()->login_time)
                        <span>{{ 'آخرین ورود: '. Verta::parse(Auth::user()->login_time)->format('l j %B %y - H:i') }}</span>
                    @else
                        <span>آخرین ورود: -</span>
                    @endif
                </li>
            @endif
            <li><a class="button tiny small-fontsize alert" href="{{action('UserLoginController@logout')}}">خروج</a></li>
        </ul>
    </div>
</div>

<div class="top-bar">
    <div id="main-menu" class="top-bar-left">
        <ul class="menu white-text mid-fontsize">
            <li>
                <a href="{{url('/dashboard')}}"><i class="fa fa-bar-chart fa-flip-horizontal"></i>
                    <span class="bold-font padding-horizontal-0-3 small-fontsize-2"> داشبورد </span>
                </a>
            </li>

            <li>
                <a href="{{url('/tickets')}}"><i class="fa fa-commenting-o"></i>
                    <span class="bold-font padding-horizontal-0-3 small-fontsize-2"> درخواست‌ها </span>
                </a>
            </li>

            <li>
                <a href="{{url('/invoices')}}"><i class="fa fa-th-large"></i>
                    <span class="bold-font padding-horizontal-0-3 small-fontsize-2"> فاکتورها </span>
                </a>
            </li>

            <li>
                <a class="button tiny small-fontsize-2 bold-font ticket-button" href="{{url('/tickets/new')}}">
                    <i class="fa fa-plus padding-horizontal-0-3"></i>
                    <span>درخواست جدید</span>
                </a>
            </li>
        </ul>
    </div>
</div>
