<?php

namespace App\Services\Gateways;

use Paytabscom\Laravel_paytabs\Facades\paypage;

class PayTabsService {
    public function __construct() {
        $pay = paypage::sendPaymentCode('all')
            ->sendTransaction('sale', 'ecom')
            ->sendCart(10,1000,'test')
            ->sendCustomerDetails('Walaa Elsaeed', 'w.elsaeed@paytabs.com', '0101111111', 'test', 'Nasr City', 'Cairo', 'EGP', '1234','100.279.20.10')
            ->sendURLs('return_url', route('success'))
            ->sendLanguage('en')
            ->create_pay_page();
    }
}