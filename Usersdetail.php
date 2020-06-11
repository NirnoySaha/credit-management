<?php


session_start();//

include("dbconnect.php");

$sql="SELECT * FROM `user_details`;";//query for search customer
$res=$con->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"  crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


<style type="text/css">
  body {
/*background-color: #e0e0e0;*/
                background-image: linear-gradient(to right, #3366cc, #60BCF8);
            }
</style>
</head>
<body>
  <div class="container-fluid text-center text-white " style="background-color: #3366cc;font-size: 3em;padding-bottom:10px">
  <p>All Users</p>
  
</div>

<header style="background-color: #3366cc;color:white;padding-bottom: 10px">
    <nav class="navbar navbar-expand-lg  py-3">
        <div class="container"><div class="navbar-brand text-uppercase font-weight-bold ">The Spark Foundation</div>
            <button  type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right" style="color:white"><i class="fa fa-bars"></i></button>
            
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto" style="color:white">
                    <li class="nav-item active"><a href="index.html" class="nav-link text-uppercase font-weight-bold " style="color:white">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link text-uppercase font-weight-bold" style="color:white">All users<span class="sr-only">(current)</span></a></li>
                    
                   
                </ul>
            </div>
        </div>
    </nav>
</header> 


<div class="container-fluid" style="padding-bottom: 10px;">
<table class="table table-hover table-responsive-sm ">
	<thead class="thead-dark"> 
    
      <tr>
        <th scope="col">User Name</th>

        <th scope="col">Email</th>
         <th scope="col">Current Credit
         </th>
        <th scope="col">View User</th>

        </tr>
        </thead>
    <tbody class="text-white ">  
<?php
  if(mysqli_num_rows($res)>0){ 
    while($row=mysqli_fetch_assoc($res)){ // result of query in form of array is copying in $row variable and till the array result is not get ended, while loop will run continuously
  ?>
    <tr>

        <td><?php echo $row['name']; ?></td>

<td><?php echo  $row['email'];?></td>
<td><?php echo  $row['current_credit'];?></td>
<td style="color:white">
<?php

$url="transfer.php?id=".$row['User_id']; 
			echo $link="<a href='".$url."' style='color:white'>Click here</a>";?>

			

</td>
          

  </tr>
  <?php
  }
} ?>
</tbody>				
			</table>
		
</div>


<div class="container-fluid text-center text-white " style="background-color: #3366cc">
  <p>Made by- Pawan Gupta</p>
  <p>
      <a href="https://www.linkedin.com/in/pawangupta2187" style="color: black;" class="fab fa-linkedin"></a>
      &nbsp;&nbsp;&nbsp;
      <a href="https://github.com/pawangupta2187" style="color: black;" class="fab fa-github"></a>
  </p>
</div>

</body>
</html>