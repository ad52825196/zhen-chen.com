@extends('layouts.home')

@section('body')
<script>
$(document).ready(function() {
    $('#fullpage').fullpage({
        sectionsColor: ['#5281e0', '#4f83e3', '#4a87e8', '#468bec', '#418ef1', '#3c92f6', '#3895fa', '#3399ff'],
        anchors: [{!! __('me.anchors') !!}],
        navigationTooltips: [{!! __('me.navigationTooltips') !!}],
        navigation: true,
        navigationPosition: 'right',
        lazyLoading: false,
        recordHistory: false,
        paddingBottom: ($('footer').outerHeight(true) + 40) + 'px',
        loopBottom: true,
        normalScrollElements: 'nav.navbar',
        normalScrollElementTouchThreshold: 10,
    });
});
</script>

<div id="fullpage" class="me">
    <div class="section text-center">
        <img id="avatar" src="{!! $avatar or '' !!}" alt="avatar">
        <h1 class="text-capitalize">{{ __('me.name') }}</h1>
        <p id="desc">{{ __('me.desc') }}</p>
        <h4 class="text-capitalize">{{ __('me.occupation') }}</h4>
        <p><a href="mailto:me@zhen-chen.com" target="_blank" data-no-pjax>me@zhen-chen.com</a></p>
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

    <div class="section text-center">
        <h1 class="text-capitalize">{{ __('me.project') }}</h1>
        <div class="row">
            <div class="col-xs-6">
            <h2 class="text-capitalize"><a href="https://github.com/ad52825196/you-get-wrapper">You-Get Wrapper</a></h2>
            <p>{!! __('me.youget_desc') !!}</p>
            </div>
            <div class="col-xs-6">
            <h2 class="text-capitalize"><a href="https://github.com/ad52825196/chinese-segmentation">Chinese Word Segmentation</a></h2>
            <p>{!! __('me.chinese_desc') !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
            <h2 class="text-capitalize"><a href="https://github.com/ad52825196/infosys-280">Commodity Broker Project</a></h2>
            <p>{!! __('me.broker_desc') !!} <a href="/projects/commodity broker project.mp4" target="_blank" data-no-pjax>{{ __('me.demo') }}</a></p>
            </div>
            <div class="col-xs-6">
            <h2 class="text-capitalize"><a href="https://github.com/ad52825196/process-message-system">Process Message System</a></h2>
            <p>{!! __('me.process_desc') !!}</p>
            </div>
        </div>
        <p><a class="highlight" href="/portfolio/project" target="_blank" data-no-pjax>{{ __('me.project_more') }}</a></p>
    </div>

    <div class="section text-center">
        <h1 class="text-capitalize">{{ __('me.translation') }}</h1>
        <p>{!! __('me.translation_desc') !!}</p>
        <ul class="list-unstyled">
            <li>Anno 2205</li>
            <li>Far Cry 4</li>
            <li>Plants vs Zombies: Garden Warfare</li>
            <li>Tropico 5</li>
        </ul>
        <p><a class="highlight" href="/portfolio/translation" target="_blank" data-no-pjax>{{ __('me.translation_more') }}</a></p>
    </div>

    <div class="section text-center">
        <h1 class="text-capitalize">{{ __('me.education') }}</h1>
        <h4>{!! __('me.bachelor') !!}</h4>
        <p>{!! __('me.bachelor_major') !!} GPA: 8.8/9.0</p>
        <p>
            {!! __('me.bachelor_grade') !!}
            <span class="fa fa-check" aria-hidden="true"></span>
            <a href="https://www.myequals.net/#/sharelink/f1de7a8f-13f2-4b9d-b798-af6c6573d7bf/d48f3cd2-79ef-4b89-9a90-c2f2b513d271">{{ __('me.transcript') }}</a>
        </p>
        <h1 class="text-capitalize">{{ __('me.achievement') }}</h1>
        <div class="row">
            <div class="col-sm-2 col-md-3"></div>
            <div class="col-sm-8 col-md-6">
            <ul class="text-left">
                <li>Senior Scholar Award in the Faculty of Science</li>
                <li>Best BSc in Information System Award</li>
                <li>First in Course Award in 9 courses (more than 1/3 of all courses I have taken): <br>
                COMPSCI 105, COMPSCI 225, COMPSCI 230, COMPSCI 335, COMPSCI 373, INFOSYS 280, MATHS 108, MATHS 208, ECON 151G</li>
            </ul>
            </div>
            <div class="col-sm-2 col-md-3"></div>
        </div>
    </div>

    <div class="section">
        <h1 class="text-capitalize">{{ __('me.skill') }}</h1>
    </div>

    <div class="section text-center">
        <h1 class="text-capitalize">{{ __('me.experience') }}</h1>
        {!! __('me.experience_desc') !!}
        <h1 class="text-capitalize">{{ __('me.volunteer') }}</h1>
        {!! __('me.volunteer_desc') !!}
    </div>

    <div class="section text-center">
        <h1 class="text-capitalize">{{ __('me.current') }}</h1>
        <p>{!! __('me.current_desc') !!}</p>
        <ul class="list-unstyled">
            {!! __('me.current_item') !!}
        </ul>
    </div>

    <div class="section text-center">
        <h1 class="text-capitalize">{{ __('me.contact') }}</h1>
        <h2>Email: <a href="mailto:me@zhen-chen.com" target="_blank" data-no-pjax>me@zhen-chen.com</a></h2>
        <h4 class="text-capitalize">
            <a href="/" target="_blank" data-no-pjax>{{ __('me.website') }}</a>
            |
            <a href="https://zhen-chen.xyz/" target="_blank" data-no-pjax>{{ __('me.studio') }}</a>
        </h4>
        <h2><a class="highlight" href="/cv" target="_blank" data-no-pjax>{{ __('me.cv') }}</a></h2>
        <div class="social-panel">
            <a href="https://github.com/ad52825196"><span class="fa fa-github fa-2x"></span></a>
        </div>
    </div>
</div>
@stop
