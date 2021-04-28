<?php

use App\Models\ContactUsInfo;
use Illuminate\Database\Seeder;


class ContactUsInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contact_us_info = new ContactUsInfo();
        $contact_us_info->phone = '(234) 0200 17813';
        $contact_us_info->location_title = '95 South Park Ave, USA';
        $contact_us_info->location_link = 'https://goo.gl/maps/aH3Tn6sFVUFz2LHo6';
        $contact_us_info->email = 'info@findhouses.com';
        $contact_us_info->facebook_url = 'https://www.facebook.com/';
        $contact_us_info->twitter_url = 'https://twitter.com/home';
        $contact_us_info->instagram_url = 'https://www.instagram.com/';
        $contact_us_info->linkedin_url = 'linkedin.com';
        $contact_us_info->start_working_at = '8:00 AM';
        $contact_us_info->end_working_at=  '6:00 PM';
        $contact_us_info->save();
    }
}
