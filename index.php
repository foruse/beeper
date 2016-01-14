<?php

set_time_limit(120);

require 'Beeper.php';

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
$beeper->beep($freq, 100, 900);
$beeper->beep($freq, 100, 900);
$beeper->beep($freq, 100, 900);
$beeper->beep($freq, 100, 900);
$beeper->beep($freq, 100, 900);
$beeper->beep($freq, 100 + $hour * 20);
