<?php

namespace App\Providers;

use App\Decorators\CurrencyCOPDecorator;
use App\Decorators\CurrencyUSDDecorator;
use App\Decorators\PriceFormatter;
use App\Decorators\PriceFormatterContract;
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
        $this->app->bind(PriceFormatterContract::class, function() {
            $formatter = new PriceFormatter();

            switch (config('app.currency')) {
                case 'COP':
                    return new CurrencyCOPDecorator($formatter);
                case 'USD':
                    return new CurrencyUSDDecorator($formatter);
            }

            return $formatter;
        });
    }
}
