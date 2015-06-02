<?php namespace Indikator\Marketing\Models;

use Model;
use Form;

class User extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'backend_users';

    public $rules = [
        'login' => 'required'
    ];

    protected static $nameList = null;

    public static function getNameList()
    {
        if (self::$nameList) {
            return self::$nameList;
        }

        return self::$nameList = self::isEnabled()->lists('login', 'id');
    }

    public static function formSelect($name, $selectedValue = null, $options = [])
    {
        return Form::select($name, self::getNameList(), $selectedValue, $options);
    }

    public function scopeIsEnabled($query)
    {
        return $query->where('id', '>', 0);
    }
}
