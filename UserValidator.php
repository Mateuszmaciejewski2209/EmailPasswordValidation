<?php

class UserValidator {
    public function validateEmail(string $email): bool {
        $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

        if (!preg_match($pattern, $email)) {
            return false;
        } else {
            return true;
        }
    }

    
    public function validatePassword(string $password): bool {
        return true;
    }
}