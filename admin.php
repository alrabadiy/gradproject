<?php 
function test($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;}
$username=$passwordd="";
if($_SERVER['REQUEST_METHOD']=='POST'){
$username=test($_POST['username']);
$passwordd=test($_POST['passwordd']);



} 
if(empty($passwordd) ||empty($username)) {

header('LOCATION:adminlogin.html');

}

else{

$host="localhost";
$user="root";
$pass="";
$db="projectadmin";
$con=new mysqli($host,$user,$pass,$db);
if($con->connect_error){
echo "error connect!"."<br>";}
$sql="SELECT * FROM admins WHERE username='$username' and passwordd='$passwordd'";
$res=$con->query($sql);

if($res->num_rows>0){
}
else{

header('LOCATION:adminlogin.html?er="invalid');

}






}


?>
<html>
    <head> <title> welcome admin  </title>
         <style>
         body{
background-color:black;
color:white;
text-align:center;

         }
         h2{
   border: 10px white solid;
    margin-left:250px;
    margin-right:250px;


}
      a{
     
background-color:white;
color:black;
font-size:30px;
text-decoration:none;

      }
      a:hover{

        background-color:white;
color:black;
font-size:33px;
text-decoration:none;


      }
         
         </style>
          </head>
<body>
    
<h1> welcome admin <?php echo  $username ;?> </h1>
<h2> admin tools for products  </h2> <br>
    <br>

    <button> <a href="search.php" target="_blank"> search </a> </button> <p> search for a product to get a   </p> <br> <br>

  <button> <a href="add.php" target="_blank"> add  </a> </button> <p>use the "add new " to add a new record </p> <br> <br>
   <button> <a href="delete.php" target="_blank">delete</a> </button> <p>use "delete " to delete a record but take care because when you delete a record it's 
    will disappeare for ever and there is a noway to get it back so be sure which record you want to delete  </p> <br> <br>
  <button> <a href="edit.php" target="_blank"> edit </a> </button> <p> use "edit" when you want to change the values or the name of a record  </p> <br> <br>

  <br>
  <h2> super admin tools  </h2>
  <br>

  <button> <a href="addadmin.php" target="_blank"> add admin  </a>  </button> <p>use "add admin" to add admins</p>
<button>  <a href="deleteadmin.php"target="_blank" > delete admin  </a>    </button> <p>use  "delete admin" to delete an admin use this link</p>
<button> <a href="updateadmin.php" target="_blank">  update admin </a>   </button> <p> use "update admin " to  update admin information </p>







</body>



</html>