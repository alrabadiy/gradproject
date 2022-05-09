<html>
<!--"<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" -->
    <head>  <title> add page  </title> 

<style>  
    body{background-color:black ;
    color: whitesmoke;
    font-family: monospace;
    text-align: center;
    }
    h1{
    background-color: white;

color: black;
border: 3px double;

margin: 90px;


    
    }
</style>
</head>  
<body>
  <form method="post" action="#">
<h2>add new record </h2>
  <hr>
<label> name of record </label> <br> 
<input type="text" name="name" > <br>
<label> the same min </label> <br> 
<input type="number" name="smnum" > <br>
<label> other min  </label> <br> 
<input type="number" name="omnum" > <br>
<label> sms  </label> <br> 
<input type="number" name="sms" ><br>
<label> internet </label> <br> 
<input type="number" name="net" > <br>
<label> price </label> <br> 
<input type="number" name="price" >
<hr>
<input type="submit" value="add the record" name="submit">

</form>    
</body>


</html>



<?php
function test($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;}

$name=$smnum=$omnum=$sms=$net=$price=""; 
if(isset($_POST['submit'])) 
{
 $name=test($_POST['name']);
 $smnum=test($_POST['smnum']);
 $omnum=test($_POST['omnum']);
 $sms=test($_POST['sms']);
 $net=test($_POST['net']);
 $price=test($_POST['price']);


}


$server="localhost";
$user="root";
$pass="";
$db="records";
$con=new mysqli($server,$user,$pass,$db);
if($con->connect_error){

echo "error";

}

if(empty($name) || empty($smnum) || empty($omnum) || empty($sms) || empty($net) || empty($price) ){


    echo "please them all !";
}
else{
$nametoadd=$name;
$smnumtoadd=$smnum;
$omnumtoadd=$omnum;
$smstoadd=$sms;
$nettoadd=$net;
$pricetoadd=$price; 
$sql="INSERT INTO offers (namee, samemin,othermin,sms,internet,price) 
values('$nametoadd','$smnumtoadd','$omnumtoadd','$smstoadd','$nettoadd','$pricetoadd')";
if($con->query($sql)===true){

    echo "the new record has been added please close the page ! ";
}
else{
    echo"failed";
}



}
?>