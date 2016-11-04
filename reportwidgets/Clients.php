<?php namespace Indikator\Marketing\ReportWidgets;

use Backend\Classes\ReportWidgetBase;
use Exception;

class Clients extends ReportWidgetBase
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
                'default'           => 'indikator.marketing::lang.menu.clients',
                'type'              => 'string',
                'validationPattern' => '^.+$',
                'validationMessage' => 'backend::lang.dashboard.widget_title_error'
            ],
            'total' => [
                'title'             => 'indikator.marketing::lang.widget.show_total',
                'default'           => true,
                'type'              => 'checkbox'
            ]
        ];
    }

    protected function loadData()
    {
        $this->vars['total'] = \Indikator\Marketing\Models\Clients::count();
    }
}
