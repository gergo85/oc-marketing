<?php namespace Indikator\Marketing\Models;

use Model;

class Clients extends Model
{
    use \October\Rain\Database\Traits\Validation;

    protected $table = 'marketing_clients';

    public $rules = [
        'name'          => 'required',
        'contact_name'  => 'required',
        'contact_email' => 'required|email'
    ];
}
