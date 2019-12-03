<?php

declare(strict_types=1);

return [
    'mode' => 'utf-8',
    'format' => 'A4',
    'author' => '',
    'subject' => '',
    'keywords' => '',
    'creator' => 'Laravel Pdf',
    'display_mode' => 'fullpage',
    'tempDir' => base_path('../temp/'),
    'font_path' => base_path('resources/fonts/'),
    'font_data' => [
        'roboto' => [
            'R' => 'Roboto-Regular.ttf',    // regular font
            'B' => 'Roboto-Bold.ttf',       // optional: bold font
            'I' => 'Roboto-Italic.ttf',     // optional: italic font
            'BI' => 'Roboto-BoldItalic.ttf' // optional: bold-italic font
        ]
    ]
];
