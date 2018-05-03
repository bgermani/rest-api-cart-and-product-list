<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExistingProductTest extends TestCase
{
    /**
     * Test for repeat product title.
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
