<?php
include('conn.php');
$id=$_POST['Id'];

$query="SELECT * FROM `employeemaster` WHERE `Id`=$id;";

$res=mysqli_query($conn,$query);

$row=mysqli_fetch_assoc($res);

$EmpCode=str_shuffle("UBITECH");

$FirstName=$row['FirstName'];

$LastName=$row['LastName'];

$Department=$row['Department'];

$Designation=$row['Designation'];

$Phone=$row['Phone'];

$Status=$row['Status'];

$sql="INSERT INTO `employeemaster`(`EmpCode`,`FirstName`, `LastName`, `Department`, `Designation`, `Phone`, `Status`) VALUES ('$EmpCode','$FirstName','$LastName','$Department','$Designation','$Phone','$Status');";
$result=mysqli_query($conn,$sql);

if($result){
 echo('Employee Cloned Successfully');;
}else{
    echo "There is some problem while cloning the record";
}


?>