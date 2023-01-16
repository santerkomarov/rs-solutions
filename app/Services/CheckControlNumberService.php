<?php
namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CheckControlNumberService {
   public function checkNumbers( $generated_number, $user_number)
   {
      /**
      * Проверка на соответствие сгенерированного числа с вводимым юзером числом
      *
      * @param number $generated_number - сгенерированноое число, rand(100,1000)
      * @param number $user_number - то что юзер вводит
      * @return Boolean
      */
    
      if ($generated_number === $user_number) {
        return true;
      }
      return false;
   }
}