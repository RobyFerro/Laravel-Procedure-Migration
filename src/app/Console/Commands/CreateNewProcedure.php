<?php

namespace ikdev\procedure_migration\app\Console\Command;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateNewProcedure extends Command
{
    protected $signature = 'make:procedure {name}';
    protected $description = 'Create a new procedure';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $now = Carbon::now();
        $filename = "{$now->format('Y_m_d')}_{$this->argument('name')}";
        $this->warn("Creating new procedure called: {$filename}..");

        try {
            File::put(database_path("procedures/{$filename}.sql"), '');
        } catch (\Exception $e) {
            $this->error($e);
        }

        $this->info("New {$filename} procedure generated!");
    }
}
