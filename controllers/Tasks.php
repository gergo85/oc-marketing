<?php namespace Indikator\Marketing\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use BackendAuth;
use Indikator\Marketing\Models\Tasks as Item;
use Flash;
use Lang;

class Tasks extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = ['indikator.marketing.tasks'];

    public $bodyClass = 'compact-container';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Indikator.Marketing', 'marketing', 'tasks');
    }

    public function listExtendQuery($query) {
        $user = BackendAuth::getUser();
        $query->where('user_id', $user->id);
    }

    public function onCompleted()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $itemId) {
                if (!$item = Item::where('status', 1)->find($itemId)) {
                    continue;
                }

                $item->update(['status' => 2]);
            }

            Flash::success(Lang::get('indikator.marketing::lang.flash.completed'));
        }

        return $this->listRefresh();
    }

    public function onUncompleted()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $itemId) {
                if (!$item = Item::where('status', 2)->find($itemId)) {
                    continue;
                }

                $item->update(['status' => 1]);
            }

            Flash::success(Lang::get('indikator.marketing::lang.flash.uncompleted'));
        }

        return $this->listRefresh();
    }

    public function onPriority1()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $itemId) {
                if (!$item = Item::where('priority', '!=', 1)->find($itemId)) {
                    continue;
                }

                $item->update(['priority' => 1]);
            }

            Flash::success(Lang::get('indikator.marketing::lang.flash.priority'));
        }

        return $this->listRefresh();
    }

    public function onPriority2()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $itemId) {
                if (!$item = Item::where('priority', '!=', 2)->find($itemId)) {
                    continue;
                }

                $item->update(['priority' => 2]);
            }

            Flash::success(Lang::get('indikator.marketing::lang.flash.priority'));
        }

        return $this->listRefresh();
    }

    public function onPriority3()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $itemId) {
                if (!$item = Item::where('priority', '!=', 3)->find($itemId)) {
                    continue;
                }

                $item->update(['priority' => 3]);
            }

            Flash::success(Lang::get('indikator.marketing::lang.flash.priority'));
        }

        return $this->listRefresh();
    }

    public function onRemovetasks()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $itemId) {
                if (!$item = Item::find($itemId)) {
                    continue;
                }

                $item->delete();
            }

            Flash::success(Lang::get('indikator.marketing::lang.flash.remove'));
        }

        return $this->listRefresh();
    }
}
