<?php

// app/Http/Kernel.php

// app/Http/Kernel.php

$middlewareGroups = [
    'web' => [
        \App\Http\Middleware\VerifyCsrfToken::class, // CSRF protection middleware for web routes
        // other web middleware...
    ],

    'api' => [
        // API middleware for api.php routes
    ],
];
