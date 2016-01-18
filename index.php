<?php

set_time_limit(120);

require 'Beeper.php';

$arg1 = isset($argv[1]) ? strval($argv[1]) : '0';

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

$freqs = [];
if ($arg1[0] === 'n') {
    $freqs = [0, 0, 0, 0, 0, 0];
    $str = (string)$arg1;
    for ($i = 1; $i < strlen($str); $i++) {
        $n = intval($str[$i]);
        if ($n >= 1 && $n <= 6) {
            $freqs[$n - 1] = $freq;
        }
    }
} else {
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
    $freqs = [$freq1, $freq2, $freq1, $freq2, $freq1, $freq2];
}

$beeper->beep($freqs[0], 100, 900);
$beeper->beep($freqs[1], 100, 900);
$beeper->beep($freqs[2], 100, 900);
$beeper->beep($freqs[3], 100, 900);
$beeper->beep($freqs[4], 100, 900);
$beeper->beep($freqs[5], 100 + $hour * 20);
