@extends('layouts.home')

@section('body')
<div class="jumbotron">
    <div class="container text-justify">
        <h1>{{ __('guestbook.title') }}</h1>
        <p>{{ __('guestbook.desc') }}</p>
        <p><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#donate-modal">{{ __('guestbook.donate') }}</button></p>
    </div>
</div>

<!-- Modal -->
@include('modals.donate')

<!-- Comment -->
<div class="container">
    @include('layouts.disqus')
</div>
@stop
