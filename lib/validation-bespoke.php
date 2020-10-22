<?php
require_once 'lib/validation-generic.php';

function validate_name($name) {
  global $errors;
  if (!is_present($name)) {
    $errors['name'] = "Name required";
  }
  else if (!has_length($name, ["min" => 1, "max" => 32])) {
    $errors['name'] = "Name is too short or long";
  }
  else if (!has_no_html_tags($name)) {
    $errors['name'] = "Name cannot contain any HTML tags";
  }
}
function validate_email($email) {
  global $errors;
  if (!is_present($email)) {
    $errors['email'] = "Email required";
  }
  else if (!is_safe_email($email)) {
    $errors['email'] = "Email contains unsafe characters";
  }
  else if (!is_valid_email($email)) {
    $errors['email'] = "Email format is not valid";
  }
  else if (!has_length($email, ["min" => 7, "max" => 64])) {
    $errors['email'] = "Email is too short or long";
  }
}
function validate_password($password) {
  global $errors;
  if (!is_present($password)) {
    $errors['password'] = "Password required";
  }
  else if (!has_length($password, ["min" => 8, "max" => 64])) {
    $errors['password'] = "Password is too short or long";
  }
}
?>
