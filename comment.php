<html>
<body>

<?php
$servername = "localhost";
$username = "jialiang_db1";
$password = "1qw1qw1qw";

$conn = new mysqli($servername, $username, $password);

$sql= "insert into comment values ('$_POST[Fname]','$_POST[Lname]','$_POST[Email]','$_POST[Comment]');
mysql_query($sql);
mysql_close($conn);

header("Location: http://test.jialianghuang.com/untitle.php"); 
?>


</body>
</html>