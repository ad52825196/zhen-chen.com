@extends('layouts.home')

@section('body')
<div class="jumbotron">
    <div class="container">
        <h1>{{ __('translation.title') }}</h1>
        <p>{{ __('translation.desc') }}</p>
    </div>
</div>

<div class="container">
<ol class="breadcrumb">
    <li><a href="/">Home</a></li>
    <li><a>Portfolio</a></li>
    <li class="active">Translation</li>
</ol>
</div>

<!-- Comment -->
<div class="container">
    @include('layouts.disqus')
</div>
@stop
