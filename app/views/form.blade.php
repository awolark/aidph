<html>
<head>

</head>
<body>



{{ Form::open(['action' => 'AreasController@store', 'class' => 'form']) }}

{{--@foreach ($errors as $e)--}}

{{--{{dd($errors)}}--}}

{{--@endforeach--}}

<div class="form-group">
    {{ Form::label('name', 'name') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
{{--    {{ $errors->first('name', '<span class="error">:message</span>') }}--}}
</div>



<div class="form-group">
    {{ Form::submit('Add Area', ['class' => 'btn btn-primary']) }}
</div>
{{ Form::close() }}
</body>
</html>

