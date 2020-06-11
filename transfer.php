<?php

require("dbconnect.php");
if(!$_GET['id'])
header("Location:index.html");
$user_id=$_GET['id'];


$query = "SELECT * FROM user_details where User_id=$user_id";  // query to search users from Table
$res = $con->query($query); // query runs here
$row=mysqli_fetch_assoc($res);



if(isset($_POST['credit']))//
{

	  		$a="";
			$uname=$_POST['name'];
			$amount=$_POST['amount'];


if($row['current_credit']-$amount<0)
   echo "<script>alert('Balance is Not enough')</script>";
	//echo "Balance is low ".$row['current_credit'];
else 
{
			$sql1="SELECT * FROM  user_details where name='$uname' ";//first fetch information of medicine that medicine existing or not
			$result1=$con->query($sql1);
	if(mysqli_num_rows($result1)>0)
	    {
	      $row1=mysqli_fetch_assoc($result1);
	      //echo "you select name".$uname;
	    }
	    else{
	      echo "<script>alert('you select wrong name')</script>";
	    }

	$cur_credit=$row1['current_credit']+$amount;

	$sqlupdate="UPDATE user_details SET  current_credit = '$cur_credit'  where name='$uname'";
	// print_r($sqlupdate);
	$sqrupdateres=$con->query($sqlupdate);

	$decreasevalue=$row['current_credit']-$amount;
		$from_name=$row['name'];
	$sqldecreased="UPDATE user_details SET  current_credit = '$decreasevalue'  where name='$from_name'";
		$sqrdecreased_res=$con->query($sqldecreased);
	// $sql2="select *from stock where M_id=$Mid";//fetch medicine info from stock table
	// $result2=$con->query($sql2);
    echo "<script>alert('Credit Tranfered')</script>";
}
}


?>
<!DOCTYPE html>
<html>
<head>

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
	<title>Transfer Credit</title>



</head>
<body>

<div class="container-fluid text-center text-white " style="background-color: #3366cc;font-size: 3em;padding-bottom:10px">
  <p>Transfer Credit</p>
  
</div>



<header style="background-color: #3366cc;color:white;padding-bottom: 10px">
    <nav class="navbar navbar-expand-lg  py-3">
        <div class="container"><div class="navbar-brand text-uppercase font-weight-bold ">The Spark Foundation</div>
            <button  type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right" style="color:white"><i class="fa fa-bars"></i></button>
            
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto" style="color:white">
                    <li class="nav-item active"><a href="index.html" class="nav-link text-uppercase font-weight-bold " style="color:white">Home</a></li>
                    <li class="nav-item"><a href="Usersdetail.php" class="nav-link text-uppercase font-weight-bold" style="color:white">All users</a></li>
                    
                   
                </ul>
            </div>
        </div>
    </nav>
</header> 

  <table class="table table-hover table-responsive-sm  text-white" >
      <thead class="thead-dark">
        <tr>      
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Current Credit</th>
        </tr>
      </thead>
      <tbody>
        <tr >
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['current_credit']; ?></td>
        </tr>
      </tbody>
    </table>



	

<div class="container-fluid" style="padding-bottom: 10px;padding-top: 10px;">
      <div class="card-deck">
          <div class="card ">
            <div class="card-body text-center">
              <div  class="card-deck">
      		        	<div class="card" style="background-color:#3366cc">
      				        <div class="card-body text-center" style="padding: 0px">
      				        <form  method="post"   action=""  enctype="multipart/form-data" >
		                     <div class="card-body" style="text-align: center;">
                           <div class="form-group" >
    		
                          		<input type="number" name="amount"  id="quan" class="form-control mb-2 mr-sm-2" placeholder="Enter Amount" required/>
                          		<select  class="browser-default custom-select custom-select-lg mb-3" id="name" name="name">
                                  <option value="" disabled selected>Select User</option>
                                  <?php 

                                $sql="SELECT * FROM `user_details`;";//query for search customer
                                $res=$con->query($sql);
                                if(mysqli_num_rows($res)>0){ 
                                    while($row=mysqli_fetch_assoc($res)){
                                  ?>
                                  <option value=<?php echo $row['name']; ?>><?php echo $row['name']; ?></option>
                                  
                                <?php
                                }
                                }
                                ?>
                              </select>
                             </div> 
                        <div class="card-footer">
    				                <div colspan="2" align="center"><input type="submit" class="btn" style="background-color: #5FB48A;color: white;font-weight: bold;" name="credit" value="Transfer"  id="submit"/></div>
                        </div>
                      </div>
                   </form>
      				      </div>
      				    </div>     		        	
      		    </div>
            </div>
        </div>
    </div>
</div>



<div class="container-fluid text-center text-white" style="background-color: #3366cc;padding-bottom: 0px;">
  <p>Made by- Pawan Gupta</p>
  <p>
      <a href="https://www.linkedin.com/in/pawangupta2187" style="color: black;" class="fab fa-linkedin"></a>
      &nbsp;&nbsp;&nbsp;
      <a href="https://github.com/pawangupta2187" style="color: black;" class="fab fa-github"></a>
  </p>
</div>

</body>
</html>