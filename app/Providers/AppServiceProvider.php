<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format($expression, 0, ',', '.'); ?>";
        });
        $setting = Setting::all();
        $dataSetting[0] = [];
        foreach ($setting as $key => $item) {
            $dataSetting[0][$item['kode']] =  [
                "code" => $item['kode'],
                "value" => $item['value']
            ];
        }
        // dd($dataSetting);
        View::share('personalisasi', $dataSetting);

    }
}
