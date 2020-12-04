<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\User;

class UserCheckFiellableTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCheckFiellableTest()
    {
        $expected = [
            'name',
            'email',
            'password',
        ];
        $user = new User();

        $arrayCompared = array_diff($expected, $user->getFillable());

        $this->assertEquals(0, count($arrayCompared));
    }

}
