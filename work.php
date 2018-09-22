<?php
  
  $work = array(
            array(
                "id"=>1,
                "quest"=>"Вывести названия первых 5 стадионов",
                "sql_etalon_text"=>"SELECT name FROM stadium LIMIT 5"
            ),
            array(
                "id"=>2,
                "quest"=>"Вывести имя, фамилию и роль игрока под номером 17",
                "sql_etalon_text"=>"SELECT surname, name, role FROM player where number = 17"
            ),
       
            );