<?php

namespace Tests\Unit;

use App\Models\Pathology;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class PathologyTest extends TestCase
{
    use WithFaker,RefreshDatabase,DatabaseMigrations;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_can_create_pathology()
    {
       $pathology = factory(Pathology::class)->create();
       $this->assertEquals(1,$pathology->count());
    }
}
