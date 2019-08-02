<?php

namespace ikdev\procedure_migration\tests\Features;

use Tests\TestCase;

class ProcedureMigrationTest extends TestCase
{
	public function testProcedureMigration()
	{
		$this->artisan('procedure:migrate');
		$this->assertDatabaseHas('procedure_migrations', [
			'filename' => 'first_procedure.sql'
		]);
	}
	
	public function testCreateNewProcedure()
	{
		$result = false;
		$this->artisan('make:procedure test_procedure');
		
		foreach (scandir(database_path('procedures')) as $procedure) {
			if (in_array($procedure, ['.', '..'])) {
				continue;
			}
			
			if (preg_match('/test_procedure/', $procedure)){
				$result = true;
				unlink(database_path("procedures/{$procedure}"));
				break;
			}
	    }
		
		$this->assertTrue($result);
	}
}
