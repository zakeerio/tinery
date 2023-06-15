<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['key','value'];


    public static function get($key){
    	$setting = new self();
    	$entry = $setting->where('key', $key)->first();
    	if(!$entry){
    		return;
    	}
    	return $entry->value;
    }


    public static function set($key, $value = null){
    	$setting = new self();
    	$entry = $setting->where('key', $key)->first();
        if($entry){
            $entry->value = $value;
            $entry->saveOrFail();
        } else {
            $setting->key = $key;
            $setting->value = $value;
            // dd($setting);
            $setting->save();
        }

    	// Set Config key -->
    	Config::set($key, $value);
        // dd($key." - ".$value);
    	if(Config::get($key) == $value){
    		return true;
    	}
    	return false;
    }
}
