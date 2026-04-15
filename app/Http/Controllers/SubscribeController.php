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
        if (!Auth::check()) {
            $request->session()->put('login-action-checkout', $package->slug);

            return redirect()
                ->route('login');
        }

        return view('subscribe.checkout', [
            'title' => 'Checkout Berlangganan Lararita',
            'description' => "Konfirmasi berlangganan paket {$package->name} dengan melakukan pembayaran melalui metode yang tersedia",
            'package' => $package
        ]);
    }
}
