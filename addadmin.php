<html>   
<head>    
<style>  
body{  
background-color:black;
color:white;
text-align:center;


}

</style>

</head>
<body>
    <h1> add admin  </h1>


    <form action="#" method="post" >
   <label> admin name </label> <br> <br>
    <input type="text" name="admin"> <br> <br>
    <label> admin password </label> <br> <br>
    <input type="password" name="adminpass" > <br> <br>
    <input type="submit" value="add" name="done">


    </form>
<?php   
if(isset($_POST['done'])){
$admin=$_POST['admin'];
$adminpass=$_POST['adminpass'];
if(empty($admin) || empty($adminpass)){
echo "please fill the values !";


}
else {

$server="localhost";
$user="root";
$pass="";
$db="projectadmin";
$con=new mysqli($server,$user,$pass,$db);
if($con->connect_error){

echo "failed!";

}
else{
   
$sql="INSERT INTO admins (username,passwordd) VALUES ('$admin','$adminpass')";
if($con->query($sql)===true){

echo "added admin";


}


}


}
}
?>



</body>

</html>