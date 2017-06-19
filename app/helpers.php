<?php

namespace App;



class Helpers
{
    public function randomString()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '$';
        for ($i = 0; $i < 30; $i++) {
            $x = $characters[rand(0, strlen($characters)-1)];
            $randstring .= $x;
        }
        return $randstring;
    }
}
