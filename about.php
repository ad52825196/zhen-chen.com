<?php

require_once 'functions.php';

$keywords = '飞越彩虹, Zhen Chen';
$title = 'About | Zhen Chen';
$canonical = 'https://zhen-chen.com/about';
$page_identifier = '';
$active = 'about';
$head = '';
$foot = '';
$alert = '';

$replace = [$keywords, $title, $canonical, $page_identifier, $active, $head, $foot, $alert];

echo fillFile($replace, 'header.html');

?>

<?php

echo fillFile($replace, 'footer.html');

?>
