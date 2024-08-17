<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class calculatorTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_that_all_operators_are_usable(): void
    {
        $this->artisan('app:calculator 1 + 1')
            ->expectsOutput("2")
            ->assertSuccessful(0);

        $this->artisan('app:calculator 1 - 1')
            ->expectsOutput("0")
            ->assertSuccessful(0);

        $this->artisan('app:calculator 1 * 1')
            ->expectsOutput("1")
            ->assertSuccessful(0);

        $this->artisan('app:calculator 1 / 1')
            ->expectsOutput("1")
            ->assertSuccessful(0);

        $this->artisan('app:calculator 4 sqrt')
            ->expectsOutput("2")
            ->assertSuccessful(0);
    }

    public function test_that_operators_with_two_parameters_throw_error_when_receiving_one() {
        $this->artisan('app:calculator 1 + ')
            ->expectsOutput("This operation requires two numerical values")
            ->assertSuccessful(0);

        $this->artisan('app:calculator 1 - ')
            ->expectsOutput("This operation requires two numerical values")
            ->assertSuccessful(0);

        $this->artisan('app:calculator 1 * ')
            ->expectsOutput("This operation requires two numerical values")
            ->assertSuccessful(0);

        $this->artisan('app:calculator 1 / ')
            ->expectsOutput("This operation requires two numerical values")
            ->assertSuccessful(0);
    }

    public function test_that_division_by_zero_is_not_allowed() {
        $this->artisan('app:calculator 1 / 0')
        ->expectsOutput("Cannot divide by 0")
        ->assertSuccessful(0);
    }

    public function test_that_you_cant_manke_operations_with_string_parameters() {
        $this->artisan('app:calculator 1 + a')
        ->expectsOutput("This operation requires two numerical values")
        ->assertSuccessful(0);
    }
}
