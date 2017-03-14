@extends('layouts.home')

@section('body')
<div class="jumbotron">
    <div class="container">
        <h1>{{ __('changelog.title') }}</h1>
        <p>{{ __('changelog.desc') }}</p>
        <p>{!! __('changelog.website') !!}</p>
    </div>
</div>

<div class="container">
    {!! __('changelog.logs') !!}
</div>
@stop
