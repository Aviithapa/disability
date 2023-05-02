<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Modules\Backend\SiteSetting\Repositories\SiteSettingRepository;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    //
    private $siteSettingRepository;

    public function __construct(SiteSettingRepository $siteSettingRepository)
    {
        $this->siteSettingRepository = $siteSettingRepository;
    }

    public function index()
    {
        $site_settings = $this->siteSettingRepository->getAll();
        return view('admin.pages.setting.index', compact('site_settings'));
    }

    public function edit()
    {
        $site_settings = $this->siteSettingRepository->getAll();
        return view('admin.pages.setting.form', compact('site_settings'));
    }


    public function UpdateSiteSettings(Request $request)
    {
        $inputs = $request->all();
        unset($inputs['_token']);
        //        Only because theme send its own field
        if (isset($inputs['_wysihtml5_mode'])) unset($inputs['_wysihtml5_mode']);
        try {
            foreach ($inputs as $k => $v) {
                $display_name = ucfirst(str_replace_first('_', ' ', $k));
                $setting = $this->siteSettingRepository->getAll()->where('name', '=', $k)->first();
                if ($setting != null) {
                    $this->siteSettingRepository->update(['name' => $k, 'value' => $v, 'display_name' => $display_name], $setting->id);
                } else {
                    $this->siteSettingRepository->create(['name' => $k, 'value' => $v, 'display_name' => $display_name]);
                }
            }
            session()->flash('success', 'Site Settings Updated Successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('danger', 'Ops! Something went wrong');
            return redirect()->back();
        }
    }
}
