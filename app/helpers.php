<?php

use Illuminate\Support\Facades\Route;

function active($uri, $output = 'active-menu') {
	if (is_array($uri)) {
		foreach ($uri as $u) {
			if (Route::is($u)) {
				return $output;
			}
		}
	}else {
		if (Route::is($uri)) {
			return $output;
		}
	}
}