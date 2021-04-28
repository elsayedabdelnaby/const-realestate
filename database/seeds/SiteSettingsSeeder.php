<?php

use App\Models\SiteSetting;
use App\Models\SiteSettingTranslation;
use Illuminate\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $site_settings = new SiteSetting();
        $site_settings->logo = 'logo.svg';
        $site_settings->save();

        $site_settings_translation = new SiteSettingTranslation();
        $site_settings_translation->site_setting_id = $site_settings->id;
        $site_settings_translation->locale = 'en';
        $site_settings_translation->title = 'Find Houses';
        $site_settings_translation->meta_title = 'Find Houses Title';
        $site_settings_translation->meta_description = 'Find Houses Description';
        $site_settings_translation->meta_keyword = 'houses, departments, rent, sale, properties, units';
        $site_settings_translation->save();

        $site_settings_translation = new SiteSettingTranslation();
        $site_settings_translation->site_setting_id = $site_settings->id;
        $site_settings_translation->locale = 'ar';
        $site_settings_translation->title = 'Find Houses';
        $site_settings_translation->meta_title = 'اجد المنزل';
        $site_settings_translation->meta_description = 'اجد المنزلDescription';
        $site_settings_translation->meta_keyword = 'اجد المنزل, departments, rent, sale, properties, units';
        $site_settings_translation->save();
    }
}
