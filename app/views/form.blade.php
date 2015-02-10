<html>
<head>

</head>
<body>



{{ Form::open(array('action'=>'RegistrationController@register', 'method' => 'post')) }}


<div class="form-group">
    {{ Form::label('area_id', 'area_id') }}
    {{ Form::text('area_id', null, ['class' => 'form-control']) }}
{{--    {{ $errors->first('name', '<span class="error">:message</span>') }}--}}
</div>

<div class="form-group">
    {{ Form::label('username', 'username') }}
    {{ Form::text('username', null, ['class' => 'form-control']) }}
{{--    {{ $errors->first('name', '<span class="error">:message</span>') }}--}}
</div>

<div class="form-group">
    {{ Form::label('email', 'email') }}
    {{ Form::text('email', null, ['class' => 'form-control']) }}
{{--    {{ $errors->first('name', '<span class="error">:message</span>') }}--}}
</div>

<div class="form-group">
    {{ Form::label('role', 'role') }}
    {{ Form::text('role', null, ['class' => 'form-control']) }}
{{--    {{ $errors->first('name', '<span class="error">:message</span>') }}--}}
</div>

<div class="form-group">
    {{ Form::submit('Add Area', ['class' => 'btn btn-primary']) }}
</div>
{{ Form::close() }}
</body>
</html>

