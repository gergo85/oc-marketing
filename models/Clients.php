<?php namespace Indikator\Marketing\Models;

use Model;

class Clients extends Model
{
    use \October\Rain\Database\Traits\Validation;

    protected $table = 'marketing_clients';

    public $rules = [
        'name'          => 'required|between:2,100',
        'contact_name'  => 'required|between:2,50',
        'contact_email' => 'required|between:6,50'
    ];
}
