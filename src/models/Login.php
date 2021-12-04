<?php 

class Login extends Model {

    public function validate() {
        $errors = [];

        if (!$this->email) {
            $errors["email"] = "E-mail is required";
        }

        if (!$this->password) {
            $errors["password"] = "Password is required";
        }

        if (count($errors) > 0) {
            throw new ValidationException($errors);
        }
    }

    public function checkLogin() {
        $this->validate();
        $user = User::getOne(["name", "email", "password", "end_date"], [["=", ["email" => $this->email]]]);
        if ($user) {
            if (strlen($user->end_date) > 0) {
                throw new AppException("User is not active");
            }

            if (password_verify($this->password, $user->password)) {
                return $user;
            }
        }
        throw new AppException("Invalid User/Password");
    }
}

?>