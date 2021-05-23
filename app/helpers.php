<?php

function getArray($arr)
{
    print_r($arr);
}

function is_active($url, $className = 'active')
{
    return request()->is($url) ? $className : null;
}
