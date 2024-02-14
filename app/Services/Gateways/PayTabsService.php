<?php

namespace App\Services\Gateways;

use Illuminate\Support\Facades\Http;
use Paytabscom\Laravel_paytabs\Facades\paypage;

class PayTabsService {
    public function __construct() {
        // $pay = paypage::sendPaymentCode('all')
        //     ->sendTransaction('sale', 'ecom')
        //     ->sendCart(10,1000,'test')
        //     ->sendCustomerDetails('Walaa Elsaeed', 'w.elsaeed@paytabs.com', '0101111111', 'test', 'Nasr City', 'Cairo', 'EGP', '1234','100.279.20.10')
        //     ->sendURLs('return_url', route('success'))
        //     ->sendLanguage('en')
        //     ->create_pay_page();
        // dd($pay);

        $data =  [
            "tran_type"=> "sale",
            "tran_class"=> "ecom",
            "cart_id"=> "1212",
            "cart_currency"=> "SAR",
            "cart_amount"=> 12.3,
            "cart_description"=> "Description of the items/services",
            "paypage_lang"=> "en",
            "customer_details"=> [
                "name"=> "first last",
                "email"=> "email@domain.com",
                "phone"=> "0522222222",
                "street1"=> "address street",
                "city"=> "agadir",
                "state"=> "du",
                "country"=> "morocco",
                "zip"=> "12345"
            ],
            "shipping_details"=> [
                "name"=> "name1 last1",
                "email"=> "email1@domain.com",
                "phone"=> "971555555555",
                "street1"=> "street2",
                "city"=> "dubai",
                "state"=> "dubai",
                "country"=> "AE",
                "zip"=> "54321"
            ],
            "callback"=> "https://localhost/paytabs/Result.php",
            "return"=> "https://localhost/paytabs/Result.php"
        ];

        $data['profile_id'] = 107217;

        try {
            $response = Http::withHeaders([
                'Authorization' => 'S9JNHH6Z2K-JHL9RMTHT6-L6M9KL2D2M',
                'Content-Type' => 'application/json',
            ])->post('https://secure.paytabs.sa/payment/request', $data);

            // Handle the response as needed
            $result = $response->json();
            dd($result);
        } catch (\Exception $e) {
            // Handle exceptions (e.g., connection error, timeout)
            dd(['error' => $e->getMessage()]);
        }

    //     $curl = curl_init();
    //     curl_setopt_array($curl, array(
    //         CURLOPT_URL => 'https://secure-egypt.paytabs.com/payment/request',
    //         CURLOPT_RETURNTRANSFER => true,
    //         CURLOPT_ENCODING => '',
    //         CURLOPT_MAXREDIRS => 10,
    //         CURLOPT_TIMEOUT => 0,
    //         CURLOPT_CUSTOMREQUEST => 'POST',
    //         CURLOPT_POSTFIELDS => json_encode($data, true),
    //         CURLOPT_HTTPHEADER => array(
    //             'authorization:S2J99ZLWBD-JHLTLNNJNM-J2JWL9M66B',
    //             'Content-Type:application/json'
    //         ),
    //     ));

    //     $response = json_decode(curl_exec($curl), true);
    //     curl_close($curl);
    //     dd($response);
    //     return $response;
    }
}