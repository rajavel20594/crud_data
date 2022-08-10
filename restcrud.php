<?php
require('db.php');

if($_POST['custom_method'] == "create"){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $nation=$_POST['nationlity'];
    $sql="INSERT INTO crud_form_data(name,phone,dob,gender,nationlity) VALUES ('$name','$phone','$dob','$gender','$nation')";
    // echo $sql;
    $connection=mysqli_query($conn,$sql);
    echo "success";
}

if($_GET['custom_method'] == "get_all_data")
{
    $query="SELECT * from  crud_form_data ";
    $result = mysqli_query($conn,$query);
    $cust=mysqli_fetch_all($result, MYSQLI_ASSOC);
    if($cust) {
         echo json_encode($cust);
    } else {
         echo "failed";
      }  
    }

if($_POST['custom_method'] == "update")
{
  $name=$_POST['name'];
  $phone=$_POST['phone'];
  $id=$_POST['id'];
  $dob=$_POST['dob'];
  $update="UPDATE crud_form_data SET name='$name',phone=$phone,dob='$dob' WHERE id=$id";
  //echo $update;
  $uptresult=mysqli_query($conn,$update);
  echo "update success";
}

if($_POST['custom_method']== "delete")
{
  $id=$_POST['id'];
  $deleteq="DELETE FROM crud_form_data WHERE id=$id";
  $deleteresult=mysqli_query($conn,$deleteq);
  echo"deleted successful";
}
if($_GET['custom_method'] == "user_all_data")
{
    $name=$_GET['name'];
    $query="SELECT * FROM  crud_form_data WHERE  name ='$name'";
    //echo $query;
    $result = mysqli_query($conn,$query);
    $data= mysqli_num_rows($result);
    echo json_encode($data);
    }
 ?> 