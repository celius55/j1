<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Case_si_vile extends Model
{
    protected $table = 'case_si_vile';

    public $timestamps = false;

    public function translate($lang, $string) {
    	if ($lang == null) $lang = 'ro';
    	$value = Language::where('ro', $string)->get();
    	foreach ($value as $v) {
    		$res = $v->$lang;
    	}
		//if ( !isset($res) ) $res='';
    	if ( empty($res) ){
            $res = '';
        } else {
            return $res;
        }
    }
}
