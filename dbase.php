<?php
class db 
{
    
        var $sql;
        
    
        public function __construct() 
        {
            $this->sql=mysqli_connect("localhost","formulist","qwas","footbase");
      
        }
    
        
        function foot_query($sql_text="SELECT NOW()")
        { 
            $res=mysqli_query($this->sql, $sql_text);
            $row=mysqli_fetch_array($res);
            return $row;

        }

    
    
}

$d=new db();
var_dump($d->foot_query("SELECT * FROM player LIMIT 5"));