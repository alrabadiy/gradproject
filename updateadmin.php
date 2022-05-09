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
    <H1> update the admins information  </H1>
    <hr>
    <form action="#" method="post">
        <label>admin name </label>
<input type="text" name="admin">
<input type="submit" value="search" name="search" >

    </form>
<?php
$admin_name=$admin_pass=$admin_id="";

$host="localhost";
$user="root";
$pass="";
$db="projectadmin";
$con=new mysqli($host,$user,$pass,$db);
if($con->connect_error){
echo "failed to connect!";


}
if(isset($_POST['search'])){

$search=$_POST['admin'];
if(empty($search)){
echo "please input the name";


}
else{
$sql="SELECT * FROM admins WHERE username='$search'";
$res=$con->query($sql);
if($res->num_rows<0){

echo "there is no admin !";

}
else{

while($row=$res->fetch_assoc()){

$GLOBALS['admin_id']=$row['ID'];
$GLOBALS['admin_name']=$row['username'];
$GLOBALS['admin_pass']=$row['passwordd'];




}

}



}


}
?>    
<hr>
<h1>admin information </h1>
<form action="#" method="post" >
<label> admin name  </label> <br>
<input type="text" name="edit1" value="<?php echo $admin_name ;?>  " > <br>
<label> admin password  </label> <br>
<input type="text" name="edit2" value="<?php echo $admin_pass ;?>  " ><br>
<label> admin ID  </label> <br>
<input type="text" name="edit3" value="<?php echo $admin_id ;?>  " ><br>
<input type="submit" name="edit" value="edit">
<?php 
if(isset($_POST['edit'])){
$edit1=$_POST['edit1'];
$edit2=$_POST['edit2'];
$edit3=$_POST['edit3'];
if(isset($_POST['edit'])){

$sql2="UPDATE admins set username='$edit1',passwordd='$edit2'  ";
if($con->query($sql2)===true){

echo " updated ! ";

}
else{
echo "failed !";

}

}



}

?>

</form>
</body>

</html>