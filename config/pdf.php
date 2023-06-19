<?php

return [
    'mode'                     => '',
    'format'                   => 'A4',
    'default_font_size'        => '12',
    'default_font'             => 'sans-serif',
    'margin_left'              => 15,
    'margin_right'             => 15,
    'margin_top'               => 15,
    'margin_bottom'            => 15,
    'margin_header'            => 0,
    'margin_footer'            => 0,
    'orientation'              => 'P',
    'title'                    => 'Laravel mPDF',
    'subject'                  => '',
    'author'                   => '',
    'watermark'                => '',
    'show_watermark'           => false,
    'show_watermark_image'     => false,
    'watermark_font'           => 'sans-serif',
    'display_mode'             => 'fullpage',
    'watermark_text_alpha'     => 0.1,
    'watermark_image_path'     => '',
    'watermark_image_alpha'    => 0.2,
    'watermark_image_size'     => 'D',
    'watermark_image_position' => 'P',
    'custom_font_dir'          => '',
    'custom_font_data'         => [],
    'auto_language_detection'  => false,
    'temp_dir'                 => storage_path('app'),
    'pdfa'                     => false,
    'pdfaauto'                 => false,
    'use_active_forms'         => false,
    'custom_font_dir'          => base_path('resources/fonts/'), // اسلش انتهایی را فراموش نکنید

    // 'custom_font_data' => [
    //     'vazir' => [ // باید با حروف کوچک و snake_case باشد
    //         'R'  => 'vazir.ttf',    // regular font
    //         'B'  => 'vazir.ttf',       // optional: bold font
    //         'I'  => 'vazir.ttf',     // optional: italic font
    //         'BI' => 'vazir.ttf', // optional: bold-italic font
    //         'useOTL' => 0xFF,
    //         'useKashida' => 75,
    //     ]
    //     // ...add as many as you want.
    // ],
    'custom_font_data' => [
        'vazir' => [ // باید با حروف کوچک و snake_case باشد
            'R'  => 'vazir.ttf',    // regular font
            'useOTL' => 0xFF,
            'useKashida' => 75,
        ]
        // ...add as many as you want.
    ],
];
