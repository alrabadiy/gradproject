<!DOCTYPE html>
<html>
<head>
<style>  body{background-color:black;
 color:white; text-align:center; } </style>  
</head>
<body>
<h1>search by name </h1>
<form action="#" method="post" >
<label> name  </label> <br>
<input type="text" name="namee" > <br>
<input type="submit" name="search" value="search" > <br>
<?php if(isset($_POST['search'])) {
    $search_name=$_POST['namee'];
    if(empty($search_name)){

echo "please enter the name !";

    } 
    else{
 $server="localhost";
 $user="root";
 $pass="";
 $db="records";
 $con=new mysqli($server,$user,$pass,$db);
 if($con->connect_error){

echo "failed!";

 }
 else{
  
    $sql="SELECT * FROM offers WHERE namee LIKE '%$search_name%'";
   
   


    $res=$con->query($sql);
    if($res->num_rows>0){
       
        while($row=$res->fetch_assoc()){
        
            echo "<table border='1'>

            <tr>
            
            <th>name</th>
            <th>same min</th>
            <th>other min</th>
            <th>sms</th>
            <th>internet</th>
            <th>price</th>
            
            </tr>";

            echo "<tr>";

            echo "<td>" . $row['namee'] . "</td>";
          
            echo "<td>" . $row['samemin'] . "</td>";
          
            echo "<td>" . $row['othermin'] . "</td>";
          
            echo "<td>" . $row['sms'] . "</td>";
            echo "<td>" . $row['internet'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";


          
            echo "</tr>";
          
            
          
          echo "</table>";
          echo "<br>"."<br>"."<br>"."<br>";




        }


    }


 }



    }




}




?>


</form>


</body>


</html>