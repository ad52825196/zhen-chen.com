@extends('layouts.home')

@section('body')
<div class="jumbotron">
    <div class="container">
        <h1>{{ __('changelog.title') }}</h1>
        <p>{{ __('changelog.desc') }}</p>
        <p>{!! __('changelog.website') !!}</p>
    </div>
</div>

<div class="container changelog">
<h1 id="2013">2013</h1>
<h3>2013-05</h3>
<ul>{!! __('changelog.2013_05') !!}</ul>
<h3>2013-07</h3>
<ul>{!! __('changelog.2013_07') !!}</ul>
<h3>2013-11</h3>
<ul>{!! __('changelog.2013_11') !!}</ul>
<h3>2013-12</h3>
<ul>{!! __('changelog.2013_12') !!}</ul>

<h1 id="2014">2014</h1>
<h3>2014-01</h3>
<ul>{!! __('changelog.2014_01') !!}</ul>
<h3>2014-02</h3>
<ul>{!! __('changelog.2014_02') !!}</ul>
<h3>2014-03</h3>
<ul>{!! __('changelog.2014_03') !!}</ul>
<h3>2014-09</h3>
<ul>{!! __('changelog.2014_09') !!}</ul>
<h3>2014-11</h3>
<ul>{!! __('changelog.2014_11') !!}</ul>
<h3>2014-12</h3>
<ul>{!! __('changelog.2014_12') !!}</ul>

<h1 id="2015">2015</h1>
<h3>2015-02</h3>
<ul>{!! __('changelog.2015_02') !!}</ul>
<h3>2015-03</h3>
<ul>{!! __('changelog.2015_03') !!}</ul>
<h3>2015-06</h3>
<ul>{!! __('changelog.2015_06') !!}</ul>
<h3>2015-08</h3>
<ul>{!! __('changelog.2015_08') !!}</ul>
<h3>2015-09</h3>
<ul>{!! __('changelog.2015_09') !!}</ul>
<h3>2015-11</h3>
<ul>{!! __('changelog.2015_11') !!}</ul>
<h3>2015-12</h3>
<ul>{!! __('changelog.2015_12') !!}</ul>

<h1 id="2016">2016</h1>
<h3>2016-01</h3>
<ul>{!! __('changelog.2016_01') !!}</ul>
<h3>2016-03</h3>
<ul>{!! __('changelog.2016_03') !!}</ul>
<h3>2016-04</h3>
<ul>{!! __('changelog.2016_04') !!}</ul>
<h3>2016-08</h3>
<ul>{!! __('changelog.2016_08') !!}</ul>
<h3>2016-12</h3>
<ul>{!! __('changelog.2016_12') !!}</ul>

<h1 id="2017">2017</h1>
<h3>2017-02</h3>
<ul>{!! __('changelog.2017_02') !!}</ul>
<h3>2017-03</h3>
<ul>{!! __('changelog.2017_03') !!}</ul>
<h3>2017-04</h3>
<ul>{!! __('changelog.2017_04') !!}</ul>
<h3>2017-05</h3>
<ul>{!! __('changelog.2017_05') !!}</ul>

<h1 id="2018">2018</h1>
</div>

<!-- Comment -->
<div class="container">
    @include('layouts.disqus')
</div>
@stop
