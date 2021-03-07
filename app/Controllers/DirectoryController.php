<?php 

namespace App\Controllers;
use App\Entities\CustomerData;
use App\Controllers\AuthController;
use Windwalker\Renderer\PhpRenderer;

class DirectoryController {

    public function index(){
        AuthController::redirectIsNotActive();
        $users = CustomerData::getUsers();
        $users = json_decode($users);
        $data = array('users' => $users->objects);

        $config = array();

        $renderer = new PhpRenderer( $_SERVER['DOCUMENT_ROOT'] . '/resources/views', $config);

        echo $renderer->render('directory', $data);
    }

    public function filter(){
        AuthController::redirectIsNotActive();
        $users = CustomerData::getUsers();
        $users = json_decode($users);
        $key1 = array_search($_REQUEST['search'], array_column($users->objects, 'first_name'));
        $key2 = array_search($_REQUEST['search'], array_column($users->objects, 'email'));

        $arrayKeys = [$key1, $key2];
        $newUsers = [];

        for ($i=0; $i < count($arrayKeys); $i++) {
            if(!empty($arrayKeys[$i])){
                $newUsers[] = $users->objects[$arrayKeys[$i]];
            }
        }

        $data = array('users' => $newUsers);

        $config = array();

        $renderer = new PhpRenderer( $_SERVER['DOCUMENT_ROOT'] . '/resources/views', $config);

        echo $renderer->render('directory', $data);
    }
}