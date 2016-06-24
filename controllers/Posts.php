<?php namespace Indikator\Marketing\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use DB;
use Flash;
use Lang;

class Posts extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = ['indikator.marketing.posts'];

    public $bodyClass = 'compact-container';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Indikator.Marketing', 'marketing', 'posts');
    }

    public function onActivatePosts()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $objectId) {
                if (DB::table('marketing_posts')->where('id', $objectId)->where('status', 2)->count() == 1) {
                    DB::table('marketing_posts')->where('id', $objectId)->update(['status' => 1]);
                }
            }

            Flash::success(Lang::get('indikator.marketing::lang.flash.activate'));
        }

        return $this->listRefresh('manage');
    }

    public function onDeactivatePosts()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $objectId) {
                if (DB::table('marketing_posts')->where('id', $objectId)->where('status', 1)->count() == 1) {
                    DB::table('marketing_posts')->where('id', $objectId)->update(['status' => 2]);
                }
            }

            Flash::success(Lang::get('indikator.marketing::lang.flash.deactivate'));
        }

        return $this->listRefresh('manage');
    }

    public function onRemovePosts()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $objectId) {
                if (DB::table('marketing_posts')->where('id', $objectId)->count() == 1) {
                    DB::table('marketing_posts')->where('id', $objectId)->delete();
                }
            }

            Flash::success(Lang::get('indikator.marketing::lang.flash.remove'));
        }

        return $this->listRefresh('manage');
    }
}
