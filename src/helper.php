<?php

if(!function_exists('to_array'))
{
    function to_array($data)
    {
        if(is_array($data)){
            return $data;
        } else if(is_object($data)){
            return json_decode(json_encode($data), true);
        } else {
            return json_decode($data, true);
        }
    }
}