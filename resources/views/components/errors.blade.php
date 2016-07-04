@if(!empty($errors->all()))
    <div class="alert alert-warning">
        <h4>Ocurrieron errores:</h4>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </div>
@endif