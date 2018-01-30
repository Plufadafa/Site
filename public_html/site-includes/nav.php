<?php

$greenhousedropdown = $greenhouse1 = $greenhouse2 = $greenhouse3 = $main = $outdoors = "";
if (strpos($_SERVER['REQUEST_URI'], "greenhouse-1") == true) {
    $greenhouse1 = 'class="active"';
    $greenhousedropdown = 'class="active"';
}
if (strpos($_SERVER['REQUEST_URI'], "greenhouse-2") == true) {
    $greenhouse2 = 'class="active"';
    $greenhousedropdown = 'class="active"';
}
if (strpos($_SERVER['REQUEST_URI'], "greenhouse-3") == true) {
    $greenhouse3 = 'class="active"';
    $greenhousedropdown = 'class="active"';
}
if (strpos($_SERVER['REQUEST_URI'], "main-house") == true) {
    $main = 'class="active"';
}
if (strpos($_SERVER['REQUEST_URI'], "outdoor-beds") == true) {
    $outdoors = 'class="active"';
}
echo " 
<!-- Dropdown Structure for Desktop Nav -->
<ul id='dropdown1' class='dropdown-content'>
    <li $greenhouse1><a href=\"greenhouse-1.php\"><i class=\"material-icons left\">web_asset</i>Green House 1</a></li>
    <li class=\"divider\"></li>
    <li $greenhouse2><a href=\"greenhouse-2.php\"><i class=\"material-icons left\">web_asset</i>Green House 2</a></li>
    <li class=\"divider\"></li>
    <li $greenhouse3><a href=\"greenhouse-3.php\"><i class=\"material-icons left\">web_asset</i>Green House 3</a></li>
</ul>
<!-- Dropdown Structure for Mobile nav -->
<ul id='dropdown2' class='dropdown-content'>
    <li $greenhouse1><a href=\"greenhouse-1.php\"><i class=\"material-icons left\">web_asset</i>Green House 1</a></li>
    <li class=\"divider\"></li>
    <li $greenhouse2><a href=\"greenhouse-2.php\"><i class=\"material-icons left\">web_asset</i>Green House 2</a></li>
    <li class=\"divider\"></li>
    <li $greenhouse3><a href=\"greenhouse-3.php\"><i class=\"material-icons left\">web_asset</i>Green House 3</a></li>
</ul>
<div class = \"navbar-fixed grey darken-1\">
    <nav>
        <div class = \"nav-wrapper container\">
            <a href = \"index.php\" class = \"brand-logo\">Dashboard</a>
            <a href = \"#\" data-activates = \"mobile-demo\" class = \"button-collapse\"><i class = \"material-icons\">menu</i></a>
            <ul class = \"right hide-on-med-and-down\">
                <li $main><a href = \"main-house.php\"><i class=\"material-icons left\">home</i>Main House</a></li>
                <!-- Dropdown Trigger -->
                <li $greenhousedropdown><a class=\"dropdown-button\" href=\"#!\" data-activates=\"dropdown1\"><i class=\"material-icons left\">web_asset</i>Green Houses<i class=\"material-icons right\">arrow_drop_down</i></a></li>
                <li $outdoors><a href = \"outdoor-beds.php\"><i class=\"material-icons left\">nature_people</i>Outdoor Beds</a></li>
            </ul>
        </div>
    </nav>
</div>
<ul class = \"side-nav\" id = \"mobile-demo\">
    <li><a href = \"index.php\" class = \"brand-logo\">Dashboard</a></li>
    <li $main><a href = \"main-house.php\"><i class=\"material-icons left\">home</i>Main House</a></li>
    <li $greenhousedropdown><a class=\"dropdown-button\" href=\"#!\" data-activates=\"dropdown2\"><i class=\"material-icons left\">web_asset</i>Green Houses<i class=\"material-icons right\">arrow_drop_down</i></a></li>
    <li $outdoors><a href = \"outdoor-beds.php\"><i class=\"material-icons left\">nature_people</i>Outdoor Beds</a></li>
</ul>";
?>