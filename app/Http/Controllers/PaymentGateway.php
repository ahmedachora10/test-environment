<?php

namespace App\Http\Controllers;

use App\Services\Gateways\PayTabsService;
use Illuminate\Http\Request;

class PaymentGateway extends Controller
{
    public function payTaps() {
        return new PayTabsService();
    }
}