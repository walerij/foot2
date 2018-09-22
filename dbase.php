<?php
class db 
{
    
        var $sql;
        
    
        public function __construct() 
        {
            $this->sql=mysqli_connect("localhost","formulist","qwas","footbase");
      
        }
    
        //получение ответа на SELECT-запрос
        public function foot_query($sql_text="SELECT NOW()")
        { 
            $res=mysqli_query($this->sql, $sql_text);
            //$row=mysqli_fetch_assoc($res);
            //    var_dump($row);
            return $res;

        }
    
        //формирование таблицы вывода
        public function get_table($res)
        {
            
            
            $tmp_table="<table cellpadding='5' cellspacing='0' border='1'>";
            //заголовки таблицы
            $tmp_table.= "<tr>";
            $i = $res->fetch_fields();
                foreach ($i as $val)
                    $tmp_table.= '<th>'.$val->name.'</th>';
                  
            $tmp_table.= "</tr>";
            //данные таблицы
            while ($result = mysqli_fetch_array($res, MYSQLI_NUM))
            { 
                    $tmp_table.= "<tr>";
                  
                    foreach ($result as  $value ) 
                       $tmp_table.= "<td>".$value."</td>";
                    
                   
                    $tmp_table.= "</tr>";                
            }
                
            $tmp_table.= "</table>";
            
            return $tmp_table;
        }

    
}

//$database = new db();
//$foot_res = $database->foot_query("SELECT * FROM game");
//echo $database->get_table($foot_res);