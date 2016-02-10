<?php

function fillFile($replace, $filename) {
    $search = [
        '%keywords%', 
        '%title%', 
        '%canonical%', 
        '%page_identifier%', 
        '%active%', 
        '%head%'];
    $subject = file_get_contents($filename);
    echo str_replace($search, $replace, $subject);
}

?>
