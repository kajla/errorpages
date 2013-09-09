<?php

$css = array(
	'style.css' => '',
);
$scripts = array(
	'script.js' => '',
);
$images = array(

);

foreach ($images as $filename => $content) {
	$images[$filename] = 'data: ' . mime_content_type(__DIR__ . '/src/' . $filename).';base64,'. base64_encode(file_get_contents(__DIR__ . '/http-errors-uncompiled/' . $filename));
}
foreach ($css as $filename => $content) {
	$css[$filename] = file_get_contents(__DIR__ . '/http-errors-uncompiled/' . $filename);
}

foreach ($scripts as $filename => $content) {
	$scripts[$filename] = file_get_contents(__DIR__ . '/http-errors-uncompiled/' . $filename);
}

if ($handle = opendir(__DIR__ . '/http-errors-uncompiled')) {
	/* This is the correct way to loop over the directory. */
	while (false !== ($entry = readdir($handle))) {

		if (is_file(__DIR__ . '/http-errors-uncompiled/' . $entry) && preg_match('/\.html$/', $entry)) {
			$html = file_get_contents(__DIR__ . '/http-errors-uncompiled/' . $entry);

			foreach ($css as $filename => $content) {
				$html = str_replace('<link rel="stylesheet" href="' . $filename . '" type="text/css" />', '<style type="text/css">' . $content . '</style>', $html);
			}
			foreach ($scripts as $script => $content) {
				$html = str_replace('<script type="text/javascript" src="' . $script . '"></script>', '<script type="text/javascript">' . $content . '</script>', $html);
			}
			/**
			 * Images come last so the filenames get replaced for data URI's in the CSS too.
			 */
			foreach ($images as $filename => $content) {
				$html = str_replace($filename, $content, $html);
			}
			file_put_contents(__DIR__ . '/http-errors/' . $entry, $html);
		}
	}

	closedir($handle);
}
