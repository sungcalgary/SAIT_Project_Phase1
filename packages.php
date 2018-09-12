<!--
Packages page for SAIT Project
Author: Sunghyun Lee
Created: 2018-06-01
Last Updated:2018-06-07
-->
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Vacation Packages</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/CustomCSS.css">
</head>
<body onload="display_destination()">
  	<?php 
  	include "php/header.php";
  	//check if a 'Find Package' button was clicked on the index page. If yes, store its value into $searchItem
  	$searchItem='';
  	for ($i=1;$i<7;$i++) // there are 6 'Find Package' buttons on the index page
  	{
  		if (isset($_POST["button".$i]))
  			$searchItem=$_POST["button".$i];
  	}
  	?>
    <!-- area for search input -->
    <div class='jumbotron' style='background-color:skyblue'>
      <div class='row'>
        <div class='col-sm-1'></div>
        <div class='col-sm-8'>
            <div class="input-group mb-3">
              <div class="input-group-prepend"><span class="input-group-text" id="basic-addon1">Search :</span></div>
              <input type="text" class="form-control" placeholder="package name, continent, price, product etc." id="searchInput" onkeyup="display_destination()" value="<?php echo $searchItem; ?>" >
            </div>
        </div>
      </div>
    </div>
  	<div class="container">
    

    	<?php 
    	include 'php/Package.php';
      //connect to the database to get the number of rows of Package table
    	$myDb = new mysqli('localhost', 'root', '','travelexperts');
    	$sql = "SELECT PackageId FROM packages";
    	$result=$myDb->query($sql);
    	$numRows=$result->num_rows;
    	$myDb->close();
      //create Package objects according to the number of rows in the database
    	for ($i=1;$i<$numRows+1;$i++)
    	{
    		${'package'.$i} = new Package($i); 
    	}
    	?>
      <!-- if logged in, directs to order page. Otherwise directs to log in page-->
    	<form action="<?php if(isset($_SESSION['Username'])) echo 'ordersV2.php'; else echo 'login.php'; ?>" method="POST" id="packageForm">
  		  <table id="packageTable" style="width:100%" class="table table-hover table-borderless text-center">
    			<tr>
            <th>Package Name</th>
            <th>Start Date</th>
            <th>End date</th>
            <th>Description</th>
            <th>Base Price</th>
            
            <th>Products</th>
            <th>Book</th>
          </tr>


  		  	<?php
          /*
          For each row in the table, print out package information
          and attach an input button that will store each package's id as its value
          */
          for ($i=1;$i<$numRows+1;$i++)
            { $temp=${'package'.$i};
              if ($temp->checkEndDate())
              { 
                //reformat variables to make printing neat
                $startDate=substr($temp->startDate,0,10);
                $endDate=substr($temp->endDate,0,10);
                $basePrice= (float) $temp->basePrice;
                $agencyCommission=(float)$temp->agencyCommission;
                $basePrice=round($basePrice,2);
                $agencyCommission=round($agencyCommission,2);
                $products = implode(", ",${'package'.$i}->productNames);
                //print out the package's information 
                echo "<tr>
                        <td>$temp->name</td>
                        <td "; 
                //turn start date bold and red if it has passed
                if (!$temp->checkStartDate())
                {
                  echo "class='font-weight-bold text-danger '";
                }
                echo "      >$startDate</td>
                        <td>$endDate</td>
                        <td>$temp->description</td>
                        <td>\$$basePrice</td>
                        
                        <td>$products</td>
                        <td><button type='submit' name='button".$i."' value=$i class='btn btn-success' ";
                //turn the button disabled if the start date has passed
                if (!$temp->checkStartDate())
                {
                  echo "disabled";
                }
                echo "      >";
                //if the start date has passed, the button says Expired. Otherwise, Book
                if ($temp->checkStartDate())
                  echo "Order";
                else 
                  echo "Expired"; 
                echo "</button></td>
                      </tr>";
              }
            }		  	
  		  	?>
  		  	
  		  </table>
		  </form>
    </div>    
  <?php include "php/footer.php";?>


<script src="js/JSfunctions.js"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
