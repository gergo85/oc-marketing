<?php namespace Indikator\Marketing\Models;

use Model;

class Posts extends Model
{
    use \October\Rain\Database\Traits\Validation;

    protected $table = 'marketing_posts';

    public $rules = [
        'title'      => 'required',
        'url'        => ['required', 'regex:/^[a-z0-9\/\:_\-\*\[\]\+\?\|]*$/i', 'unique:marketing_posts'],
        'project_id' => 'between:0,9999|numeric',
        'feedback'   => 'required|between:0,3|numeric'
    ];

    public $belongsTo = [
        'project' => ['Indikator\Marketing\Models\Project']
    ];

    public function getProjectIdOptions()
    {
        return Project::getNameList();
    }
}
