<?php
Class test{
    public static function Ekle()
    {
        return 1;
    }
}

// dosya: app/helpers.php
function is_active($url, $className = 'active')
{
    return request()->is($url) ? $className : null;
}
