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
<ol class="breadcrumb">
    @forelse (array_reverse(array_keys($changelogs)) as $year)
    <li><a href="#{{ $year }}">{{ $year }}</a></li>
    @empty
    <li class="active">No records.</li>
    @endforelse
</ol>

<div class="changelog">
@foreach ($changelogs as $key => $value)
    <h1 id="{{ $key }}">{{ $key }}</h1>
    @foreach ($value as $logs)
        <h3>{{ $logs[0]['time'] }}</h3>
        <ul>
            @foreach ($logs as $log)
            <li>{!! $log['log'] !!}</li>
            @endforeach
        </ul>
    @endforeach
@endforeach
</div>
</div>

<!-- Comment -->
<div class="container">
    @include('layouts.disqus')
</div>
@stop
