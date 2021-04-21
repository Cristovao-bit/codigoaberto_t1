<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use Exception;

/**
 * Class User
 * @package Source\Models
 */
class User extends DataLayer {
    
    /**
     * User constructor
     */
    public function __construct() {
        parent::__construct("users", ["first_name", "last_name", "email", "passwd"]);
    }
    
    public function save(): bool {
        if(!$this->validateEmail() || !$this->validatePassword() || !parent::save()):
            return false;
        endif;
        
        return true;
    }
    
    /**
     * @return bool
     */
    protected function validateEmail(): bool {
        if(empty($this->email) || !filter_var($this->email, FILTER_VALIDATE_EMAIL)):
            $this->fail = new Exception("Favor informe um e-mail válido para continuar");
            return false;
        endif;
        
        $userByEmail = null;
        if(!$this->id):
            $userByEmail = $this->find("email = :email", "email={$this->email}")->count();
        else:
            $userByEmail = $this->find("email = :email AND id != :id", "email={$this->email}&id={$this->id}")->count();
        endif; 
        
        if($userByEmail):
            $this->fail = new Exception("O e-mail informado já está em uso");
            return false;
        endif;
        
        return true;
    }
    
    /**
     * @return bool
     */
    protected function validatePassword(): bool {
        if(empty($this->passwd) || strlen($this->passwd) < 5):
            $this->fail = new Exception("Informe uma senha com pelo menos 5 caractere!");
            return false;
        endif;
        
        if(password_get_info($this->passwd)["algo"]):
            return true;
        endif;
        
        $this->passwd = password_hash($this->passwd, PASSWORD_DEFAULT);
        return true;
    }
}
