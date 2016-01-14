<?php

class Beeper
{
    public function beep($freq, $length, $delay = 0)
    {
        $cmd = 'beep -f ' . intval(round($freq)) . ' -l ' . intval(round($length));
        if ($delay) {
            $cmd .= ' -D ' . intval(round($delay));
        }
        passthru($cmd);
    }
}

