<?php


namespace Tests\Feature\Services;

use App\Services\DonationService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DonationServiceTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var DonationService
     */
    private $donationService;

    public function setUp(): void
    {
        parent::setUp();
        $this->donationService = $this->app->make(DonationService::class);
    }

    public function testAddDonation()
    {
        $donationAmount = 100.25;


        $currentBalance = $this
            ->donationService
            ->getBalance();


        $result = $this
            ->donationService
            ->addDonation($donationAmount);

        $this->assertEquals(true, $result);

        $expectedBalance = $currentBalance + $donationAmount;
        $lastBalance = $this
            ->donationService
            ->getBalance();

        $this->assertEquals($expectedBalance, $lastBalance);

    }

}
