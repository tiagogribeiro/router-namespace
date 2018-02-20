<?php
namespace Router;

use \Firebase\JWT\JWT;

class TokenGenerator
{
    public static function getToken( $request )
    {

        $now = new \DateTime();
        $future = new \DateTime('+20 minutes');
        $server = $request->getServerParams();

        $payload = [                
            'iat' => $now->getTimeStamp(),
            'exp' => $future->getTimeStamp()
         ];

        return JWT::encode($payload, getenv("JWT_SECRET"));
    }

}
