<?php 

namespace App\Controllers;
use App\Entities\CustomerData;
use Windwalker\Renderer\PhpRenderer;

class DirectoryController{
    public function __construct() {
        echo "En el constructor BaseClass\n";
    }

    public function index(){
        $users = CustomerData::getUsers();
        $data = array('users' => json_decode($users));

        $config = array();

        $renderer = new PhpRenderer( $_SERVER['DOCUMENT_ROOT'] . '/resources/views', $config);

        echo $renderer->render('directory', $data);
    }
}