<div id="login-error">
    @if ($errors->any())
        <div class="row">
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
        <ul class="">
            <li class="message-item"> {{ Session::get('message') }} </li>
        </ul>
    @endif
</div>