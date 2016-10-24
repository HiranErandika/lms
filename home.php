<!Doctype html>
<html>
<head>
  <?php
session_start();
$counter_name = "counter.txt";
if (!file_exists($counter_name)) {
  $f = fopen($counter_name, "w");
  fwrite($f,"0");
  fclose($f);
}
$f = fopen($counter_name,"r");
$counterVal = fread($f, filesize($counter_name));
fclose($f);
if(!isset($_SESSION['hasVisited'])){
  $_SESSION['hasVisited']="yes";
  $counterVal++;
  $f = fopen($counter_name, "w");
  fwrite($f, $counterVal);
  fclose($f);
}
   include("config.php");
   session_start();
$error = "";
   if($_SERVER["REQUEST_METHOD"] == "POST") {

	
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);

      $sql = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      if (!$result) {
    printf("Error: %s\n", mysqli_error($db));
    exit();
}
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;

         header("location: signin.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>


<link href="css/style.css" rel="stylesheet">
<title>NSBM | Learning Management System</title>
<style>
table{
  border-collapse: collapse;
  border:1px solid blue;

}
</style>
</head>
<body bgcolor="gray">
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="1200" >
    <tr><td><img src="logo.gif"></td><th height="50" bgcolor="#3498db" colspan="2"><h1>NSBM | Learning Management System</h1> </th> </tr>

<tr>
<th width="200" height="460" bgcolor="#3498db">

<table style="width:100%" box border="1px">
  <tr>
    <td height="50px"><a href="home.php">HOME</a><br></td>
  </tr>

  <tr>
    <td height="50px"><a href="course.php">COURSES</a></td>
  </tr><br>
  <tr>
    <td height="50px"><a href="about_usss.html">ABOUT US</a></td>
  </tr><br>
  <tr>
    <td height="50px"><a href="contact.html">CONTACT</a></td>
  </tr>
  <tr>
    <td height="150px" ><a><?php echo " VISITORS COUNT <br>" .$counterVal; ?></a></td>
  </tr>
</table>
 </th>

<th width="1000"bgcolor="#7f8c8d">
                                         <form action = "" method = "post"><table align="center" width="450" height="200" border="0" cellspacing="1" cellpadding="1"                                                                                                     bgcolor="lightgray">
                                            <tr height="50">
                                            <th colspan="2">Login </th>
                                            </tr>

                                            <tr>
                                             <td>User ID :<td><input type = "text" name = "username" class = "box"/></td>
                                             </tr>
                                             <tr>
                                               <td>Password :<td><input type = "password" name = "password" class = "box" /></td>


                                             </tr>
											 <tr><td colspan="2"><div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div></td></tr>
                                             <td><img src="" width="200"><button >Sign Up</td>
                                                <td><img src="" width="200"><button>Login</td>
                                             </tr>
											 

                                           </table>
										   
										   </form>
</th>
</tr>
<tr>
<th height="50" bgcolor="#3498db" colspan="2">
<div id="light">  <br>
  &copy; National School of Business Management No 309, High Level Road, Colombo 05, Sri Lanka.
    <br>Telephone: +94(11) 567 2545|5673535 Email:info@nsbm.lk
<br><br>
    <a href="http://validator.w3.org">
      <img src="img/1img.png"></a>
      <a href="http://css-validator.org">
        <img src="img/2img.png"></a></tr>
    </div>
</th>
</table>

</body>
</html>
