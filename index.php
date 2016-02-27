<?php

require_once 'functions.php';

$keywords = '飞越彩虹, 新西兰, 奥克兰, 奥克兰大学, 上海交通大学, New Zealand, Auckland, University of Auckland, Shanghai Jiao Tong University, Computer Science, Information System, Zhen Chen';
$title = 'Zhen Chen | 飞越彩虹';
$canonical = 'https://zhen-chen.com/';
$page_identifier = '';
$active = 'home';
$head = '<link rel="stylesheet" href="/css/cover.css" />';
$foot = '<script src="/js/cover.js"></script>';

$replace = [$keywords, $title, $canonical, $page_identifier, $active, $head, $foot];

fillFile($replace, 'header.html');

?>

<div class="wrapper">
    <h1>Kia Ora</h1>

    <p class="lead">Greetings from New Zealand! My name is Zhen Chen (陈桢). I was a student in IEEE class at <a href="http://www.sjtu.edu.cn/">Shanghai Jiao Tong University</a>. Now I am studying Computer Science and Information System at <a href="https://www.auckland.ac.nz/en.html">The University of Auckland</a>. Currently, I am also a demonstrator for undergraduate labs in Computer Science department.</p>

    <p class="lead">Feel free to <a href="about">contact me</a>, <a href="guestbook">leave your words</a>, or have a look at my <a href="//blog.zhen-chen.com/">blog</a>.</p>
</div>

<?php

fillFile($replace, 'footer.html');

?>
