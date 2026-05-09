<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPayment;
use App\Services\SubscriptionService;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * paymentWebhook
     *
     * @param  mixed $request
     * @param  mixed $subscriptionService
     * @return void
     */
    public function paymentWebhook(Request $request, SubscriptionService $subscriptionService)
    {
        abort_if($request->header('x-callback-token') !== config('services.xendit.webhook_token'), 200);

        if ($request->input('status') === 'PAID') {
            $payment = SubscriptionPayment::firstWhere('external_id', $request->input('external_id'));

            if ($payment) {
                $payment->update([
                    'paid_at' => $request->input('paid_at')
                ]);

                $subscriptionService->subscribe($payment->user, $payment->package_period);
            }
        }

        return "OK";
    }
}
