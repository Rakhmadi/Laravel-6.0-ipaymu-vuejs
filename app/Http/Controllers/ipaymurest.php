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
}
