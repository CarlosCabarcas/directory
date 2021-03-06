<?php 

namespace App\Entities;

class CustomerData {
    public function getUsers(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://www.mocky.io/v2/5d9f39263000005d005246ae?mocky-delay=10s');
        return $response->getBody();
    }
}