<?php namespace Indikator\Marketing\Models;

use Model;

class Ads extends Model
{
    use \October\Rain\Database\Traits\Validation;

    protected $table = 'marketing_ads';

    public $rules = [
        'name' => 'required|between:1,100',
        'project_id' => 'between:1,9999|numeric',
        'type' => 'between:1,2|numeric'
    ];

    public $belongsTo = [
        'project' => ['Indikator\Marketing\Models\Project']
    ];

    protected $dates = ['start', 'end'];

    public function getProjectIdOptions()
    {
        return Project::getNameList();
    }
}
