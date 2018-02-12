<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;

/**
* Set active class menu
*/
class SetActive
{

	public function active($uri, $output = 'active') {
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
}