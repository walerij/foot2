<h2>Футбол</h2>
<?php 
    require_once "dbase.php";
?>

<head>
    <meta charset="utf-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
    .head_tab{
        background: ##4182e8;
        color: white;
        font: 
    }
</style>
<form name="foot" action="index.php" method="post">
    <div>Поле ввода команды</div>
    <div>
        <textarea name="footsql" id="footsql" cols="30" rows="10">
          <? echo htmlspecialchars($_POST["footsql"]);?>
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
          $tmp_view.="Некорректный запрос: ".$e->getMessage() ;
      }
      finally
      {
        echo "<pre>".$footrequest."</pre><br>".$tmp_view ."";     
      }
      
      
  }

?>