<h2>Футбол</h2>
<?php 
  if(isset($_POST["footsqlsubmit"]))
  {
      $footrequest=htmlspecialchars($_POST["footsql"]);
      echo "<pre>".$footrequest."</pre>";
  }

?>


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