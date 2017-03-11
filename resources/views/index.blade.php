@extends('layouts.home')

@section('body')
<div class="jumbotron center">
    <div class="container">
        <h1>"{{ $quote }}"</h1>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-4 index-item">
            <h2>{{ __('index.about') }}</h2>
            <p>{{ __('index.about_desc') }}</p>
            <p><a class="btn btn-default" role="button" href="/me">{{ __('index.go') }} >></a></p>
        </div>
        <div class="col-md-4 index-item">
            <h2>{{ __('index.blog') }}</h2>
            <p>{{ __('index.blog_desc') }}</p>
            <p><a class="btn btn-default" role="button" href="https://blog.zhen-chen.com/">{{ __('index.go') }} >></a></p>
        </div>
        <div class="col-md-4 index-item">
            <h2>{{ __('index.studio') }}</h2>
            <p>{{ __('index.studio_desc') }}</p>
            <p><a class="btn btn-default" role="button" href="https://zhen-chen.xyz/">{{ __('index.go') }} >></a></p>
        </div>
    </div>
</div>

<script>
$('#body .index-item').each(function(index) {
    $(this).delay(index * 200).fadeIn(200);
});
</script>
@stop
