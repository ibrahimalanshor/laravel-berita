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
        $hasSubscription = Auth::check() && Auth::user()->subscription;

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

        return view('subscribe', [
            'title' => 'Berlangganan Lararita',
            'description' => 'Dapatkan manfaat-manfaat seperti notifikasi artikel terbaru, akses ke artikel premium, bebas iklan dengan berlangganan Lararita',
            'features' => $features,
            'hasSubscription' => $hasSubscription
        ]);
    }
    
    /**
     * checkout
     *
     * @param  mixed $request
     * @param  mixed $subscriptionService
     * @return void
     */
    public function checkout(Request $request, SubscriptionService $subscriptionService)
    {
        $user = $request->user();
        $subscription = $user->subscription;

        abort_if($subscription, 403);

        $request->validate([
            'period' => ['required', 'in:month,year']
        ]);

        $subscriptionService->subscribe($user, $request->input('period'));

        return redirect()
            ->route('home')
            ->with('message', 'Berlangganan berhasil! Nikmati manfaatnya sekarang.');
    }
}
