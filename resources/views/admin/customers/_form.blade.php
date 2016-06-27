@if (isset($errors) && (count($errors) > 0))
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    {{ Form::label('voornaam', 'Voornaam') }} <em>*</em>
    {{ Form::text('voornaam', null, ['class' => 'form-control', 'id' => 'name', 'required' => 'required']) }}
</div>

<div class="form-group">
    {{ Form::label('achternaam', 'Achternaam') }} <em>*</em>
    {{ Form::email('achternaam', null, ['class' => 'form-control', 'id' => 'achternaam']) }}
</div>

<div class="form-group">
    {{ Form::label('email', 'Email') }} <em>*</em>
    {{ Form::email('email', ['class' => 'form-control', 'id' => 'password']) }}
</div>

<div class="form-group">
    {{ Form::submit('Submit', ['class' => 'btn btn-success']) }}
</div>
