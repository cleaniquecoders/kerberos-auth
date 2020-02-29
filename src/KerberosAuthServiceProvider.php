<?php

namespace CleaniqueCoders\KerberosAuth;

use Illuminate\Support\ServiceProvider;

class KerberosAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/kerberos.php' => config_path('kerberos.php'),
        ], 'kerberos-auth-config');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
