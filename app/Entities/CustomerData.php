<?php 

namespace App\Entities;

class CustomerData {
    public function get($url){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url);
        return $response->getBody();
    }

    public function getUsers(){
        return CustomerData::get('http://www.mocky.io/v2/5d9f39263000005d005246ae?mocky-delay=10s');
    }

    public function getCountries(){
        return CustomerData::get('https://restcountries.eu/rest/v2/all');
    }

}