@extends('layouts.home')

@section('body')
<div class="container status text-center">
<div class="mystatus">
    <h1 class="text-left">{{ __('status.my_status') }}</h1>
    <p id="alive">{!! __('status.alive') !!}</p>
    <p id="dead">{!! __('status.dead') !!}</p>
    <p>{!! __('status.doing') !!}</p>
    <p>
    {!! __('status.wish') !!}
    </p>
    <p>
    {!! __('status.life_goal') !!}
    </p>
    <p>{!! __('status.short_term_goal') !!}</p>
    <p>
    {!! __('status.project') !!}
    </p>
    <p>{!! __('status.book') !!}</p>
    <p>{!! __('status.game') !!}</p>
    <p>{!! __('status.movie') !!}</p>
    <p>{!! __('status.video') !!}</p>
    <p>
    {{ __('status.expectancy_1') }}
    <div id="clock">
    <div>
        <span class="days"></span>
        <div><small>{{ __('status.days') }}</small></div>
    </div>
    <div>
        <span class="hours"></span>
        <div><small>{{ __('status.hours') }}</small></div>
    </div>
    <div>
        <span class="minutes"></span>
        <div><small>{{ __('status.minutes') }}</small></div>
    </div>
    <div>
        <span class="seconds"></span>
        <div><small>{{ __('status.seconds') }}</small></div>
    </div>
    </div>
    {{ __('status.expectancy_2') }}
    </p>
    <p>{!! __('status.end') !!}</p>

</div>

<hr />

<div class="yourstatus">
    <h1 class="text-left">{{ __('status.your_status') }}</h1>
    <p>{!! __('status.waste') !!}</p>
</div>

<hr />

<div class="text-left">
<p>{!! __('status.update') !!}</p>
</div>
</div>

<script>
function getTimeRemaining(time) {
    if (time < 0) {
        time = 0;
    }
    var seconds = time % 60;
    var minutes = Math.floor(time / 60) % 60;
    var hours = Math.floor(time / (60 * 60)) % 24;
    var days = Math.floor(time / (60 * 60 * 24));
    return {
        'total': time,
        'days': days,
        'hours': hours,
        'minutes': minutes,
        'seconds': seconds
    };
}

function countdownClock(id, time) {
    var days = $(id + ' .days');
    var hours = $(id + ' .hours');
    var minutes = $(id + ' .minutes');
    var seconds = $(id + ' .seconds');

    function updateClock() {
        var t = getTimeRemaining(time--);
        days.html(t.days);
        hours.html(('0' + t.hours).slice(-2));
        minutes.html(('0' + t.minutes).slice(-2));
        seconds.html(('0' + t.seconds).slice(-2));

        if (t.total <= 0) {
            clearInterval(timeinterval);
            $('#alive').hide();
            $('#dead').show();
        }
    }

    var timeinterval = setInterval(updateClock, 1000);
}

function startTimer(display) {
    var timer = 0, minutes, seconds, text;
    setInterval(function () {
        minutes = Math.floor(timer / 60);
        seconds = timer % 60;

        text = seconds + " {{ __('status.seconds') }}";
        if (minutes > 0) {
            text = minutes + " {{ __('status.minutes') }} " + text;
        }
        display.html(text);
        ++timer;
    }, 1000);
}

var deadline = '2083-01-01'; // am i too optimistic?
var time = Math.floor((Date.parse(deadline) - Date.parse(new Date())) / 1000);
$('#dead').hide();
countdownClock('#clock', time);
startTimer($('#wastetime'));
</script>
@stop
