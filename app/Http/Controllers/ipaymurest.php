<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\ClientException;
use Guzzle\Http\Exception\ClientErrorResponseException;

class ipaymurest extends Controller
{
    public function getsaldo(Request $r){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://my.ipaymu.com/api/saldo?key='.$r->key.'');
        return $response->getBody();
    }
    public function cektransaksi(Request $req){
        $client =new \GuzzleHttp\Client();
        $resp =$client->post('my.ipaymu.com/api/transaksi',[
            'form_params'=>[
                //parameter
                'id'=>$req->id,
                'key'=>$req->key,
                'format'=>'json'
            ]
        ]);
        return json_decode($resp->getBody(), true);
    }

    public function paymentsingel(Request $req){
        $client=new \GuzzleHttp\Client();
        $resp=$client->post('https://my.ipaymu.com/payment',[
            'form_params'=>[
                //Parameter 
                'key'=>$req->key,
                'action'=>'payment',
                'product'=>$req->product,
                'price'=>$req->price,
                'quantity'=>$req->quantity,
                'comments'=>$req->comments,
                'ureturn'=>'http://websiteanda.com/return.php?q=return',
                'unotify'=>'http://websiteanda.com/notify.php',
                'ucancel'=>'http://websiteanda.com/cancel.php',
                'format'=>'json',//default json or xmlhttp
                 /* Parameter tambahan untuk pembayaran COD
                 * ----------------------------------------------- */
                 //'weight'     => '0.5', // Berat barang (satuan kilo)
                 //'dimensi'    => '1:2:1', // Dimensi barang (format => panjang:lebar:tinggi)
                 //'postal_code'=> '82131',  // Kode pos untuk custom pikcup
                 //'address'    => 'Jalan Raya Kuta, No 88R, Badung, Bali', // Alamat untuk custom pickup
                 /* ----------------------------------------------- */     
                'address'=>$req->address,
                'buyer_name'  => $req->buyer_name,
                'buyer_phone' => $req->buyer_phone, 
                'buyer_email' => $req->buyer_email, 
                'auto_redirect'=>'10',
               
                ]
        ]);
        
        return $resp->getBody();
    }

}
