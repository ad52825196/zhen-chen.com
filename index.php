<?php

require_once 'functions.php';

$head = '<link rel="stylesheet" href="/css/cover.css" />';

// $search = ['%keywords%', '%title%', '%canonical%', '%page_identifier%', '%active%'];
$replace = ['飞越彩虹, 新西兰, 奥克兰, 奥克兰大学, 上海交通大学, New Zealand, Auckland, University of Auckland, Shanghai Jiao Tong University, Computer Science, Information System, Zhen Chen', 'Zhen Chen | 飞越彩虹', 'https://zhen-chen.com/', 'zhen-chen.com', 'home', $head];

fillFile($replace, 'header.html');

?>

<div class="wrapper">
    <h1>Welcome</h1>

    <p class="lead">Greetings from New Zealand! My name is Zhen Chen (陈桢). I was a student in IEEE class at <a href="http://www.sjtu.edu.cn/">Shanghai Jiao Tong University</a>. Now I am studying Computer Science and Information System at <a href="https://www.auckland.ac.nz/en.html">The University of Auckland</a>.</p>

    <p class="lead">Feel free to <a href="about">contact me</a>, <a href="guestbook">leave your words</a>, or have a look at <a href="//blog.zhen-chen.com/">my blog</a>.</p>
</div>

</div>
<!-- End Container -->

<script src="/js/jquery-1.11.3.min.js"></script>
<script src="/js/jquery.lazyload.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/main.js"></script>

<script>$('#home').addClass('active');</script>
</body>
</html>
