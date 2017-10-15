@if($errors->any())
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <div class="small-fontsize">{{ $errors->first() }}</div>
    </div>
@elseif(Session::has('message'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <div class="small-fontsize">{{ Session::get('message') }}</div>
    </div>
@endif
