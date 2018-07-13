@if ($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-primary">
            <span>{{$error}}</span>
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-success">
        <span>{{session('success')}}</span>
    </div>
@endif