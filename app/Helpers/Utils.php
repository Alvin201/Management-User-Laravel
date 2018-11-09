<?php

namespace App\Helpers;
use Carbon\Carbon;

class Utils {
    /*
     * 
     */

    public static function getDate() {
        $date = date('Y');
        return $date;
    }
    /*
     * 
     */

    public static function no_cache() {
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Cache-Control: post-check=0, pre-check=0', false);
        header('Pragma: no-cache');
    }
    
    /*
     * Helper Time 
     */
    public static function today($format=null)
    {
    $format = $format ? $format:'Y-m-d H:i:s';
    return Carbon::today()->format($format);
    }
    
    public static function tomorrow($format=null)
    {
    $format = $format ? $format:'Y-m-d H:i:s';
    return Carbon::tomorrow()->format($format);
    }
    public static function yesterday($format=null)
    {
    $format = $format ? $format:'Y-m-d H:i:s';
    return Carbon::yesterday()->format($format);
    }
    public static function nextDay($datetime=null, $day, $format=null)
    {
    $day = strtoupper($day);
    $format = $format ? $format:'Y-m-d H:i:s';
    $datetime = $datetime ? $datetime:Carbon::now();
    $days = ['SUNDAY' => Carbon::SUNDAY, 'MONDAY' => Carbon::MONDAY, 'TUESDAY' => Carbon::TUESDAY, 'WEDNESDAY' => Carbon::WEDNESDAY, 'THURSDAY' => Carbon::THURSDAY, 'FRIDAY' => Carbon::FRIDAY, 'SATURDAY' => Carbon::SATURDAY];
    return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->next($days[$day])->format($format);
    }
    public static function dayOfWeek($datetime=null)
    {
    $days = ['Sunday','Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
    $datetime = $datetime ? $datetime:Carbon::now();
    return $days[Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->dayOfWeek];
    }
    public static function ukDate($datetime=null, $timestamp=false)
    {
    $datetime = $datetime ? $datetime:Carbon::now();
    $timestamp = $timestamp ? 'd/m/Y H:ia':'d/m/Y';
    return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->format($timestamp);
    }
    public static function ukDateToDate($datetime=null, $timestamp=false)
    {
    $datetime = $datetime ? $datetime:Carbon::now();
    $format = $timestamp ? 'd/m/Y H:i:s':'d/m/Y';
    $timestamp = $timestamp ? 'Y-m-d H:i:s':'Y-m-d';
    return Carbon::createFromFormat($format, $datetime)->format($timestamp);
    }
    public static function humanDate($datetime)
    {
    return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->diffForHumans();
    }
    public static function age($datetime)
    {
    return Carbon::createFromFormat('Y-m-d', $datetime)->age;
    }
    public static function weekend($datetime=null)
    {
    $datetime = $datetime ? $datetime:Carbon::now();
    return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->isWeekend();
    }
    public static function diffInDays($datetime)
    {
    return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->diffInDays();
    }
    public static function addYears($datetime=null, $years, $format=null)
    {
    $format = $format ? $format:'Y-m-d H:i:s';
    $datetime = $datetime ? $datetime:Carbon::now();
    return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->addYears($years)->format($format);
    }
    public static function addMonths($datetime=null, $months, $format=null)
    {
    $format = $format ? $format:'Y-m-d H:i:s';
    $datetime = $datetime ? $datetime:Carbon::now();
    return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->addMonths($months)->format($format);
    }
    

}
