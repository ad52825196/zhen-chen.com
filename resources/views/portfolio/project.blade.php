@extends('layouts.home')

@section('body')
<div class="jumbotron">
    <div class="container">
        <h1>{{ __('project.title') }}</h1>
        <p>{{ __('project.desc') }}</p>
        <p><a class="btn btn-primary btn-lg" href="https://github.com/ad52825196">GitHub</a></p>
    </div>
</div>

<div class="container">
<ol class="breadcrumb">
    <li><a href="/">Home</a></li>
    <li><a>Portfolio</a></li>
    <li class="active">Project</li>
</ol>
</div>

<!-- Comment -->
<div class="container">
    @include('layouts.disqus')
</div>
@stop
