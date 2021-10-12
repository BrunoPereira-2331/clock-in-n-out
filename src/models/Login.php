<?php 
loadModel("User");

class Login extends Model {

    public function checkLogin() {
        $user = User::getOne(["email", "password"], [["=", ["email" => "admin@cod3r.com.br"]]]);
        if ($user) {
            if (password_verify($this->password, $user->password)) {
                return $user;
            }
        }
        throw new Exception();
    }
}

?>