<?php

namespace App\Controller;

class ZipCodesCheckerController
{
    public $booleans=array();
    //
    function checkIfAnyZipCode(string $postCode):bool
    {
      $methods=get_class_methods(__CLASS__);
        if (($key = array_search(__FUNCTION__, $methods)) !== false) {
            unset($methods[$key]);
        }

       foreach($methods as $key=>$value)
       {
          $this->booleans[]=$this->$value($postCode);
       }
       $return='';
       if (in_array(true,$this->booleans))
       {
          return true;
       }
       else
       {
          return false;
       }
    }
    function checkIfPolishZipCode(string $postCode):bool
    {

        preg_match('/[\d][\d][-][\d][\d][\d]/', $postCode, $output_array);
       if (empty($output_array)) {
       return false;
       }
           if (($postCode) != '' && $output_array[0] != $postCode) {
               return false;
           }

       return true;
   }
}