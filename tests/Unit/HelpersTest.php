<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;


class HelpersTest extends TestCase
{
    use WithoutMiddleware; // use this trait

    /** @test */
    public function page_title_should_return_the_base_title_if_title_is_empty()
    {

        $this->assertEquals("Laravel - List of artisans", page_title(''));
    }

    /** @test */
    public function page_title_should_return_the_correct_title_if_title_is_provided()
    {

        $this->assertEquals("About | Laravel - List of artisans", page_title('About'));
    }
}
