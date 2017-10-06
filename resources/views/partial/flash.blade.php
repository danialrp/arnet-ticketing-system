<div id="flash-message">
    @if ($errors->any())
        <div class="row expanded">
            <div class="large-12 columns">
                <div class="callout alert" data-closable>
                    <span class="">{{$errors->first()}}</span>
                    <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @elseif(Session::has('message'))
        <div class="row expanded">
            <div class="large-12 columns">
                <div class="callout notice" data-closable>
                    <span class="">{{Session::get('message')}}</span>
                    <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>


{{--
<div id="flash-message">
    @if ($errors->any())
        <div class="row expanded">
            <div class="large-3 columns">
                <div class="callout alert" data-closable>
                    @foreach ($errors->all() as $error)
                        <p class="small-fontsize">{{$error}}</p>
                    @endforeach
                    <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @elseif(Session::has('message'))
        <ul class="">
            <li class="message-item"> {{ Session::get('message') }} </li>
        </ul>
    @endif
</div>
--}}
