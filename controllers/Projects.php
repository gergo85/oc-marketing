<?php namespace Indikator\Marketing\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Backend\Models\UserPreferences;
use File;
use Mail;
use DB;
use Flash;
use Lang;

class Projects extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public $requiredPermissions = ['indikator.marketing.projects'];

    public $bodyClass = 'compact-container';

    public $client;

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Indikator.Marketing', 'marketing', 'projects');
    }

    public function onSendReport()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $objectId) {
                if (DB::table('marketing_projects')->where('id', $objectId)->count() == 1) {
                    global $client;
                    $ads = $posts = '';

                    $project = DB::table('marketing_projects')->where('id', $objectId)->first();
                    $client = DB::table('marketing_clients')->where('id', $project->client_id)->first();

                    $preferences = UserPreferences::forUser()->get('backend::backend.preferences');
                    if (!File::exists('plugins/indikator/marketing/views/mail/report_'.$preferences['locale'].'.htm')) $preferences['locale'] = 'en';

                    $items = DB::table('marketing_ads')->where('project_id', $objectId)->get();

                    foreach ($items as $item) {
                        $ads .= '<strong>'.$item->name.'</strong> ('.date('Y-m-d', $item->start).' - '.date('Y-m-d', $item->end).')<br>'.$item->text.'<br><br>';
                    }

                    $items = DB::table('marketing_posts')->where('project_id', $objectId)->get();

                    foreach ($items as $item) {
                        $posts .= '<strong>'.$item->title.'</strong> ('.date('Y-m-d', $item->start).' - '.date('Y-m-d', $item->end).')<br><a href="'.$item->url.'" target="_blank">'.$item->url.'</a><br>'.$item->post.'<br><br>';
                    }

                    $params = ['client' => $client->name, 'ads' => $ads, 'posts' => $posts];

                    Mail::send('indikator.marketing::mail.report', $params, function($message)
                    {
                        global $ugyfel;
                        $message->to($ugyfel->email, $ugyfel->ugyfel);
                    });
                }
            }

            Flash::success(Lang::get('indikator.marketing::lang.flash.report'));
        }

        return $this->listRefresh('manage');
    }

    public function onActivateProjects()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $objectId) {
                if (DB::table('marketing_projects')->where('id', $objectId)->where('status', 2)->count() == 1) {
                    DB::table('marketing_projects')->where('id', $objectId)->update(['status' => 1]);
                }
            }

            Flash::success(Lang::get('indikator.marketing::lang.flash.activate'));
        }

        return $this->listRefresh('manage');
    }

    public function onDeactivateProjects()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $objectId) {
                if (DB::table('marketing_projects')->where('id', $objectId)->where('status', 1)->count() == 1) {
                    DB::table('marketing_projects')->where('id', $objectId)->update(['status' => 2]);
                }
            }

            Flash::success(Lang::get('indikator.marketing::lang.flash.deactivate'));
        }

        return $this->listRefresh('manage');
    }

    public function onRemoveProjects()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {
            foreach ($checkedIds as $objectId) {
                if (DB::table('marketing_projects')->where('id', $objectId)->count() == 1) {
                    DB::table('marketing_projects')->where('id', $objectId)->delete();
                }
            }

            Flash::success(Lang::get('indikator.marketing::lang.flash.remove'));
        }

        return $this->listRefresh('manage');
    }
}
