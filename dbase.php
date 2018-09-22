<?php

class db 
{
    
      
    
        var $sql;
        var $sql_etalon;
        var $array_work; // массив для работы 
        
    
        //конструктор - эталон
        public function __construct() 
        {
            //подключение к БД
            include "config.php";
            $this->sql=mysqli_connect($host, $username, $password, $database);
            $this->sql_etalon=mysqli_connect("localhost","formulist","qwas", "footbase_etalon");
            
            //получение заданий
            include "work.php";
            $this->array_work = $work;
      
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
          $tmp_table="";    
           try{ 
            
                $tmp_table="<table class='table table-hover'";
                //заголовки таблицы
                $tmp_table.= "<tr>";
                $i = $res->fetch_fields();
                    foreach ($i as $val)
                        $tmp_table.= '<th class="bg-primary">'.$val->name.'</th>';

                $tmp_table.= "</tr>";
                //данные таблицы
                while ($result = mysqli_fetch_array($res, MYSQLI_NUM))
                { 
                        $tmp_table.= "<tr class='success'>";

                        foreach ($result as  $value ) 
                           $tmp_table.= "<td>".$value."</td>";


                        $tmp_table.= "</tr>";                
                }

                $tmp_table.= "</table>";
            }
            catch(Exception $e)
            {
                $tmp_table="Ошибка вывода в таблицу";
            }
            return $tmp_table;
        }
    
      //сверка результата с эталоном
       public function check($quest_id=1, $sql_text="SELECT NOW()"){
           
           //получаем элемент массива заданий (по идентификатору задания)
           $quest_ =$this->array_work[$quest_id];
          // echo ($quest_["quest"]);
           
           //сверка (пока не идет)
           $res=mysqli_query($this->sql, $sql_text);
           $res_check=mysqli_query($this->sql_etalon, $quest_["sql_etalon_text"]);
           if ($res==$res_check)
               return "верно ".var_dump($res)." == ".var_dump($res_check);
           else        
               return "не верно... ".$res." != ".$res_check;
           
       }

    
}

