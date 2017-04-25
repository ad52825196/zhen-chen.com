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

<ol class="breadcrumb">
    @forelse (array_keys($projects) as $category)
    <li><a href="#{{ $category }}">{{ $category }}</a></li>
    @empty
    <li class="active">No records.</li>
    @endforelse
</ol>

<div class="project">
@foreach ($projects as $category => $value)
    <h1 id="{{ $category }}">{{ $category }}</h1>
    <ul>
    @foreach ($value as $project)
        <li>
        <h3>
        @if ($project['link'] === null)
        {{ $project['name'] }}
        @else
        <a href="/projects/{{ $project['link'] }}" target="_blank" data-no-pjax>{{ $project['name'] }}</a>
        @endif
        @if ($project['source'] !== null)
        <small><a href="{{ $project['source'] }}" target="_blank">{{ __('project.source') }}</a></small>
        @endif
        </h3>
        <p>{!! $project['desc'] !!}</p>
        @if ($project['image'] !== null)
        <p><a href="/images/project/{{ $project['image'] }}" target="_blank" data-no-pjax><img src="/images/project/{{ $project['image'] }}" width="400" /></a></p>
        @endif
        </li>
    @endforeach
    </ul>
@endforeach
</div>
</div>

<!-- Comment -->
<div class="container">
    @include('layouts.disqus')
</div>
@stop
