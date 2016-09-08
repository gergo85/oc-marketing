<?php namespace Indikator\Marketing\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Indikator\Marketing\Models\Clients as Item;
use Flash;
use Lang;

class Clients extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = ['indikator.marketing.clients'];

    public $bodyClass = 'compact-container';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Indikator.Marketing', 'marketing', 'clients');
    }

    public function onActivateClients()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $itemId) {
                if (!$item = Item::where('status', 2)->find($itemId)) {
                    continue;
                }

                $item->update(['status' => 1]);
            }

            Flash::success(Lang::get('indikator.marketing::lang.flash.activate'));
        }

        return $this->listRefresh();
    }

    public function onDeactivateClients()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $itemId) {
                if (!$item = Item::where('status', 1)->find($itemId)) {
                    continue;
                }

                $item->update(['status' => 2]);
            }

            Flash::success(Lang::get('indikator.marketing::lang.flash.deactivate'));
        }

        return $this->listRefresh();
    }

    public function onRemoveClients()
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
