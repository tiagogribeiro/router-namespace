<?php
namespace Router\Infrastructure;

use \Firebase\JWT\JWT;

class TokenGenerator
{
    public static function getToken( \Slim\Http\Request $request )
    {
        $tokenId    = \base64_encode(\mcrypt_create_iv(32));
        $now = new \DateTime();
        $future = new \DateTime('+20 minutes');
        $notBefore  = new \DateTime('+5 seconds');

        /*
         iss - Domínio utilizado para validar a procedência do token
         iat - Timestamp de criação do token.
         exp - Timestamp de expiração do token.
         sub - ID de identificação de quem o token pertence.
         nbf - O Token é valido após 5 segundos.
         */
        $payload = [
            'jti' => $tokenId,
            'iss'  => 'Router',
            'iat' => $now->getTimeStamp(),
            'exp' => $future->getTimeStamp(),
            'nbf'  => $notBefore->getTimeStamp(),
            //'data' = []
         ];

        return JWT::encode($payload, getenv("JWT_SECRET"));
    }

}
