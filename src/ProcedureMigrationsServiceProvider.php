<?php

namespace ikdev\procedure_migration;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use ikdev\procedure_migration\app\Console\Command\ProcedureMigrate;

class ProcedureMigrationsServiceProvider extends ServiceProvider
{
    public function boot(){
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        if($this->app->runningInConsole()){
            $this->commands([
                ProcedureMigrate::class
            ]);
        }
    }
}
