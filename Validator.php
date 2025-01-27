<?php

class Validator {
    protected $errors = [];

    public function validate($data, $rules) {
        foreach ($rules as $field => $rule) {
            $rulesArray = explode('|', $rule);

            foreach ($rulesArray as $rule) {
                if (strpos($rule, ':') !== false) {
                    list($ruleName, $ruleValue) = explode(':', $rule);
                } else {
                    $ruleName = $rule;
                    $ruleValue = '';
                }

                $methodName = 'validate' . ucfirst($ruleName);
                $value = isset($data[$field]) ? $data[$field] : '';

                if (method_exists($this, $methodName)) {
                    $this->$methodName($field, $value, $ruleValue);
                } else {
                    die("Validation rule {$ruleName} does not exist.");
                }
            }
        }
    }

    public function errors() {
        return $this->errors;
    }

    protected function addError($field, $message) {
        $this->errors[$field][] = $message;
    }

    protected function validateRequired($field, $value) {
        if (empty($value)) {
            $this->addError($field, "The {$field} field is required.");
        }
    }

    protected function validateEmail($field, $value) {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $this->addError($field, "The {$field} must be a valid email address.");
        }
    }

    protected function validateMin($field, $value, $ruleValue) {
        if (strlen($value) < $ruleValue) {
            $this->addError($field, "The {$field} must be at least {$ruleValue} characters.");
        }
    }

    protected function validateMax($field, $value, $ruleValue) {
        if (strlen($value) > $ruleValue) {
            $this->addError($field, "The {$field} may not be greater than {$ruleValue} characters.");
        }
    }

    protected function validateConfirmed($field, $value, $ruleValue) {
        if ($value !== $ruleValue) {
            $this->addError($field, "The {$field} confirmation does not match.");
        }
    }
}

// // Example usage:
// $validator = new Validator();

// $data = [
//     'email' => 'example@example.com',
//     'password' => 'password',
//     'password_confirmation' => 'password',
// ];

// $rules = [
//     'email' => 'required|email',
//     'password' => 'required|min:6|max:20',
//     'password_confirmation' => 'required|confirmed:password',
// ];

// $validator->validate($data, $rules);

// if ($validator->errors()) {
//     print_r($validator->errors());
// } else {
//     echo "Validation passed!";
// }

?>
