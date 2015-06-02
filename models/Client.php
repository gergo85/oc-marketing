<?php namespace Indikator\Marketing\Models;

use Model;
use Form;

class Client extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'marketing_clients';

    public $rules = [
        'name' => 'required'
    ];

    protected static $nameList = null;

    public static function getNameList()
    {
        if (self::$nameList) {
            return self::$nameList;
        }

        return self::$nameList = self::isEnabled()->lists('name', 'id');
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
