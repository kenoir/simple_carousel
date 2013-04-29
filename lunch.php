<html>
    <head>
        <style>
            body {
                zoom: 2;
                background: #eee8d5;
                color: #586e75;
                font-family: sans-serif
            }
            td,th {
                text-align: center
            }
        </style>
</head>
<body>

<?php

require_once('inc.php');

$menu = Utility::fetch('http://www.bbcclub.com/together/media-centre/todays-menu', 8);

preg_match(',(<h1>Today.s Menu</h1>.*)<footer class="orange">,s', $menu, $regs);
echo "<center>";

$x = @$regs[1];
if (!$x) {
    die("MENU PAGE IS SAD");
}

echo $x;

