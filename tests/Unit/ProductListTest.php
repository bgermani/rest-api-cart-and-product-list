<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductListTest extends TestCase
{
    /**
     * Test product listing.
     *
     * @return void
     */
    public function testProductList()
    {
    	$response = $this->json('GET', '/products');
        $response
        	->assertStatus(200);
    }
}
