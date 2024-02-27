<?php

return [
	'mode'                  => 'utf-8',
	'format'                => 'A4',
    // 'orientation'           => 'landscape',
	'author'                => 'Mashal Rashidy',
	'subject'               => 'Money Excahnge System',
	'keywords'              => '',
	'creator'               => 'Laravel Pdf',
	'display_mode'          => 'fullpage',
	'tempDir'               => base_path('storage/app/mpdf'),
	'pdf_a'                 => false,
	'pdf_a_auto'            => false,
	'icc_profile_path'      => '',
    'font_path' => base_path('public/bahij-nassim'),
	'font_data' => [
		'bahij-nassim' => [
			'R'  => 'Bahij Nassim-Regular.ttf',    // regular font
			'B'  => 'Bahij Nassim-Bold.ttf',       // optional: bold font
			// 'I'  => 'ExampleFont-Italic.ttf',     // optional: italic font
			// 'BI' => 'ExampleFont-Bold-Italic.ttf' // optional: bold-italic font
			'useOTL' => 0xFF,    // required for complicated langs like Persian, Arabic and Chinese
			'useKashida' => 75,  // required for complicated langs like Persian, Arabic and Chinese
            'unAGIyphs'=>true
		]
		// ...add as many as you want.
	]
];
