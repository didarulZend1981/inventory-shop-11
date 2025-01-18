<?php

namespace App\Helper;

use Firebase\JWT\JWT;

class JWTToken{

    public static function CreateToken($userEmail,$userID):string{
        $key =env('JWT_KEY');
        $payload=[
            'iss'=>'laravel-token',
            'iat'=>time(),
            'exp'=>time()+60*60,
            'userEmail'=>$userEmail,
            'userID'=>$userID
        ];
       return JWT::encode($payload,$key,'HS256');
    }




    


}