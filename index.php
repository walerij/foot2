<h2>Футбол</h2>
<?php 
    require_once "dbase.php";
?>

<head>
    <meta charset="utf-8">
</head>
<form name="foot" action="index.php" method="post">
    <div>Поле ввода команды</div>
    <div>
        <textarea name="footsql" id="footsql" cols="30" rows="10">
            
        </textarea>
    </div>
    <div>
        <button type="submit" name="footsqlsubmit">
            Отправить
        </button>
    </div>
</form>
<?php 
 if(isset($_POST["footsqlsubmit"]))
  {
      $footrequest=htmlspecialchars($_POST["footsql"]);
      $tmp_view="";
     
      try{
          $database = new db();
          $foot_res = $database->foot_query($footrequest);
          $tmp_view .= $database->get_table($foot_res);
          
      }
     
      catch(Exception $e)
      {
          $tmp_view.=$e->getMessage() ;
      }
      finally
      {
        echo "<pre>".$footrequest."<br>".$tmp_view ."</pre>";     
      }
      
      
  }

?>