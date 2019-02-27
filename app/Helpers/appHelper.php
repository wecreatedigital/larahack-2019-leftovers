<?php

namespace App\Helpers;

use App;
use App\Recipe;
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

    public static function createSlug($title, $id = 0)
    {
        // Normalize the title
        $slug = str_slug($title);

        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = Recipe::select('slug')->where('slug', 'like', $slug.'%')
                ->where('id', '<>', $id)
                ->get();

        // If we haven't used it before then we are all good.
        if ( ! $allSlugs->contains('slug', $slug)) {
            return $slug;
        }

        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 30; $i++) {
            $newSlug = $slug.'-'.$i;
            if ( ! $allSlugs->contains('slug', $newSlug)) {
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');
    }

    /**
     * [unitTypes description]
     * Return all unit types
     *
     * @author  Christopher Kelker
     * @version 1.0.0
     * @date    2019-02-24
     * @return  [type]
     */
    public static function unitTypes()
    {

        // Mass_and Weight Units
        $mass_and_weight_units = array(
            'Mass and Weight' => (object) array(
                'pound' => 'pound',
                'ounce' => 'ounce',
                'mg' => 'mg',
                'g' => 'g',
                'kg' => 'kg',
            ),
        );

        // Volume Units
        $volume_units = array(
            'Volume' => (object) array(
                'tsp' => 'tsp',
                'tbsp' => 'tbsp',
                'ounce' => 'ounce',
                'gill' => 'gill',
                'cup' => 'cup',
                'pint' => 'pint',
                'quart' => 'quart',
                'gallon' => 'gallon',
                'ml' => 'ml',
                'l' => 'l',
                'dl' => 'dl',
            ),
        );

        // Create Array of Unit Types
        $units = array_merge($mass_and_weight_units, $volume_units);

        return $units;
    }
}
