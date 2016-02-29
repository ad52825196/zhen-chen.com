<?php

// This function reads a file and replace all the place holders with real content.
function fillFile($replace, $filename) {
    $search = ['%keywords%', '%title%', '%canonical%', '%page_identifier%', '%active%', '%head%', '%foot%', '%alert%'];
    $subject = file_get_contents($filename);
    return str_replace($search, $replace, $subject);
}

?>
