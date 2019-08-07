<?php

namespace ikdev\procedure_migration;

use ikdev\procedure_migration\app\Console\Command\CreateNewProcedure;
use ikdev\procedure_migration\app\Console\Command\ProcedureMigrate;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class ProcedureMigrationsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        
        $this->publishes([
            __DIR__.'/database/procedures' => database_path('procedures'),
        ], 'procedure_migration');
        
        if ($this->app->runningInConsole()) {
            $this->commands([
                ProcedureMigrate::class,
                CreateNewProcedure::class,
            ]);
        }
    }
}
