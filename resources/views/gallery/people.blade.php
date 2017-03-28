@extends('layouts.home')

@section('body')
<div class="jumbotron">
    <div class="container">
        <h1 class="text-center">{{ __('people.title') }}</h1>
    </div>
</div>

<div class="container">
<ol class="breadcrumb">
    <li><a href="/">Home</a></li>
    <li><a>Gallery</a></li>
    <li class="active">People</li>
</ol>

<table class="table table-hover">
    <thead>
        <tr>
            <th>{{ __('people.name') }}</th>
            <th>{{ __('people.website') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($people as $person)
        <tr>
            <td>{{ $person['name'] }}</td>
            <td><a href="{{ $person['link'] }}">{{ $person['link'] }}</a></td>
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
