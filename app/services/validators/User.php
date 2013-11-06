<?php namespace Services\Validators;
 
class User extends Validator {
 
  /**
   * Validation rules
   */
  public static $rules = array(
    'username' => 'required',
    'password' => 'required'
  );
 
}