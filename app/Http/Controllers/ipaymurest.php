<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
                'id'=>$req->id,
                'key'=>$req->key,
                'format'=>'json'
            ]
        ]);
        return $resp->getBody();
    }
    public function paymentsingel(Request $req){
        $client=new \GuzzleHttp\Client();
        $resp=$client->post('https://my.ipaymu.com/payment',[
            'form_params'=>[
                'key'=>$req->key,
                'action'=>'payment',
                'product'=>$req->nama_produk,
                'price'=>$req->price,
                'quantity'=>$req->quantity,
                'comments'=>'Keterangan Produk',
                'ureturn'=>'http://websiteanda.com/return.php?q=return',
                'unotify'=>'http://websiteanda.com/notify.php',
                'ucancel'=>'http://websiteanda.com/cancel.php',
                'format'=>'json',
                'weight'=>'0.5',
                'dimensi'=>'1:2:1',
                'postal_code'=>'80361',
                'address'=>'Jalan raya Kuta, No. 88 R, Badung, Bali',
                'auto_redirect'=>'10',
            ]
        ]);
    }

}
