<!DOCTYPE html>
<html>
<head>
    <title>

    </title>
</head>
<body>
    <h1>welcome to comparing website !</h1>
<p> search for your best what you want !   </p>
<br> 
<form action="#" method="post" >
    <label> same min </label><br>
<input type="number" name="samemin" ><br>
<label> other min </label><br>
<input type="number" name="othermin" ><br>
<label> sms </label><br>
<input type="number" name="sms"><br>
<label> internet </label><br>
<input type="number" name="internet" > <br>
<label> price </label><br>
<input type="number" name="price" > <br>
<input type="submit" name="compare">
</form>
<?php  
if(isset($_POST['compare'])){
    $samemin=$othermin=$internet=$sms="";
    
    
$samemin=$_POST['samemin'];
$othermin=$_POST['othermin'];
$sms=$_POST['sms'];
$internet=$_POST['internet'];
$price=$_POST['price'];
if(empty($samemin) || empty($othermin) || empty($sms) || empty($internet) || empty($price) ) {

echo "all input are required ! ";


}
else{

$host="localhost";
$user="root";
$pass="";
$db="records";
$con= new mysqli ($host,$user,$pass,$db);
if($con->connect_error){
echo "error!";


}
else{
$sql="SELECT * from offers WHERE price = '$price'";
$res=$con->query($sql);
if($res->num_rows<0){

    echo "not founded !";


}
else{

while($row=$res->fetch_assoc()){
    echo  "<table border='1'>
    <th> name </th>
    <th> same min </th>
    <th> other min  </th>
    <th> sms </th>
    <th> internet </th>
    <th> price </th>  ";

echo "<tr>". "<td>" .$row['namee']. "</td>"."<td>" .$row['samemin']. "</td>".
"<td>" .$row['othermin']. "</td>". "<td>" .$row['sms']. "</td>". "<td>" .$row['internet']. "</td>". "<td>" .$row['price']. "</td>" . "</tr>";
echo"</table>";


}

}




}


}


}


?>

</body>


</html>
