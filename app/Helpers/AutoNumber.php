<?php

namespace App\Helpers;
use DB;

class AutoNumber
{

	public static function autoNumberAdmin($table, $primary, $prefix) {
		$q = DB::table($table)->select(DB::raw('MAX(RIGHT('.$primary.',2)) as kode'));
		$prx = $prefix;

		if ($q->count() > 0) {
			foreach ($q->get() as $k) {
				$tmp = ((int)$k->kode) + 1;
				$kd = $prx.sprintf("%02s", $tmp);
			}
		}else {
			$kd = $prx."01";
		}

		return $kd;
	}

	public static function autoNumberProduk($table, $primary, $prefix) {
		$q = DB::table($table)->select(DB::raw('MAX(RIGHT('.$primary.',3)) as kode'));
		$prx = $prefix;

		if ($q->count() > 0) {
			foreach ($q->get() as $k) {
				$tmp = ((int)$k->kode) + 1;
				$kd = $prx.sprintf("%04s", $tmp);
			}
		}else {
			$kd = $prx."0001";
		}

		return $kd;
	}

	public static function autoNumberPengguna($table, $primary, $prefix) {
		$q = DB::table($table)->select(DB::raw('MAX(RIGHT('.$primary.',3)) as kode'));
		$prx = $prefix;

		if ($q->count() > 0) {
			foreach ($q->get() as $k) {
				$tmp = ((int)$k->kode) + 1;
				$kd = $prx.sprintf("%03s", $tmp);
			}
		}else {
			$kd = $prx."001";
		}

		return $kd;
	}
}