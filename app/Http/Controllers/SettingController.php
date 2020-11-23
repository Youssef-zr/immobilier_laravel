<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::where('id', '1')->first();
        $title = 'تعديل اعدادات الموقع';
        return view('dashboard.admin.settings', ["settings" => $settings, 'title' => $title]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $rules = [
            'sitename' => 'required|string|min:6|max:50',
            'email' => 'required|string|email',
            'description' => 'required|string|min:6|max:255',
            'keywords' => 'required|string|min:6|max:255',
            'status' => 'required|boolean',
            'message_maintenance' => 'required|string|min:6|max:150',
            'icon' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif',
            'logo' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif',
            'facebook_link' => 'required|string',
            'twitter_link' => 'required|string',
            'linkedin_link' => 'required|string',
            'mobile' => 'required|numeric|min:6,max:12',
            'adress' => 'required|string',
        ];

        $niceNames = [
            'sitename' => 'اسم الموقع',
            'email' => 'بريد الموقع',
            'description' => 'وصف الموقع',
            'keywords' => 'الكلمات الدلالية',
            'status' => 'الحالة',
            'message_maintenance' => 'رسالة وضع الصيانة',
            'icon' => 'أيقونة الموقع',
            'logo' => 'شعار الموقع',
            'facebook_link' => 'رابط الفايسبوك',
            'twitter_link' => 'رابط التويتر',
            'linkedin_link' => 'رابط اللينكد ان',
            'mobile' => 'رقم الهاتف',
            'adress' => 'العنوان',
        ];
        $data = $this->validate($request, $rules, [], $niceNames);

        $old_settings = Setting::findOrFail($request->id);

        if ($request->hasFile('icon')) {
            if ($old_settings->icon != 'website/settings/default_icon.png' and Storage::has($old_settings->icon)) {
                Storage::delete($old_settings->icon);
            }
            $data['icon'] = $request->file('icon')->store('website/settings');
        }

        if ($request->hasFile('logo')) {
            if ($old_settings->logo != 'website/settings/default_logo.png' and Storage::has($old_settings->logo)) {
                Storage::delete($old_settings->logo);
            }
            $data['logo'] = $request->file('logo')->store('website/settings');
        }

        $old_settings->fill($data)->save();

        $request->session()->flash('msgSuccess', 'ثم تعديل البيانات بنجاح');

        // update the session settings
        update_settings();
        return back();

    }

}
