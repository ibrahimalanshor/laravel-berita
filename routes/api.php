<?php

use App\Http\Controllers\Api\SubscriptionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/subscription/payment-webhook', [SubscriptionController::class, 'paymentWebhook']);
