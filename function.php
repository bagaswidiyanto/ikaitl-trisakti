<?php

function time_ago($timestamp)
{
    $time_ago = strtotime($timestamp);
    $current_time = time();
    $time_difference = $current_time - $time_ago;
    $seconds = $time_difference;
    $minutes      = round($seconds / 60);        // value 60 is seconds  
    $hours        = round($seconds / 3600);       //value 3600 is 60 minutes * 60 sec  
    $days         = round($seconds / 86400);      //86400 = 24 * 60 * 60;  
    $weeks        = round($seconds / 604800);     // 7*24*60*60;  
    $months       = round($seconds / 2629440);    //((365+365+365+365+366)/5/12)*24*60*60  
    $years        = round($seconds / 31553280);   //(365+365+365+365+366)/5 * 24 * 60 * 60  
    if ($seconds <= 60) {
        return "Sekarang";
    } else if ($minutes <= 60) {
        if ($minutes == 1) {
            return "Satu menit lalu";
        } else {
            return "$minutes menit lalu";
        }
    } else if ($hours <= 24) {
        if ($hours == 1) {
            return "Satu jam lalu";
        } else {
            return "$hours jam lalu";
        }
    } else if ($days <= 7) {
        if ($days == 1) {
            return "Kemarin";
        } else {
            return "$days hari lalu";
        }
    } else if ($weeks <= 4.3) {  //4.3 == 52/12
        if ($weeks == 1) {
            return "Satu minggu lalu";
        } else {
            return "$weeks minggu lalu";
        }
    } else if ($months <= 12) {
        if ($months == 1) {
            return "Satu bulan lalu";
        } else {
            return "$months bulan lalu";
        }
    } else {
        if ($years == 1) {
            return "Satu tahun lalu";
        } else {
            return "$years tahun lalu";
        }
    }
}
