<?php

use App\Setting;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new Setting();

        $setting->sitename = 'خدمات ويب';
        $setting->logo = 'website/settings/default_logo.png';
        $setting->icon = 'website/settings/default_icon.png';
        $setting->email = 'yn-neinaa@gmail.com';
        $setting->description = 'خدمات ويب';
        $setting->keywords = 'خدمات ويب';
        $setting->status = 1;
        $setting->message_maintenance = 'تم اغلاق الموقع للصيانة';
        $setting->facebook_link = 'http://www.facebook.com/zidanhd';
        $setting->twitter_link = 'http://www.twitter.com/zidanhd';
        $setting->linkedin_link = 'http://www.linkedin.com/zidanhd';
        $setting->mobile = '212762927783';
        $setting->adress = '12 شارع 9أبريل وزان , المغرب';
        $setting->created_at = Carbon::now();
        $setting->updated_at = Carbon::now();
        $setting->save();
    }
}
