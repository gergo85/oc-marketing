<?php namespace Indikator\Marketing\ReportWidgets;

use Backend\Classes\ReportWidgetBase;
use Exception;
use BackendAuth;
use DB;

class Tasks extends ReportWidgetBase
{
    public function render()
    {
        try {
            $this->loadData();
        }
        catch (Exception $ex) {
            $this->vars['error'] = $ex->getMessage();
        }

        return $this->makePartial('widget');
    }

    public function defineProperties()
    {
        return [
            'title' => [
                'title'             => 'backend::lang.dashboard.widget_title_label',
                'default'           => 'indikator.marketing::lang.menu.tasks',
                'type'              => 'string',
                'validationPattern' => '^.+$',
                'validationMessage' => 'backend::lang.dashboard.widget_title_error'
            ],
            'total' => [
                'title'             => 'indikator.marketing::lang.widget.show_total',
                'default'           => true,
                'type'              => 'checkbox'
            ],
            'higt' => [
                'title'             => 'indikator.marketing::lang.widget.show_higt',
                'default'           => true,
                'type'              => 'checkbox'
            ],
            'normal' => [
                'title'             => 'indikator.marketing::lang.widget.show_normal',
                'default'           => true,
                'type'              => 'checkbox'
            ],
            'low' => [
                'title'             => 'indikator.marketing::lang.widget.show_low',
                'default'           => true,
                'type'              => 'checkbox'
            ]
        ];
    }

    protected function loadData()
    {
        $user = BackendAuth::getUser();

        $this->vars['total'] = DB::table('marketing_tasks')->count();
        $this->vars['higt'] = DB::table('marketing_tasks')->where('user_id', $user->id)->where('priority', 1)->count();
        $this->vars['normal'] = DB::table('marketing_tasks')->where('user_id', $user->id)->where('priority', 2)->count();
        $this->vars['low'] = DB::table('marketing_tasks')->where('user_id', $user->id)->where('priority', 3)->count();
    }
}
