<html>
 <head>
  <title>PHP Tes</title>
 </head>
 <body>
<?php echo "<p>Hello World</p>"; ?><?php
 echo strlen("Hello world!"); // outputs 12
 ?> 


<?php
$servername = "localhost";
$username = "jialiang_db1";
$password = "1qw1qw1qw";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
 ?> 

<table cellspacing=0 bordercolordark=#FFFFFF width="95%" bordercolorlight=#000000 border=1 align="center" cellpadding="2">
<tr bgcolor="#FCFCFC" style="color:000000">
    <td width="5%" align="center" valign="bottom" height="19">Fname</td>
    <td width="10%" align="center" valign="bottom">Lname</td>
    <td width="5%" align="center" valign="bottom">Email</td>
    <td width="5%" align="center" valign="bottom">Comment</td>


</tr>
<?
    //?????mysql???
    $myconn=mysql_connect("localhost","jialiang_db1","1qw1qw1qw");
    //??test????
    mysql_query("set names 'gbk'"); // //??????????????????????????
    mysql_select_db("jialiang_db1",$myconn);
    $strSql="select * from comment";
    //?mysql_query???user??????
    $result=mysql_query($strSql,$myconn);
    while($row=mysql_fetch_array($result))//??????????
    {
?>
<tr>
    <td align="center" height="19"><?echo $row["Fname"]?></td>
    <td align="center"><?echo $row["Lname"]?></td>
    <td align="center"><?echo $row["Email"]?></td>
    <td align="center"><?echo $row["Comment"]?></td>


</tr>
<?
    }
    //?????????
    mysql_close($myconn);
?>
</table>


 </body>
</html> 