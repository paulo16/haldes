<?php

return [
    'mode'         => 'utf-8',
    'format'       => 'A4',
    'author'       => '',
    'subject'      => '',
    'keywords'     => '',
    'creator'      => 'Laravel Pdf',
    'display_mode' => 'fullpage',
    'font_path' => base_path('public/assets/frontend/fonts/pdf'),
    'font_data'    => [
        'fontarab' => [
        	'arabic' =>'GE_SS_Unique_Light.otf',
            'useOTL'     => 0xFF, // required for complicated langs like Persian, Arabic and Chinese
            'useKashida' => 75, // required for complicated langs like Persian, Arabic and Chinese
        ],
    ],
];
