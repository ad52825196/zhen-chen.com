@extends('layouts.home')

@section('body')
<script>
$(document).ready(function() {
    $('#fullpage').fullpage({
        sectionsColor: ['#3399ff', '#3e91f4', '#4988e9', '#5281e0', '#4988e9', '#3e91f4', '#3399ff'],
        anchors: [{!! __('me.anchors') !!}],
        navigationTooltips: [{!! __('me.navigationTooltips') !!}],
        navigation: true,
        navigationPosition: 'left',
        lazyLoading: false,
        recordHistory: false,
        paddingBottom: ($('footer').outerHeight(true) + 20) + 'px',
        loopBottom: true,
    });
});
</script>

<div id="fullpage" class="me">
    <div class="section text-center">
        <img id="avatar" src="{!! $avatar or '' !!}" alt="avatar">
        <h1 class="text-capitalize">{{ __('me.name') }}</h1>
        <p id="desc">{{ __('me.desc') }}</p>
        <h4 class="text-capitalize">{{ __('me.occupation') }}</h4>
        <p><a href="mailto:me@zhen-chen.com" data-no-pjax>me@zhen-chen.com</a></p>
        <ul class="nav nav-pills" id="lang">
            <li role="presentation"
            @if (App::isLocale('en'))
            class="active"
            @endif
            ><a
            @if (!App::isLocale('en'))
            href="?lang=en"
            @endif
            >En</a></li>
            <li role="presentation"
            @if (App::isLocale('zh'))
            class="active"
            @endif
            ><a
            @if (!App::isLocale('zh'))
            href="?lang=zh"
            @endif
            >中</a></li>
        </ul>
        <p id="pageview" class="text-capitalize">{{ $pageview or '0' }} {{ __('me.pageview') }}</p>
    </div>
    <div class="section">
        <h1 class="text-capitalize">{{ __('me.project') }}</h1>
        <h1 class="text-capitalize">{{ __('me.translation') }}</h1>
    </div>
    <div class="section">
        <h1 class="text-capitalize">{{ __('me.education') }}</h1>
        <h1 class="text-capitalize">{{ __('me.achievement') }}</h1>
    </div>
    <div class="section">
        <h1 class="text-capitalize">{{ __('me.skill') }}</h1>
    </div>
    <div class="section">
        <h1 class="text-capitalize">{{ __('me.experience') }}</h1>
        <h1 class="text-capitalize">{{ __('me.volunteer') }}</h1>
    </div>
    <div class="section">
        <h1 class="text-capitalize">{{ __('me.current') }}</h1>
    </div>
    <div class="section">
        <h1 class="text-capitalize">{{ __('me.contact') }}</h1>
    </div>
</div>
@stop
