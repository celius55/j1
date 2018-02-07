<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Garaje extends Model
{
    protected $table = 'garaje';

    public $timestamps = false;

    public function translate($lang, $string) {
    	if ($lang == null) $lang = 'ro';
    	$value = Language::where('ro', $string)->get();
    	foreach ($value as $v) {
    		$res = $v->$lang;
    	}
    	return $res;
    }
}
