<?php

namespace App\Helpers;

use App;
use Auth;
use Request;

class AppHelper
{
    /**
     * [ago description]
     * Time ago format
     *
     * @author  Dean Appleton-Clayton
     * @version 1.0.0
     * @date    2019-02-23
     * @param   [type]     $time
     * @return  [type]
     */
    public static function ago($time)
    {
        $periods = ['second', 'minute', 'hour', 'day', 'week', 'month', 'year', 'decade'];
        $lengths = ['60', '60', '24', '7', '4.35', '12', '10'];

        $now = time();

        $difference = $now - strtotime($time);
        $tense = 'ago';

        for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
            $difference /= $lengths[$j];
        }

        $difference = round($difference);

        if ($difference != 1) {
            $periods[$j] .= 's';
        }

        return "$difference $periods[$j] ago ";
    }

    /**
     * [dateFormat description]
     * Formatted Date example
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-23
     * @param   [type]     $date
     * @return  [type]
     */
    public static function dateFormat($date)
    {
        return date('jS M Y', strtotime($date));
    }

    /**
     * [ellipsisFormat description]
     * If text is too long add ... by the character limit
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-23
     * @param   [type]     $text
     * @param   boolean    $character_limit
     * @return  boolean
     */
    public static function ellipsisFormat($text, $character_limit = false)
    {
        // Set Character limit
        if ($character_limit == false) {
            $limit = 100;
        } else {
            $limit = $character_limit;
        }

        return str_limit(ucfirst($text), $limit, $end = '...');
    }

    /**
     * [setActive description]
     * Set Active to current URL
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-23
     * @param   [type]     $path
     */
    public static function setActive($path)
    {
        return Request::is($path.'*') ? 'active__route' : '';
    }

    /**
     * [fullname description]
     * Get User fullname
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-23
     * @param   [type]     $path
     */
    public static function fullname($user = null)
    {
        if ($user == null) {
            return $fullname = Auth::user()->firstname.' '.Auth::user()->lastname;
        }

        return $fullname = $user->firstname.' '.$user->lastname;
    }
}
