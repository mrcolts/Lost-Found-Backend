<?php

return [
    'web' => [
        'lost_item_page' => env('FRONT_URL', 'https://lostandfound.movily.app') . env('WEB_LOST_ITEM_PAGE'),
        'self_item' => env('APP_URL').env('WEB_MY_ITEM_PAGE')
    ],
];
