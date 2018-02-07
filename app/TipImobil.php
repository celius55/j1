<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipImobil extends Model
{
    protected $table = 'tip_imobil';

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

    public function complexulRezidential() 
    {
        return $this->belongsTo(ComplexeRezidentiale::class);
    }
}
