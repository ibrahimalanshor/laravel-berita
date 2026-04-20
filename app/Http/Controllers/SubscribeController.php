<?php

namespace App\Http\Controllers;

use App\Models\SubscriptionPackage;
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
        $packages = SubscriptionPackage::all();

        return view('subscribe.index', [
            'title' => 'Berlangganan Lararita',
            'description' => 'Dapatkan manfaat-manfaat seperti notifikasi artikel terbaru, akses ke artikel premium, bebas iklan dengan berlangganan Lararita',
            'packages' => $packages
        ]);
    }
    
    /**
     * checkout
     *
     * @param  mixed $package
     * @param  mixed $request
     * @return void
     */
    public function checkout(SubscriptionPackage $package, Request $request)
    {
        return view('subscribe.checkout', [
            'title' => 'Checkout Berlangganan Lararita',
            'description' => "Konfirmasi berlangganan paket {$package->name} dengan melakukan pembayaran melalui metode yang tersedia",
            'package' => $package
        ]);
    }
    
    /**
     * pay
     *
     * @param  mixed $package
     * @param  mixed $request
     * @return void
     */
    public function pay(SubscriptionPackage $package, Request $request)
    {
        $user = $request->user();

        $user->subscription()->create([
            'package_id' => $package->id,
            'package_name' => $package->name,
            'package_price' => $package->price,
            'newsletter' => $package->newsletter,
            'no_ads' => $package->no_ads,
            'premium_articles' => $package->premium_articles
        ]);

        return redirect()
            ->route('home')
            ->with('message', 'Berlangganan berhasil! Nikmati manfaatnya sekarang.');
    }
}
