<?php $namee=$samemin=$othermin=$sms=$net=$price="";

$connect="connect";
$host="localhost";
$user="root";
$pass="";
$db="records";
$con=new mysqli($host,$user,$pass,$db);
if($con->error){

echo "error!";

}

?>
<html>
<head>  <title> edit page  </title>
<style>  
body{background-color:black;
 color:white; text-align:center; }
 </style>
</head>
<body>
 <br> <br> <br> <br> <br>
 <h1> welcome to edit page </h1>
 <hr>
 <p> search the record and then edit it  </p> <br>
 <form action="#" method="post"  >
<label for="namee"> record name  </label> <br>
<input type="text" name="namee" > <br>
<input type="submit" value="search" name="search" > <br>



 </form>







<?php if(isset($_POST['search'])){

if(empty( $_POST['namee']))  {

echo "please fill the name ";

}
else {

$searchfor=$_POST['namee'];
$sql="SELECT* from offers where namee  ='$searchfor'";
$res=$con->query($sql);
if($res->num_rows>0){
echo"founded!"."<br>";


}
else{ 
    echo "not found!";
}
while($row=$res->fetch_assoc()){

/**echo "name : ".$row['namee']." same min :".$row['samemin']." other min: ".$row['othermin']. " sms: ". 
$row['sms']. " net:".$row['internet']." price : ".$row['price'];*/

$GLOBALS['namee']=$row['namee'];
$GLOBALS['samemin']=$row['samemin'];
$GLOBALS['othermin']=$row['othermin'];
$GLOBALS['sms']=$row['sms'];
$GLOBALS['net']=$row['internet'];
$GLOBALS['price']=$row['price'];

}

}
}

 ?>
<form action="#" method="post" > 
<label>name</label><br>    
<input type="text" name="editname" value="<?php echo $namee;?> " > <br>
<label>same min</label><br>    
<input type="text" name="editsamemin" value="<?php echo $samemin;?> " ><br>
<label>other min </label><br>    
<input type="text" name="editothermin" value="<?php echo $othermin;?> " ><br>
<label>sms </label><br>    
<input type="text" name="editsms" value="<?php echo $sms;?> " ><br>
<label> internet </label><br>    
<input type="text" name="editnet" value="<?php echo $net;?> " ><br>
<label>price </label><br>    
<input type="text" name="editprice" value="<?php echo $price;?> " ><br>
<input type="submit" name="edit" value="edit" >
</form>
</body>

<?php  
if(isset($_POST['edit'])){
$editname=$_POST['editname'];
$editsamemin=$_POST['editsamemin'];
$editothermin=$_POST['editothermin'];
$editsms=$_POST['editsms'];
$editnet=$_POST['editnet'];
$editprice=$_POST['editprice'];



    $sqlup="UPDATE offers SET namee='$editname',samemin='$editsamemin', othermin='$editothermin',sms='$editsms',internet='$editnet',price='$editprice'
    where namee='$editname';
    
    ";
    if($con->query($sqlup)===true){

echo "updated!";

    }
    else{
echo "error !";

    }


} 


?>


 </html>



