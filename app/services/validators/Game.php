<?php namespace Services\Validators;
 
class Game extends Validator {
 
  /**
   * Validation rules
   */
  public static $rules = array(
    'title' => 'required',
    'publisher' => 'required'
  );
 
}