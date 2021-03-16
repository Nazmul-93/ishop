<?php

function firstLetterCaplital($str)
{
    $data = str_replace('_',' ', $str);
    $result = str_replace('-',' ', $data);

    return ucfirst($result);
}

function create_slug($str)
{
    $data = str_replace(' ','-', $str);

    return $data;
}

function email_validation($email)
{
    $filter = filter_var($email, FILTER_VALIDATE_EMAIL);

    return $filter;
}

function create_date_format($date){

    return date("Y-m-d", strtotime($date));
}

function create_string_date_format($date){

    return date("M-d-Y", strtotime($date));
}

function create_money_format($balance)
{
    return number_format((float)$balance, 2, '.', ',');
}

function date_time_compare($time)
{
    $start_date = new DateTime('2007-09-01 04:10:58');
    $since_start = $start_date->diff(new DateTime($time));

    $result = $since_start->y.' years ';
    $result .= $since_start->m.' months ';
    $result .= $since_start->d.' days ';
    $result .= $since_start->h.' hours ';
    $result .= $since_start->i.' Seconds';

    return $result;
}

function year_diff($time)
{
    $start_date = new DateTime('2007-09-01 04:10:58');
    $since_start = $start_date->diff(new DateTime($time));

    return $since_start->y;
}

function month_diff($time)
{
    $start_date = new DateTime('2007-09-01 04:10:58');
    $since_start = $start_date->diff(new DateTime($time));

    return $since_start->m;
}

function day_diff($time)
{
    $start_date = new DateTime('2007-09-01 04:10:58');
    $since_start = $start_date->diff(new DateTime($time));

    return $since_start->days;
}

function minute_diff($time)
{
    $start_date = new DateTime('2007-09-01 04:10:58');
    $since_start = $start_date->diff(new DateTime($time));

    return $since_start->i;
}

function second_diff($time)
{
    $start_date = new DateTime('2007-09-01 04:10:58');
    $since_start = $start_date->diff(new DateTime($time));

    return $since_start->s;
}

function add_minute($now, $add)
{
    $minutes_to_add = $add;

    $time = new DateTime($now);
    $time->add(new DateInterval('PT' . $minutes_to_add . 'M'));

    return $time->format('Y-m-d H:i:s');
}

function compare_time($expire_time)
{
    $now = new DateTime();
    $expire = new DateTime($expire_time);

    if($now <= $expire)
    {
       $result = true;
    }else{
       $result = false;
    }

    return $result;
}


function random_number()
{
    return mt_rand(1000, 9999);
}

function phone_number_format($data)
{
    $result = str_replace('+88','', $data);
    $phone = str_replace('88','', $result);

    return "+88".$phone;
}