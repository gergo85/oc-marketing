<?php namespace Indikator\Marketing\Models;

use Model;

class Posts extends Model
{
    use \October\Rain\Database\Traits\Validation;

    protected $table = 'marketing_posts';

    public $rules = [
        'title'      => 'required|between:1,100',
        'url'        => ['required|between:1,100', 'regex:/^[a-z0-9\/\:_\-\*\[\]\+\?\|]*$/i'],
        'project_id' => 'between:1,9999|numeric',
        'feedback'   => 'required|between:0,3'
    ];

    public $belongsTo = [
        'project' => ['Indikator\Marketing\Models\Project']
    ];

    public function getProjectIdOptions()
    {
        return Project::getNameList();
    }
}
