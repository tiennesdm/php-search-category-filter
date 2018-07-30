<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>
  <form method="post" action="">
<table width="200" border="1">
<tr>
<td>Name</td>
<td><input type="text" name="name" value="" placeholder="search by name"/></td>
<td>Location</td>
<td><input type="text" name="location" value="" placeholder="search by location"/></td>
<td>Lastname</td>
<td><select name="lastname">
  <option value="mehta">mehta</option>
  <option value="diamond">diamond</option>
</select></td>
<td><input type="submit" name="submit" value=" Find " /></td>
</tr>
</table>
</form>
<?php
$con=mysqli_connect('localhost','root','') or die(mysql_error());
 $db =  mysqli_select_db($con,'joblister') or die(mysql_error());
if(isset($_REQUEST['submit'])){

$name=$_POST['name'];
$location=$_POST['location'];
$lastname=$_POST['lastname'];
$sql=" SELECT * FROM  `job` WHERE name LIKE '%".$name."%' AND location='$location' AND lastname='$lastname'";
$query=mysqli_query($con,$sql);
}
else{
$sql = 'SELECT * FROM `job` ORDER BY id,name,location,lastname ASC';
$query = mysqli_query($con, $sql);

}


?>
<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Lastname</th>
    <th>Location</th>
  </tr>
<?php  while ($row = mysqli_fetch_array($query)) {?>

  <tr>
    <?php



        echo '<tr>
        <td>'.$row['id'].'</td>
        <td>'.$row['name'].'</td>
        <td>'.$row['lastname'].'</td>
        <td>'.$row['location'].'</td>

        </tr>';

    }

    $con->close();
    ?>
  </tr>
</table>
</body>
</html>
