<?php 

namespace App\Controllers;
use App\Entities\CustomerData;
use Windwalker\Renderer\PhpRenderer;
use App\Entities\User;

class UserController{

    public function registerForm(){
        $countries = CustomerData::getCountries();
        $data = array('countries' => json_decode($countries));

        $config = array();

        $renderer = new PhpRenderer( $_SERVER['DOCUMENT_ROOT'] . '/resources/views', $config);

        echo $renderer->render('register', $data);
    }

    public function register(){
        $exists = UserController::userExists();
        $validator = UserController::registerEmptyValidator();
        if ($exists && $validator) {
            UserController::save();
        }
    }

    public function userExists(){
        $user = User::where('email', '=', $_REQUEST['email'])->where('document', '=', $_REQUEST['document'])->get();
        $validationMessage = '';
        if(count($user) > 0){
            $validationMessage = '<div class="alert alert-danger">
                User already exists.
            </div>';

            UserController::registerMessage($validationMessage);
            return false;
        }
        return true;
    }

    public function registerEmptyValidator(){
        $name = $_REQUEST['name'];
        $document = $_REQUEST['document'];
        $email = $_REQUEST['email'];
        $country = $_REQUEST['country'];
        $password = $_REQUEST['password'];

        $validationMessage = '';

        if(empty($name)){
            $validationMessage .= '<div class="alert alert-danger">
                Name can not be blank.
            </div>';
        }
        if(empty($document)){
            $validationMessage .= '<div class="alert alert-danger">
                Document can not be blank.
            </div>';
        }
        if(empty($email)){
            $validationMessage .= '<div class="alert alert-danger">
                Email can not be blank.
            </div>';
        }
        if(empty($country)){
            $validationMessage .= '<div class="alert alert-danger">
                Country number can not be blank.
            </div>';
        }
        if(empty($password)){
            $validationMessage .= '<div class="alert alert-danger">
                Password can not be blank.
            </div>';
        }   
        if ($validationMessage != '') {
            UserController::registerMessage($validationMessage);
            return false;
        }
        return true;
    }

    public function registerValidator(){
        $name = $_REQUEST['name'];
        $document = $_REQUEST['document'];
        $email = $_REQUEST['email'];
        $country = $_REQUEST['country'];
        $password = $_REQUEST['password'];
        $validationMessage = '';

        if(!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $validationMessage .= '<div class="alert alert-danger">
                    Name: Only letters and white space allowed.
                </div>';
        }

        if(!preg_match("/^[0-9]*$/", $document)) {
            $validationMessage .= '<div class="alert alert-danger">
                    Document: Only numbers.
                </div>';
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $validationMessage .= '<div class="alert alert-danger">
                    Email: format is invalid.
                </div>';
        }

        if(!preg_match("/^[a-zA-Z ]*$/", $country)) {
            $validationMessage .= '<div class="alert alert-danger">
                Country: Only letters and white space allowed.
                </div>';
        }

        if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/", $password)) {
            $validationMessage .= '<div class="alert alert-danger">
                     Password: should be between 6 to 20 charcters long, contains atleast one special chacter, lowercase, uppercase and a digit.
                </div>';
        }

        if ($validationMessage != '') {
            UserController::registerMessage($validationMessage);
            return false;
        }
        return true;
    }

    public function registerMessage($message){
        $countries = CustomerData::getCountries();
        $data = array('message' => $message, 'countries' => json_decode($countries));

        $config = array();

        $renderer = new PhpRenderer( $_SERVER['DOCUMENT_ROOT'] . '/resources/views', $config);

        echo $renderer->render('register', $data);
    }

    public function save() {
        User::create([
            'name' => $_REQUEST['name'],
            'document' => $_REQUEST['document'],
            'email' => $_REQUEST['email'],
            'state' => $_REQUEST['country'],
            'password' => password_hash($_REQUEST['password'], PASSWORD_BCRYPT),
        ]);

        $validationMessage = '<div class="alert alert-success">
            Successfully user registered
        </div>';

        UserController::registerMessage($validationMessage);
    }

    public function loginForm(){
        $config = array();

        $renderer = new PhpRenderer( $_SERVER['DOCUMENT_ROOT'] . '/resources/views', $config);

        echo $renderer->render('login');
    }

    public function login(){
        $user = User::where('email', '=', $_REQUEST['email_login'])->first();

        if($user){
            $password = password_verify($_REQUEST['password_login'], $user->password);
            if($_REQUEST['email_login'] == $user->email && $_REQUEST['password_login'] == $password) {
                $user->is_Active = true;
                $user->save();
                header('Location: http://localhost:4000/directory');
            }else{
                $message = '<div class="alert alert-danger">
                                Either email or password is incorrect.
                            </div>';
                            $config = array();

                $data = array('message' => $message);

                $renderer = new PhpRenderer( $_SERVER['DOCUMENT_ROOT'] . '/resources/views', $config);

                echo $renderer->render('login', $data);
            }
        }

    }

    public function logout(){
        session_start();
        session_destroy();

        header('Location: http://localhost:4000/login');
    }
}