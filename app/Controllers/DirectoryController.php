<?php 

namespace App\Controllers;
use App\Entities\CustomerData;
use Windwalker\Renderer\PhpRenderer;

class DirectoryController{
    public function index(){
        // $data = CustomerData::getUsers();
        // return json_decode($data);


        $config = array();

        $renderer = new PhpRenderer( $_SERVER['DOCUMENT_ROOT'] . '/resources/views', $config);

        $data = array('title' => 'foo');

        echo $renderer->render('directory', $data);
    }
}