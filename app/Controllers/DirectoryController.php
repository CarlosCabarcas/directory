<?php 

namespace App\Controllers;
use App\Entities\CustomerData;
use App\Controllers\AuthController;
use Windwalker\Renderer\PhpRenderer;

class DirectoryController {

    public function index(){
        AuthController::redirectIsNotActive();
        $users = CustomerData::getUsers();
        $data = array('users' => json_decode($users));

        $config = array();

        $renderer = new PhpRenderer( $_SERVER['DOCUMENT_ROOT'] . '/resources/views', $config);

        echo $renderer->render('directory', $data);
    }
}