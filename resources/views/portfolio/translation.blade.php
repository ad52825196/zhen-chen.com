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

{{ $links or '' }}
<ul class="list-unstyled">
    @foreach ($translations as $translation)
    <li>
        <h1>
        {{ $translation['id'] }}.
        {{ $translation['game_en'] or '' }}
        {{ $translation['game_zh'] or '' }}
        @if ($translation['link'] !== null)
        <a href="{{ $translation['link'] }}">#</a>
        @endif
        </h1>
        <h2><span class="text-capitalize">{{ $translation['role'] }}</span> - {{ $translation['nickname'] }}</h2>
        @if ($translation['image'] !== null)
        <p><a href="/images/translation/{{ $translation['image'] }}" target="_blank" data-no-pjax><img src="/images/translation/{{ $translation['image'] }}" width="400" /></a></p>
        @endif
    </li>
    @endforeach
</ul>
{{ $links or '' }}
</div>

<!-- Comment -->
<div class="container">
    @include('layouts.disqus')
</div>
@stop
