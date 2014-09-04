<?php
// variables

// the title displayed on the web interface
$programtitle = "Controller";








//functions

function clean($string) {
   //$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   return preg_replace('/[^A-Za-z0-9 _\-]/', '', $string); // Removes special chars.
}
?>