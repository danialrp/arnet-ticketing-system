<div class="top-bar">
    <div class="align-center">
        <div class="h5 bold-font white-text align-center">سیستم پشتیبانی آرنت</div>
    </div>
    <div class="top-bar-tight">
        <ul class="menu">
            <li class="menu-text eng-font small-fontsize-2 grey-text">
                @if(Auth::user())
                    <span>{{Auth::user()->email}}</span>
                    <i class="fa fa-user-circle-o"></i>
                @endif
            </li>
            <li><a class="button tiny small-fontsize alert" href="{{url('/logout')}}">خروج</a></li>
        </ul>
    </div>
</div>

<div class="top-bar">
    <div id="main-menu" class="top-bar-left">
        <ul class="menu white-text mid-fontsize">
            <li>
                <a href="{{url('/dashboard')}}"><i class="fa fa-bar-chart fa-flip-horizontal">
                    </i><span class="bold-font padding-horizontal-0-3 small-fontsize-2"> داشبورد </span>
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
