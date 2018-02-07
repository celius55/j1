<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Terenuri extends Model
{
    protected $table = 'terenuri';

    public $timestamps = false;

    public function translate($lang, $string) {
    	if ($lang == null) $lang = 'ro';
    	$value = Language::where('ro', $string)->get();
    	foreach ($value as $v) {
    		$res = $v->$lang;
    	}
        if ( empty($res) ){
            $res = '';
        } else {
            return $res;
        }
    }
}
