<?php


namespace App\Controllers;
use Windwalker\Renderer\PhpRenderer;
use App\Entities\User;

class AuthController{
    public function loginForm(){
        AuthController::redirectIsActive();
        $data = array('message' => '');
        $config = array();

        $renderer = new PhpRenderer( $_SERVER['DOCUMENT_ROOT'] . '/resources/views', $config);

        echo $renderer->render('login', $data);
    }

    public function login(){
        $validate = AuthController::validate();
        if($validate){
            AuthController::sigIn();
        }
    }

    public function sigIn(){
        $user = User::where('email', '=', $_REQUEST['email_login'])->first();

        if($user){
            $password = password_verify($_REQUEST['password_login'], $user->password);
            if($_REQUEST['email_login'] == $user->email && $_REQUEST['password_login'] == $password) {
                session_start();
                $_SESSION['user'] = $user;

                $user->is_Active = true;
                $user->save();

                header('Location: /directory'); 
            }else{
                $message = '<div class="alert alert-danger">
                                Either email or password is incorrect.
                            </div>';
                            $config = array();
                AuthController::loginMessage($message);
            }
        }else{
            $message = '<div class="alert alert-danger">
                                User not exists.
                            </div>';
                AuthController::loginMessage($message);
        }
    }

    public function validate(){
        if (!empty($_REQUEST['email_login']) && !empty($_REQUEST['password_login'])) {
            return true;
        }else{
            $message = '<div class="alert alert-danger">
                Email and Password can not be blank.
            </div>';
            AuthController::loginMessage($message);
            return false;
        }
    }

    public function regularExpressions(){
        $email = $_REQUEST['email_login'];
        $password = $_REQUEST['password_login'];

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $validationMessage .= '<div class="alert alert-danger">
                    Email: format is invalid.
                </div>';
        }

        if(!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{6,20}$/", $password)) {
            $validationMessage .= '<div class="alert alert-danger">
                     Password: Incorrect format
                </div>';
        }

        if ($validationMessage != '') {
            AuthController::loginMessage($validationMessage);
            return false;
        }
        return true;
    }

    public function loginMessage($message){
        $data = array('message' => $message);

        $config = array();

        $renderer = new PhpRenderer( $_SERVER['DOCUMENT_ROOT'] . '/resources/views', $config);

        echo $renderer->render('login', $data);
    }

    public function verifySession(){
        session_start();
        if (!isset($_SESSION['user'])) {
            return false;
        }

        $user = User::where('email', '=', $_SESSION['user']->email)->first();

        if ($user->is_active) {
            return true;
        }
        return false;
    }

    public function redirectIsNotActive(){
        $isActive = AuthController::verifySession();
        if (!$isActive) {
            header('Location: /login'); 
        }
    }

    public function redirectIsActive(){
        $isActive = AuthController::verifySession();
        if ($isActive) {
            header('Location: /directory'); 
        }
    }

    public function logout(){
        session_start();

        $user = User::where('email', '=', $_SESSION['user']->email)->first();
        $user->is_Active = false;
        $user->save();

        session_destroy();

        header('Location: /login');        
    }
}