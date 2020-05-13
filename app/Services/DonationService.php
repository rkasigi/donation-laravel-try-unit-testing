<?php


namespace App\Services;


use App\Models\Donation;

class DonationService
{
    /**
     * @var Donation
     */
    private $donation;

    public function __construct(Donation $donation)
    {
        $this->donation = $donation;
    }

    /**
     * @param double $donation
     * @return bool
     */
    public function addDonation(float $donation)
    {
        $balance = $this->getBalance();

        $newBalance = mathAdd($balance, $donation);

        $donation = new Donation([
            'debit' => $donation,
            'credit' => 0,
            'balance' => $newBalance
        ]);

        return $donation->save();


    }

    /**
     * Get current balance
     *
     * @return double
     */
    public function getBalance()
    {
        $balance = 0;

        $donation = $this->donation
                        ->orderBy('created_at', 'desc')
                        ->first();

        if ($donation !== null) {
            $balance = $donation->balance;

        }

        return $balance;

    }

}
