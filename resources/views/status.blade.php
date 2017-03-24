@extends('layouts.home')

@section('body')
<div class="container status text-center">
<div class="mystatus">
    <h1 class="text-left">My status</h1>
    <p>Zhen is <span>alive</span>. <small>Cogito, ergo sum.</small></p>
    <p>Zhen is <span>looking for jobs</span>.</p>
    <p>
    Zhen has <a href="#wish" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="wish"><span>1</span></a> wish for his life.
    <div class="collapse" id="wish">
        <div class="well">
            <ul>
                <li>To enjoy countless wealth with ever-healthy family members in a peaceful world. Nothing more.</li>
            </ul>
        </div>
    </div>
    </p>
    <p>
    Zhen has <a href="#lifegoal" role="button" data-toggle="collapse" aria-expanded="false" aria-controls="lifegoal"><span>3</span></a> life goals to achieve.
    <div class="collapse" id="lifegoal">
        <div class="well">
            <ul>
                <li>(hidden)</li>
                <li>To visit Niagara Falls, Tekapo, and a secret place with her before 30.</li>
                <li>To give her happy life.</li>
            </ul>
        </div>
    </div>
    </p>
    <p>Zhen has <span>3</span> short term goals to achieve.</p>
    <p>Zhen has <span>4</span> projects to do.</p>
    <p>Zhen has more than <span>50</span> books to read.</p>
    <p>Zhen has more than <span>100</span> games to play.</p>
    <p>Zhen has more than <span>100</span> movies to watch.</p>
    <p>Zhen has more than <span>150</span> videos to watch.</p>
    <p>
    Zhen has an estimated expectancy of
    <div id="clock">
    <div>
        <span class="days"></span>
        <div><small>days</small></div>
    </div>
    <div>
        <span class="hours"></span>
        <div><small>hours</small></div>
    </div>
    <div>
        <span class="minutes"></span>
        <div><small>minutes</small></div>
    </div>
    <div>
        <span class="seconds"></span>
        <div><small>seconds</small></div>
    </div>
    </div>
    left to live his life.
    </p>
    <p>When Zhen is dead, he will no longer be able to love, to code, to play, to dream a dream, or to pursue his life goals.</p>

</div>

<hr />

<div class="yourstatus">
    <h1 class="text-left">Your status</h1>
    <p>You have wasted <span id="wastetime"></span> of your life looking at this boring page.</p>
</div>

<hr />

<div class="text-left">
<p>Last updated on <strong>24 March 2017</strong></p>
</div>
</div>

<script>
function getTimeRemaining(time) {
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
        }
    }

    var timeinterval = setInterval(updateClock, 1000);
}

function startTimer(display) {
    var timer = 0, minutes, seconds, text;
    setInterval(function () {
        minutes = Math.floor(timer / 60);
        seconds = timer % 60;

        text = seconds + " seconds";
        if (minutes > 0) {
            text = minutes + " minutes " + text;
        }
        display.html(text);
        ++timer;
    }, 1000);
}

var deadline = '2083-01-01'; // am i too optimistic?
var time = Math.floor((Date.parse(deadline) - Date.parse(new Date())) / 1000);
countdownClock('#clock', time);
startTimer($('#wastetime'));
</script>
@stop
