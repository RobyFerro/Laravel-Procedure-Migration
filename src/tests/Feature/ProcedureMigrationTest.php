<?php

namespace ikdev\procedure_migration\tests\Features;

use Tests\TestCase;

class ProcedureMigrationTest extends TestCase
{
	public function testProcedureMigration()
	{
		$this->artisan('procedure:migrate');
		$this->assertDatabaseHas('procedure_migrations',[
			'filename' => 'first_procedure.sql'
		]);
		
    }
}
