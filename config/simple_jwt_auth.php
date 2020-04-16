<?php

return [

    'name' => env('SJA_NAME', 'Simple JWT Auth'), // this will be the Issuer Claim

    'secret' => env('SJA_SECRET'),

    'algo' => env('SJA_ALGO', 'HS256'),
    
    'expire' => env('SJA_EXPIRE', 86400), // 60 * 60 * 24 * 1 - default to 1 day
];
