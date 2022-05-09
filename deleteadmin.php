<DOCTYPE html>
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
    
<h1>search for the admin and then delete it </h1> 
<hr>
<form action="#" method="post">

<label> admin name  </label><br>
<input type="text" name="admin"> <br>
<input type="submit" name="search"> <br>
</form>
<?php
$admin_id=$admin_name=$admin_pass="";
if(isset($_POST['search'])){ 
    $search=$_POST['admin'];
    if(empty($search)){

echo "please enter a name !";

    }
    else{
$server="localhost";
$user="root";
$pass="";
$db="projectadmin";
$con= new mysqli($server,$user,$pass,$db);
if($con->connect_error){

    echo "error!";
}
else{
$sql="SELECT * FROM admins WHERE username= '$search' ";
$res=$con->query($sql);
if($res->num_rows<0){
echo "there is no data !";
 

}
else{

while($row=$res->fetch_assoc()){

$GLOBALS['admin_id'] =$row['ID'];
$GLOBALS['admin_name'] =$row['username'];
$GLOBALS['admin_pass'] =$row['passwordd'];



}

}


}

}
}

?>
<form action="#" method="post" >
admin name <input type="text" name="admindel" value="<?php echo $GLOBALS['admin_name']; ?> "> <br>
admin password <input type="text" name="passdel" value=" <?php echo $GLOBALS['admin_pass'];?>"> <br>
admin id <input type="text" name="delid" value=" <?php echo $GLOBALS['admin_id'];?>"> <br>
<input type="submit" name="delete" value ="delete" > <br>
<?php
if(isset($_POST['delete'])){
    $host="localhost";
    $user="root";
    $pass="";
    $db="projectadmin";
    $con=new mysqli($host,$user,$pass,$db);
    if($con->connect_error){
    echo "error!";
    }
    else{
     
$delid=$_POST['delid'];
$sql2="DELETE  FROM admins WHERE ID='$delid' ";
if($con->query($sql2) === true){


    echo "admin has been deleted ! ";
}
else{

echo "there is a problem ! ";

}
    
}
}


?>




</form>

</body>






    </html>