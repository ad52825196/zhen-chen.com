@extends('layouts.home')

@section('body')
<div class="container text-center">
<h1>404 Sorry, this is not the web page you are looking for.</h1>
<h2>{{ $exception -> getMessage() }}</h2>
<p><a class="btn btn-success btn-lg" href="/" role="button">Home</a></p>
</div>
@stop
