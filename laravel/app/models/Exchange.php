<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Exchange extends Eloquent {


	protected $table = 'exchanges';

    public static function getAdType(){
        return array(
            'refill'=>'refill',
            'cashing'=>'cashing'
        );
    }

	protected $fillable = array(
        'phone',
        'summ',
        'money_type',
        'ad_type',
        'comment'
    );

    public static function getValidationRules(){
        $validation = array(
            'phone'=>'required',
            'summ'=>'required',
            'money_type'=>'required',
        );
        $validation['ad_type'] = 'required|in:'. implode(',',array_keys(Exchange::getAdType()));

        return $validation;

    }

}
