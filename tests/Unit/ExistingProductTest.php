<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExistingProductTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExistingProduct()
    {
        $response = $this->json('POST', '/products', ['title' => 'Fallout', 'price' => '1.99']);

        $response
            ->assertStatus(422);
    }
}
