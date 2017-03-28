@extends('layouts.home')

@section('body')
<div class="container">
<h1 class="text-center">{{ __('people.title') }}</h1>
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
            <td>{{ $person->name }}</td>
            <td>{{ $person->link }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@stop
