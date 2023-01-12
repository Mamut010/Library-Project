<?php

if(!function_exists('mb_strcasecmp')) {
    function mb_strcasecmp($str1, $str2, $encoding = null) 
    {
        if (null === $encoding) { $encoding = mb_internal_encoding(); }
        return strcmp(mb_strtoupper($str1, $encoding), mb_strtoupper($str2, $encoding));
    }
}

if(!function_exists('maskEmailAddress')) {
    function maskEmailAddress($email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            list($first, $last) = explode('@', $email);
            $first = str_replace(substr($first, '3'), str_repeat('*', strlen($first)-3), $first);
            $last = explode('.', $last);
            $last_domain = str_replace(substr($last['0'], '1'), str_repeat('*', strlen($last['0'])-1), $last['0']);
            $hideEmailAddress = $first.'@'.$last_domain.'.'.$last[array_key_last($last)];
            return $hideEmailAddress;
        }
        else {
            return $email;
        }
    }
}