<?php

namespace App\Services;

use App\Models\SubscriptionPayment;
use App\Models\SubscriptionPackage;
use App\Models\User;
use Illuminate\Support\Str;
use Xendit\Invoice\CreateInvoiceRequest;
use Xendit\Invoice\InvoiceApi;

class SubscriptionService
{
    /**
     * subscribe
     *
     * @param  mixed $user
     * @param  mixed $period
     * @return void
     */
    public function subscribe(User $user, string $period)
    {
        $startAt = now();
        $package = SubscriptionPackage::first();

        $user->subscription()->create([
            'price' => $period === 'month' ? $package->monthly_price : $package->yearly_price,
            'period' => $period,
            'start_at' => $startAt,
            'end_at' => $startAt->copy()->add(1, $period)->endOfDay()
        ]);
    }
    
    /**
     * createPayment
     *
     * @param  mixed $user
     * @param  mixed $period
     * @return SubscriptionPayment
     */
    public function createPayment(User $user, string $period): SubscriptionPayment
    {
        $externalId = Str::uuid()->toString();
        $package = SubscriptionPackage::first();

        $amount = $period === 'month' ? $package->monthly_price : $package->yearly_price;
        
        $invoice = (new InvoiceApi())
            ->createInvoice(new CreateInvoiceRequest([
                'external_id' => $externalId,
                'amount' => $amount,
                'description' => 'Pembayaran Langganan ' . setting('name') . ($period === 'month' ? ' Bulanan' : ' Tahunan'),
                'currency' => 'IDR',
                'invoice_duration' => 15 * 60 * 60,
            ]));

        return $user->subscriptionPayments()
            ->create([
                'package_period' => $period,
                'external_id' => $externalId,
                'amount' => $amount,
                'invoice_url' => $invoice->getInvoiceUrl()
            ]);
    }
}
