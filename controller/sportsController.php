<?php

require 'model/sportsModel.php';
require 'model/sports.php';
require_once 'config.php';

session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

class sportsController
{
  function __construct()
  {
    $this->objconfig = new config();
    $this->objsm = new sportsModel($this->objconfig);
  }

  public function mvcHandler()
  {
    $act = isset($_GET['act']) ? $_GET['act'] : NULL;
    switch ($act)
    {
      case 'add' :
          $this->insert();
          break;
      case 'update' :
          $this->update();
          break;
      case 'delete' :
          $this->delete();
          break;
      default:
          $this->list();
    }
  }

  public function pageRedirect($url)
  {
    header('Location:'.$url);
  }
  
  public function checkValidation($sporttb)
  {
    $noerror=true;
    //validate category
    if(empty($sporttb->category))
    {
      $sporttb->category_msg = "Field is empty.";$noerror=false;
    }
     elseif(!filter_var($sporttb->category, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))));
      $sporttb->category_msg = "Invalid entry.";$noerror=false;
    
    else{$sporttb->category_msg = "";}
    
    //validate name
    if(empty($sporttb->name))
    {
      $sporttb->name_msg = "Field is empty.";$noerror=false;
    }
     elseif(!filter_var($sporttb->name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))));
      $sporttb->name_msg = "Invalid entry.";$noerror=false;
    
    else{$sporttb->name_msg = "";}
    return $noerror;
  }

  //add new record
  public function insert()
  {
    try{
      $sporttb=new sports();
      if(isset($_POST['addbtn']))
      {
        //read from value
        $sporttb->category = trim($_POST['category']);
        $sporttb->name = trim($_POST['name']);
        //call validation
        $chk=$this->checkValidation($sporttb);
        if($chk)
        {
          //call insert record
          $pid = $this -> objsm ->insertRecord($sporttb);
          if($pid>0){
            $thiis->list();
            }else{
              echo "Somthing is wrong..., try again";
            }
        }else
        {
          $_SESSION['sporttbl0']=serialize($sporttb);//add session obj
          $this->pageRedirect("view/insert.php");

          }
        }
      }catch (Exception $e)
      {
        $this->close_db();
        throw $e;
      }
    }
  
  public function update()

  public function list(){
    $result=$this->objsm->selectRecord(0);
    include "view/list.php";
  }
}
