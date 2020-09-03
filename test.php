
    <?php


                          	include('database.php');
                          	//getcustomers
                          	$GetAgents="SELECT * from agent where email=''$rows['email']";
                          	$agentResults=mysqli_query($con,$GetAgents) or die("Failed: ".mysqli_error($con));
                          	while ($row=mysqli_fetch_array($agentResults)) {
                          		# code...
                          		$adder=$row['email'];
                          	
                          	$CustChk="SELECT count(*) as total from buyer WHERE addedBy='$adder'";
                          	$CustRes = mysqli_query($con,$CustChk) or die("Failed: ".mysqli_error($con));
                          	$customers=mysqli_fetch_assoc($CustRes);


                          	$GetBidder="SELECT count(*) as total from bidder WHERE addedBy='$adder'";
                          	$bid = mysqli_query($con,$GetBidder) or die("Failed: ".mysqli_error($con));
                          	$bidder=mysqli_fetch_assoc($bid);

                          	$customer="SELECT count(*) as total from customer WHERE addedBy='$adder'";
                          	$cus = mysqli_query($con,$customer) or die("Failed: ".mysqli_error($con));
                          	$cust=mysqli_fetch_assoc($cus);


                         

                          	


     
    $dataPoints = array(
    	array("y" => $customers['total'], "label" => "buyers"),
    	array("y" => $bidder['total'], "label" => "bidder"),
    	array("y" => $cust['total'], "label" => "customer")
    	
    
    );
     }
    ?>
    <!DOCTYPE HTML>
    <html>
    <head>
    <script>
    window.onload = function () {
     
    var chart = new CanvasJS.Chart("chartContainer", {
    	title: {
    		text: "Latest Sales Chart"
    	},
    	axisY: {
    		title: "Number of customers"
    	},
    	data: [{
    		type: "bar",
    		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
    	}]
    });
    chart.render();
     
    }
    </script>
    </head>
    <body>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </body>
    </html>                              