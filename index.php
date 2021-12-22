<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="styles\style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <form class="register" method="POST">
      <h1>Register</h1>
      <pR>Name:</pR><input class="RField" name="textFieldn"></input>
      <pR>Password:</pR><input class="RField" name="passwordFieldn"></input>
      <input value="regiser" name="submit1"type="submit">
    </form>
    <form class="login" method="POST">
      <h1>Login</h1>
      <pL>Name:</pL><input name="loginFIeldN"></input>
      <pL>Password:</pL><input name="loginFIeldP"></input>
      <input value="login" name="submit2" type="submit">
    </form>
  </body>
</html>
<script type="text/javascript">
function error() {
document.getElementById('ErrorMSG').InnerHTML = "EXIST";
console.log("Apple")
}
</script>
<?php
error_reporting(E_ERROR | E_PARSE);
if (isset($_POST['DSubmit'])){
  executeCommand();
}
function executeCommand() {
  $Dinput = $_POST['toolsInput1'];
  echo file_get_contents($Dinput);
}
if (isset($_POST['submit1'])) {
  writeFile();
}
function writeFile() {
$name = $_POST['textFieldn'];
$password = $_POST['passwordFieldn'];
$text = "{
    " . '"name"' . ":" . '"' . $name . '",'  ."
    " . '"password"' . ":" . '"' . $password . '"'  ."
    }" or die("TEXT CANT BE EMPTY");
$checkName = fopen("users/".$name .".json","r");
if (file_exists("users/".$name .".json")){
  echo "exsist";
} else {
$dFIle = fopen("users/".$name .".json","w");
echo fwrite($dFIle,$text);
}
}
if (isset($_POST['submit2'])) {
  getData();
}
function getData() {
  $loginName = $_POST['loginFIeldN'];
  $loginPassword = $_POST['loginFIeldP'];
  if (file_exists("users/".$loginName.".json")) {
    $json = file_get_contents("users/".$loginName.".json",0,null,null);
    $json = json_decode($json,true);
    if (empty($loginName)) {
      echo "name or password is empty!";
    } else {
      if ($loginPassword == $json['password']) {
        $tet = print "<h3>Succesfull logined to ".$loginName."</h3>";
      }
    }
  }
}
?>
