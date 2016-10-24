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
<h2>COURSE CATEGORIES</h2>
<ul>
  <li>MANAGEMENT</li>
  <li>COMPUTING</li>
  <li>ENGINEERING</li>

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
