<?php

namespace Tests\Unit;

use App\Models\Products;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_true_is_true()
    {
        $this->assertTrue(true);
    }

    public function test_vat_price()
    {
        $product = Products::where('status',1)->first();

        $expected = (float)(($product->quantity * $product->price) * (1 + Config::get('vat.vat_value')));

        $this->assertEquals($expected,$product->getVatPrice());
    }
}
