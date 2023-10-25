<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;
background-color: aquamarine;}

input[type=text], input[type=password] ,input[type=number]{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(315deg, rgb(55, 73, 112) 60%, rgb(51, 102, 96) 100%);
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
.form{
    margin: auto;
    height: 70%;
    width: 50%;
}

button {
  background-color: #04AA6D;
  /* background: linear-gradient(90deg, rgba(9, 112, 9, 0.473),green); */
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: auto;
}

img.avatar {
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body>

<h2 style="text-align: center;">Registration Form</h2>
<div class="form">
    
<form action="?" method="post">
  <div class="imgcontainer">
    <img src="img_avatar2.png" height="150px" width="150px" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Enter Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="uname"><b>Employee ID</b></label>
    <input type="text" placeholder="Enter Emp ID" name="id" required>

    <label for="uname"><b>Salary</b></label>
    <input type="number" placeholder="Enter Salary" name="salary" required>

    <label for="uname"><b>Extra Hours</b></label>
    <input type="number" placeholder="Enter extra hours" name="extra" required>

    <label for="uname"><b>Commision PCT</b></label>
    <input type="number" placeholder="Enter Comission PCT" name="com" required>

    <label for="uname"><b>Department No</b></label>
    <input type="number" placeholder="Enter Dept no" name="dept" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw"><b>Confirm Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw2" required>
        
    <button type="submit" name="submit">Login</button>
  </div>
  
  <div class="container" style="background-color: aquamarine;">
    <center>
    <button type="button" class="cancelbtn" onclick="document.location='adminpage.php'">Back</button>
    <button type="button" class="cancelbtn" onclick="document.location='adminpage.php'">Cancel</button>
    </center>
    
  </div>


  <?php

$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="municipality";
$conn=mysqli_connect($host,$dbusername,$dbpassword,$dbname);


if(!$conn)
{
    echo "Server is not connected";

}

if(isset($_POST["submit"]))
{
  $email=$_POST['email'];
  $id=$_POST['id'];
  $salary=$_POST['salary'];
  $extrah=$_POST['extra'];
  $com=$_POST['com'];
  $deparn=$_POST['dept'];
  $pass1=$_POST['psw'];
  $pass2=$_POST['psw2'];


  

$sql1="select * from employees where E_ID='$id'";
$res=mysqli_query($conn,$sql1);
if(mysqli_num_rows($res)>0){
  echo "<script>alert('Employee ID already exist')</script>";
}
else{
  if($pass1!=$pass2){
    echo `<script>alert("Passwords doesn't match")</script>`;
  }
  else{
    $hashed=password_hash($pass1,PASSWORD_DEFAULT);
    $sql2="INSERT INTO `employees`(`Email`, `E_ID`, `Salary`, `Extra_Hours`, `Commission_Pct`, `D_No`, `Password`) VALUES ('$email','$id','$salary','$extrah','$com','$deparn','$hashed')";
    $res2=mysqli_query($conn,$sql2);
    if($res2){
      echo "<script>alert('Employee registered successfully')</script>";
    }
    else
    echo "<script>alert('Something went wrong')</script>";

  }
  
}
}

?>

</form>

</div>
</body>
</html>
