<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPackage;
use App\Services\SubscriptionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscribeController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $package = SubscriptionPackage::first();

        $features = [
            'newsletter' => [
                'title' => 'Notifikasi Email',
                'description' => 'Dapatkan notifikasi ke email Anda ketika ada berita dan artikel terbaru'
            ],
            'no_ads' => [
                'title' => 'Tanpa Iklan',
                'description' => 'Nikmati membaca berita dan artikel tanpa gangguan iklan'
            ],
            'premium_articles' => [
                'title' => 'Akses Artikel Premium',
                'description' => 'Baca berita dan artikel premium sepuasnya'
            ]
        ];

        return view('subscribe.index', [
            'title' => 'Berlangganan Lararita',
            'description' => 'Dapatkan manfaat-manfaat seperti notifikasi artikel terbaru, akses ke artikel premium, bebas iklan dengan berlangganan Lararita',
            'package' => $package,
            'features' => $features
        ]);
    }
    
    /**
     * checkout
     *
     * @param  mixed $package
     * @param  mixed $request
     * @return void
     */
    public function checkout(SubscriptionPackage $package, Request $request, SubscriptionService $subscriptionService)
    {
        $user = $request->user();
        $subscription = $user->subscription;

        abort_if($subscription && $subscription->package_id === $package->id, 403);

        $futureSubscription = $subscriptionService->getFutureSubscription($user, $package);

        return view('subscribe.checkout', [
            'title' => 'Checkout Berlangganan Lararita',
            'description' => "Konfirmasi berlangganan paket {$package->name} dengan melakukan pembayaran melalui metode yang tersedia",
            'package' => $package,
            'subscription' => $subscription,
            'futureSubscription' => $futureSubscription
        ]);
    }
        
    /**
     * pay
     *
     * @param  mixed $package
     * @param  mixed $request
     * @param  mixed $subscriptionService
     * @return void
     */
    public function pay(SubscriptionPackage $package, Request $request, SubscriptionService $subscriptionService)
    {
        $user = $request->user();
        $subscription = $user->subscription;
        $futureSubscription = $subscriptionService->getFutureSubscription($user, $package);

        abort_if($subscription && $subscription->package_id === $package->id && $futureSubscription, 403);

        $subscriptionService->subscribe($user, $package);

        return redirect()
            ->route('home')
            ->with('message', 'Berlangganan berhasil! Nikmati manfaatnya sekarang.');
    }
}
