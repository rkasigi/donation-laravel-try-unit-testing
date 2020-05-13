<?php

namespace Tests\Feature\Http\Controllers;

use App\Services\DonationService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DonationControllerTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    /**
     * @var DonationService
     */
    protected $donationService;

    public function setUp(): void
    {
        parent::setUp();
        $this->donationService = $this->app->make(DonationService::class);
    }

    /**
     * Test list all donation history
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get(route('donation.index'));

        $response->assertStatus(200);
        $response->assertViewIs('donation.index');
    }

    /**
     * Test add donation page
     */
    public function testCreate()
    {
        $response = $this->get(route('donation.create'));

        $response->assertStatus(200);
        $response->assertViewIs('donation.create');

    }


    /**
     * add donation positive testing
     */
    public function testStorePositive()
    {
        $currentBalance = $this->donationService->getBalance();
        $donationAmount = $this->faker->randomFloat(2);
        $response = $this->post(
            route('donation.store'),
            ['donation_amount' => $donationAmount],
            ['HTTP_REFERER' => route('donation.create')]
        );
        $response->assertStatus(302);
        $response->assertSessionHasNoErrors('donation_amount');

        $expectedBalance = mathAdd($currentBalance, $donationAmount);
        $balanceAfterAdd = $this->donationService->getBalance();

        $this->assertEquals($expectedBalance, $balanceAfterAdd);

    }

    /**
     * add donation negative testing
     */
    public function testStoreNegative()
    {

        $response = $this->post(
            route('donation.store'),
            ['donation_amount' => $this->faker->randomAscii],
            ['HTTP_REFERER' => route('donation.create')]
        );
        $response->assertStatus(302);
        $response->assertSessionHasErrors('donation_amount');
    }


}
