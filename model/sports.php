<?php

class sports
{
  //pole v tabulce
  public $id;
  public $category;
  public $name;
  //zprávy
  public $id_msg;
  public $category_msg;
  public $name_msg;
  //constructor pro nastavení hodnot
  function __construct()
  {
    $id=0;$category=$name="";
    $id_msg=$category_msg=$name_msg="";
  }
}

?>
