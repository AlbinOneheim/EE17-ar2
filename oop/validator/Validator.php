<?php

/**
 * Validera input från formulär
 * 
 * PHP version 7
 * @category   OOP
 * @author     Karim Ryde <karye.webb@gmail.com>
 * @license    PHP CC
 */
class Validator
{
    /* Lagra POST-data */
    private $data;

    /* Array för att lagra felen som hittas */
    private $errors = [];

    /* Lista på obligatoriska fält vi kan kontrollera */
    private $fields = ['username', 'email', 'password'];

    /* Läs in POST-data */
    public function set($postData)
    {
        $this->data = $postData;
    }

    /* Kontrollera data enligt våra regler */
    public function validateForm()
    {
        /* Loopa igenom arrayen av obligatoriska fälten */
        foreach ($this->fields as $field) {
            /* Kontrollerar om obligatoriska fälten finns med i POST-data */
            if (!array_key_exists($field, $this->data)) {
                trigger_error("$field is not present in data");
                return;
            }
        }

        $this->validateUsername();
        $this->validatePassword();
        $this->validateEmail();
    }

    /* Visa felen beroende på input */
    public function showErrors($key)
    {
        if (array_key_exists($key, $this->errors)) {
            foreach ($this->errors[$key] as $error) {
                echo "$error\n";
            }
        }
    }

    /* Kontrollera användarnamn */
    private function validateUsername()
    {
        /* Först rensa bort onödiga tomma tecken */
        $username = trim($this->data['username']);

        /* Rensa bort farliga tecken ev javascript */
        $username = filter_var($username, FILTER_SANITIZE_STRING);

        /* Kolla om tomt och uppfyller villkoren */
        if (empty($username)) {
            $this->addError("username", "Username cannot be empty");
        } else {
            /* Kolla att bara bokstäver/siffror min 6 max 12 tecken */
            if (!preg_match('/^[a-zA-Z0-9]{6,12}$/', $username)) {
                $this->addError("username", "Username must contain 6-12 chars or numbers");
            }
        }
    }
    /* Kontrollera lösenord */
    private function validatePassword()
    {
        /* Först rensa bort onödiga tomma tecken */
        $password = trim($this->data['password']);

        /* Rensa bort farliga tecken ev javascript */
        $password = filter_var($password, FILTER_SANITIZE_STRING);

        /* Kolla om tomt och uppfyller villkoren */
        if (empty($password)) {
            $this->addError("pasword", "Password cannot be empty");
        } else {
            if (!preg_match("/[A-ZÅÄÖ]/", $password) > 0) {
               $this->addError("password", "Password must contain atleast one uppercase character");
            }
            /* Skall innehålla minst en liten bokstav */
            if (!preg_match("/[a-zåäö]/", $password) > 0) {
                $this->addError("password", "Password Password must contain atleast one lower case character");
            }
            /* Skall innehålla minst en siffra */
            if (!preg_match("/[0-9]/", $password) > 0) {
                $this->addError("password", "Password Password must contain atleast one number");
            }
            /* Skall innehålla minst ett specialtecken: #%&¤_*-+@!?()[]$£€ */
            if (!preg_match("/[#%&¤_\*\-\+\@\!\?\(\)\[\]\$£€]/", $password) > 0){
               $this->addError("password", "Password Password must contain atleast one special character");
            }
            /* Skall vara minst 8 tecken */
            if (!preg_match("/^.{8,40}$/", $password) > 0) {
                $this->addError("password", "Password Password must be between 8 and 40 characters long");
            }
        }
    }
    /* Kontrollera epost */
    private function validateEmail()
    {
        /* Först rensa bort onödiga tomma tecken */
        $email = trim($this->data['email']);

        /* Rensa bort farliga tecken ev javascript */
        $email = filter_var($email, FILTER_SANITIZE_STRING);

        /* Kolla om tomt och uppfyller villkoren */
        if (empty($email)) {
            $this->addError("email", "Email cannot be empty");
        } else {
            /* Kolla att bara bokstäver/siffror min 6 max 12 tecken */
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->addError("email", "Email must be valid email");
            }
        }
    }

    /* Lagra felen i arrayen */
    private function addError($key, $message)
    {
        $this->errors[$key][] = $message;
    }
}
