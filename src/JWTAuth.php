<?php

namespace RaditzFarhan\SimpleJWTAuth;

use Firebase\JWT\JWT;

class JWTAuth
{
    /**
     * Indicate the token string
     *
     * @var string
     */
    public $token = null;

    /**
     * Encode given subject and return a valid token.
     *
     * @param  mixed  $subject
     * @return string
     */
    public function encode($subject)
    {
        $token_expired_at = time() + (config('simple_jwt_auth.expire'));

        $payload = [
            'iss' => config('simple_jwt_auth.name'), // Issuer of the token
            'sub' => $subject, // Subject of the token
            'iat' => time(), // Time when JWT was issued.
            'nbf' => time(), // Not Before
            'exp' => $token_expired_at, // Expiration Time
        ];

        // As you can see we are passing `JWT_SECRET` as the second parameter that will
        // be used to decode the token in the future.
        return JWT::encode($payload, config('simple_jwt_auth.secret'));
    }

    /**
     * Decode given token and return claims.
     *
     * @param  mixed  $token
     * @return object|bool
     */
    public function decode($token = null)
    {
        if (is_null($token)) {
            $token = $this->getToken();
        }

        try {
            return JWT::decode($token, config('simple_jwt_auth.secret'), [config('simple_jwt_auth.algo')]);
        } catch (Exception $e) {
            return false;
            // abort(400, __('An error while decoding token.'));
        }
    }

    /**
     *  Set token
     *    
     * @param  mixed  $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     *  Get token
     *    
     * @return  mixed
     */
    public function getToken()
    {
        return $this->token;
    }
}
