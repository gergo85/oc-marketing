<?php namespace Indikator\Marketing\Models;

use Model;

class Ads extends Model
{
    use \October\Rain\Database\Traits\Validation;

    protected $table = 'marketing_ads';

    public $rules = [
        'name'       => 'required',
        'project_id' => 'between:0,9999|numeric',
        'type'       => 'between:1,2|numeric'
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
