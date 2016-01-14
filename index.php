<?php

set_time_limit(120);

require 'Beeper.php';

$arg1 = isset($argv[1]) ? intval($argv[1]) : 0;

$beeper = new Beeper();

$freq = 2000;

$dt = new \DateTime();
$dt->setTimezone(new \DateTimeZone('Europe/Kiev'));
$hour = intval($dt->format('G')) + 1;

while (true) {
    usleep(10000);
    $dt = new \DateTime();
    $dt->setTimezone(new \DateTimeZone('Europe/Kiev'));
    $sec = intval(ltrim($dt->format('s'), '0'));
    if ($sec == 55) {
        break;
    }
}

if ($arg1 == 0) {
    $freq1 = $freq;
    $freq2 = $freq;
} elseif ($arg1 == 1) {
    $freq1 = $freq;
    $freq2 = 0;
} elseif ($arg1 == 2) {
    $freq1 = 0;
    $freq2 = $freq;
}

$beeper->beep($freq1, 100, 900);
$beeper->beep($freq2, 100, 900);
$beeper->beep($freq1, 100, 900);
$beeper->beep($freq2, 100, 900);
$beeper->beep($freq1, 100, 900);
$beeper->beep($freq2, 100 + $hour * 20);
