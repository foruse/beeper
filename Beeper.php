<?php

class Beeper
{
    public function beep($freq, $length, $delay = 0)
    {
        if ($freq == 0) {
            usleep(($length + $delay) * 1000);
            return;
        }
        $cmd = 'beep -f ' . intval(round($freq)) . ' -l ' . intval(round($length));
        if ($delay) {
            $cmd .= ' -D ' . intval(round($delay));
        }
        passthru($cmd);
    }
}
