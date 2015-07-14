<?php namespace Indikator\Marketing\Models;

use Model;

class Projects extends Model
{
    use \October\Rain\Database\Traits\Validation;

    protected $table = 'marketing_projects';

    public $rules = [
        'name'      => 'required|between:1,100',
        'client_id' => 'between:1,9999|numeric',
        'status'    => 'between:1,2|numeric',
        'user_id'   => 'between:1,9999|numeric'
    ];

    public $belongsTo = [
        'client' => ['Indikator\Marketing\Models\Client'],
        'user'   => ['Indikator\Marketing\Models\User']
    ];

    protected $dates = ['start', 'end'];

    public function getClientIdOptions()
    {
        return Client::getNameList();
    }

    public function getUserIdOptions()
    {
        return User::getNameList();
    }
}
