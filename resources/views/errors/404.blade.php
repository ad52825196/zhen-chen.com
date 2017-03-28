@extends('layouts.home')

@section('body')
<div class="container text-center">
<h1>404</h1>
<h2>{{ __('404.title') }}</h2>
<h2>{{ $exception -> getMessage() }}</h2>
<p><a class="btn btn-success btn-lg" href="/" role="button">{{ __('404.home') }}</a></p>
</div>
@stop
