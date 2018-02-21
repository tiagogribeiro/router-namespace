<?php
namespace Router\Infrastructure;

use \Firebase\JWT\JWT;

class TokenGenerator
{
    public static function getToken( $request )
    {

        $now = new \DateTime();
        $future = new \DateTime('+20 minutes');

        /*
         iss - Domínio utilizado para validar a procedência do token
         iat - Timestamp de criação do token.
         exp - Timestamp de expiração do token.
         sub - ID de identificação de quem o token pertence.
         */
        $payload = [
            'iss'  => '',
            'iat' => $now->getTimeStamp(),
            'exp' => $future->getTimeStamp()
         ];

        return JWT::encode($payload, getenv("JWT_SECRET"));
    }

}
