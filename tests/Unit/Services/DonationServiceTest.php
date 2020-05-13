<?php

namespace Tests\Unit\Services;

use App\Models\Donation;
use App\Services\DonationService;
use PHPUnit\Framework\TestCase;
use Mockery;

class DonationServiceTest extends TestCase
{
    protected function tearDown(): void
    {
        Mockery::close();
    }


    public function testGetBalanceWithNull()
    {
        $donationModel = $this->getDonationModelWithObject(null);
        $donationService = new DonationService($donationModel);
        $this->assertEquals(0, $donationService->getBalance());

    }

    public function testGetBalanceHasValue()
    {
        $expectedBalance = 100.45;

        $donationModel = $this->getDonationModelWithBalance($expectedBalance);
        $donationService = new DonationService($donationModel);
        $this->assertEquals($expectedBalance, $donationService->getBalance());

    }

    /**
     * @param $finalReturnObject
     * @return Donation|Mockery\LegacyMockInterface|Mockery\MockInterface
     */
    private function getDonationModelWithObject($finalReturnObject)
    {
        $donationModel = Mockery::mock(Donation::class);
//        $donationModel = Mockery::mock('overload:' . Donation::class);

        $donationModel
            ->shouldReceive('save')
            ->andReturn(true);

        $donationModel
            ->shouldReceive('orderBy')
            ->once()
            ->andReturnSelf();

        $donationModel
            ->shouldReceive('first')
            ->once()
            ->andReturn($finalReturnObject);

        return $donationModel;

    }

    /**
     * @param $expectedBalance
     * @return Donation|Mockery\LegacyMockInterface|Mockery\MockInterface
     */
    private function getDonationModelWithBalance($expectedBalance)
    {

        $donationObject = new Donation();
        $donationObject->setAttribute('balance', $expectedBalance);

        return $this->getDonationModelWithObject($donationObject);
    }


}
