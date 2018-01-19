<?php

namespace Tests;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp()
    {
        parent::setUp();

        // disable the foreigh_keys while testing
        DB::statement('PRAGMA foreigh_keys=on;');

        // since laravel 5.5, withoutExceptionHandling was offered out of box.
        $this->withoutExceptionHandling();
    }

    protected function signIn($user = null)
    {
        $user = $user ?: create('App\User');
        $this->actingAs($user);
        return $this;
    }
}
