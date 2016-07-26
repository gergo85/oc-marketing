<?php namespace Indikator\Marketing\Models;

use Model;

class Tasks extends Model
{
    use \October\Rain\Database\Traits\Validation;

    protected $table = 'marketing_tasks';

    public $rules = [
        'name'       => 'required',
        'project_id' => 'between:0,9999|numeric',
        'priority'   => 'between:1,3|numeric',
        'status'     => 'between:1,2|numeric',
        'user_id'    => 'between:1,9999|numeric'
    ];

    public $belongsTo = [
        'project' => ['Indikator\Marketing\Models\Project'],
        'user'    => ['Indikator\Marketing\Models\User']
    ];

    protected $dates = ['deadline'];

    public function getProjectIdOptions()
    {
        return Project::getNameList();
    }

    public function getUserIdOptions()
    {
        return User::getNameList();
    }
}
