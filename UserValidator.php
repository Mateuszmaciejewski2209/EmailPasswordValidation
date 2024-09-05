<?php

/**
 * Class UserValidator
 * is used to validate users email and password using regular expressions
 */
class UserValidator {
    /**
     * Validate email
     * /^[a-zA-Z0-9._%+-] - checks for a string that stands before the @ symbol
     * +@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/ - checks for a string and domain that stands after the @ symbol
     * 
     * preg_match() - performs a regular expression match
     * 
     * also a good idea is to use filter_var() function to validate email instead of regular expressions
     * @param string $email
     * @return bool
     */
    public function validateEmail(string $email): bool {
        $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

        return preg_match($pattern, $email) ? true : false;
    }

    /**
     * Validate password
     * ?=.*[a-z] - checks for at least one lowercase letter
     * ?=.*[A-Z] - checks for at least one uppercase letter
     * ?=.*\d - checks for at least one digit
     * ?=.*[@$!%*?&] - checks for at least one special character
     * [A-Za-z\d@$!%*?&]{8,} - checks for at least 8 characters from the mentioned character set
     * 
     * preg_match() - performs a regular expression match
     * @param string $password
     * @return bool
     */
    public function validatePassword(string $password): bool {
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

        return preg_match($pattern, $password) ? true : false;
    }
}

$validator = new UserValidator();
$email = "test@example.com";
$password = "StrongPass1!";

if ($validator->validateEmail($email)) {
    echo "Email is valid.\n";
} else {
    echo "Email is invalid.\n";
}

if ($validator->validatePassword($password)) {
    echo "Password is valid.\n";
} else {
    echo "Password is invalid.\n";
}