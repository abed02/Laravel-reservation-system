<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\StmpSetting;
use Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (\Schema::hasTable('stmp_settings')) 
        {
            $smtp =StmpSetting::first();

        }//end IF  

        if ($smtp)
        {
            $data = [
                'driver' =>$smtp->mailer,
                'host' =>$smtp->host,
                'port' =>$smtp->port,
                'username' =>$smtp->username,
                'password' =>$smtp->password,
                'encryption' =>$smtp->encryption,
                'from' =>
                    [
                        'address' =>$smtp->from_address,
                        'name'  =>'Hotel'
                    ]

            ];
            config::set('mail',$data);
        }//endif 
    }
}
