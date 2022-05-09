  
  
  <html> <!--  search for the name first and then write it again and click on delete !  -->
    <head> 
        <title>delete record </title>
        <style> 
    body{
    text-align:center;
    background-color:black;
    color:white;



    }
    
    </style>
    </head>  
<body>
    <h1> delete a record </h1>
    <br> <br> <br> <br> <br> <br>
<form action="#" method="post">  
    <label> enter the record name </label> <br> <br>
<input type="text" name="namee" ><br> <br>
<input type="submit" value="search" name="search" ><br> <br> 
<input type="submit" value ="delete" name="delete" >
</form>
</body>
</html>
<?php 
function test($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;}
if(isset($_POST['search'])){
if(empty($_POST['namee'])){

echo "please enter a value !";

}
 else {
$searchfor=test($_POST['namee']);

$host="localhost";
$user="root";
$pass="";
$db="records";
$con=new mysqli($host,$user,$pass,$db);
if($con->connect_error){
    echo "something wrong!";
}
else {

$sql="SELECT * from offers where namee ='$searchfor' ";
$res=$con->query($sql);
if($res->num_rows>0) {

    echo "the record is founded !"."<br>";
}else {

    echo "invalid input no data was found please check the name !";
}
 
while($row=$res->fetch_assoc()){

echo " record name :  ".$row['namee']."<br>"."same network minutes  ".$row['samemin']."<br>".
"other minutes ".$row['othermin']."<br>"."sms ".$row['sms']."<br>". " internet  ".$row['internet']."<br>"."price ". $row['price'];
  

}

}


    


}

}
if(isset($_POST['delete']))  {
    $delete=$_POST['namee'];
    if(empty($delete)){

        echo "please enter a value !";
    }
    else{
$host="localhost";
$user="root";
$pass="";
$db="records";
$con=new mysqli($host,$user,$pass,$db);
if($con->connect_error){

echo "error!";

} 
else {
$sqldelete="DELETE FROM offers WHERE namee='$delete'";
if($con->query($sqldelete) === true ){

echo $delete." record has been deleted successfully";

}
else {

    echo $delte. "can't delete it";
}





}
 


}
}
?>