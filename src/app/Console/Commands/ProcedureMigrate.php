<?php

namespace ikdev\procedure_migration\app\Console\Command;

use Carbon\Carbon;
use ikdev\procedure_migration\app\Procedure;
use Illuminate\Console\Command;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProcedureMigrate extends Command
{
    protected $signature = 'procedure:migrate';
    protected $description = 'Perform a stored procedure migration';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function handle()
    {
        foreach (scandir(database_path('procedures')) as $procedure) {
            if (in_array($procedure, ['.', '..'])) {
                continue;
            }
            
            $file = new \SplFileInfo(database_path("procedures/{$procedure}"));
            
            if ($file->getExtension() === 'sql') {
                $checksum = md5_file(database_path("procedures/$procedure"));
                $existing_procedure = Procedure::where('filename', $file->getFilename())->exists();
                
                if(!$existing_procedure){
                    $this->line("Found '{$file->getFilename()}' procedure! Trying to insert new procedure in database");
                    
                    try{
                        DB::unprepared(File::get(database_path("procedures/$procedure")));
                        Procedure::insert([
                            "filename" => $file->getFilename(),
                            "checksum" => $checksum,
                            "created_at" => Carbon::now()
                        ]);
                        $this->line("Procedure {$file->getFilename()} correctly insert");
                    }catch (QueryException $e){
                        $this->error($e->getMessage());
                        throw $e;
                    }
                    
                }
            }
            
        }
    }
}
