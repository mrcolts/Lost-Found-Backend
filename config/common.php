<?php

return [
    'web' => [
        'lost_item_page' => env('FRONT_URL', 'https://lostnfound-d1fc1.web.app') . env('WEB_LOST_ITEM_PAGE'),
        'self_item' => env('APP_URL').env('WEB_MY_ITEM_PAGE')
    ],
    'files' => [
        'upload_path' => env('UPLOAD_PATH', '/uploads'),
        'avatar_path' => env('AVATAR_PATH', '/avatar'),
    ]
];
