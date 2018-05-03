<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewProductTest extends TestCase
{
    /**
     * Add product that does not exist to catalog.
     *
     * @return void
     */
    public function testNewProduct()
    {
        $response = $this->json('POST', '/products', ['title' => 'Testgame', 'price' => '10']);

        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }
}
