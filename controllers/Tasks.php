<?php namespace Indikator\Marketing\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use BackendAuth;
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
            foreach ($checkedIds as $objectId) {
                if (Tasks::where('id', $objectId)->where('status', 1)->count() == 1) {
                    Tasks::where('id', $objectId)->update(['status' => 2]);
                }
            }

            Flash::success(Lang::get('indikator.marketing::lang.flash.completed'));
        }

        return $this->listRefresh('manage');
    }

    public function onUncompleted()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $objectId) {
                if (Tasks::where('id', $objectId)->where('status', 2)->count() == 1) {
                    Tasks::where('id', $objectId)->update(['status' => 1]);
                }
            }

            Flash::success(Lang::get('indikator.marketing::lang.flash.uncompleted'));
        }

        return $this->listRefresh('manage');
    }

    public function onPriority1()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $objectId) {
                if (Tasks::where('id', $objectId)->where('priority', '!=', 1)->count() == 1) {
                    Tasks::where('id', $objectId)->update(['priority' => 1]);
                }
            }

            Flash::success(Lang::get('indikator.marketing::lang.flash.priority'));
        }

        return $this->listRefresh('manage');
    }

    public function onPriority2()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $objectId) {
                if (Tasks::where('id', $objectId)->where('priority', '!=', 2)->count() == 1) {
                    Tasks::where('id', $objectId)->update(['priority' => 2]);
                }
            }

            Flash::success(Lang::get('indikator.marketing::lang.flash.priority'));
        }

        return $this->listRefresh('manage');
    }

    public function onPriority3()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $objectId) {
                if (Tasks::where('id', $objectId)->where('priority', '!=', 3)->count() == 1) {
                    Tasks::where('id', $objectId)->update(['priority' => 3]);
                }
            }

            Flash::success(Lang::get('indikator.marketing::lang.flash.priority'));
        }

        return $this->listRefresh('manage');
    }

    public function onRemovetasks()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $objectId) {
                if (Tasks::where('id', $objectId)->count() == 1) {
                    Tasks::where('id', $objectId)->delete();
                }
            }

            Flash::success(Lang::get('indikator.marketing::lang.flash.remove'));
        }

        return $this->listRefresh('manage');
    }
}
