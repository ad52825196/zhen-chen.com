@extends('layouts.home')

@section('body')
<div class="jumbotron">
    <div class="container">
        <h1>{{ __('video.title') }}</h1>
        <p>{{ __('video.desc') }}</p>
    </div>
</div>

<div class="container">
<ol class="breadcrumb">
    <li><a href="/">Home</a></li>
    <li><a>Portfolio</a></li>
    <li class="active">Video</li>
</ol>

<table class="table table-hover">
    <tbody>
        @foreach ($videos as $video)
        <tr>
            <td>{{ $video['id'] }}. </td>
            <td>{{ $video['name'] }}</td>
            @if ($video['source'] === null)
            <td>Not available</td>
            @else
            <td><a href="{{ $video['link'] }}">{{ $video['link_name'] }}</a></td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
</div>

<!-- Comment -->
<div class="container">
    @include('layouts.disqus')
</div>
@stop