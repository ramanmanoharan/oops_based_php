<?php 

session_start();
// redirect function //

function redirect($page){
    
    echo "<script>window.open('$page.php','_self')</script>";

}
// redirect function end//

// alert message function //

function alert($msg){
    echo "<script>alert('$msg')</script>";
}
// alert message function end//



include('dbconfig.php');

class Ogbs extends Dbconfig{
    
   public function __construct(){

   parent::__construct();
   
}

public function getData($query){
    $result = $this->connect->query($query);
    
    if($result == false){
        return false;
    }
    $array = array();
    while($row = $result->fetch_assoc()){
        $array[] = $row;
    }
    
    return $array;
}
    public function insertData($data){
    $result = $this->connect->query($data);
        if($result == false){
           return false;
          echo "error : cannot execuete the command";

        }
        else{
            return true;
        }
    }
    
    public function updateData($data){
        $result = $this->connect->query($data);
        if($result == false){
           return false;
          echo "error : cannot execuete the command";

        }
        else{
            return true;
        }
    }
    
    public function deleteData($table, $cond){
        $query = "DELETE FROM $table WHERE $cond";
        
        $result = $this->connect->query($query);
        
        if($result == false){
            echo "error : cannot execuete the command";
            return false;
            
        }
        else{
          return true;
        }
    }
    
    public function checkData($query){
        $result= $this->connect->query($query);
        $count = $result->num_rows;
        
        if($count > 0){
            return true;
        }else{
            return false;
        }
    }
    
    public function escape_string($data){
        return $this->connect->escape_string($data);
    }
    
    
   /* public function updateData($table,$fields,$cond){

        $col = implode(array_keys($fields));
        $row = implode(array_values($fields));
        
        $query = "UPDATE $table SET $col='$row' $cond";
        $result = $this->connect->query($query);
        
        if($result):
   return true;
        else:
return false;
        endif;
    } */
}


?>
