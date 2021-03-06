<?php
require("db_conn.php");
$c_id=$_GET["course_id"];

$query1 = "select * from course where id='$c_id'";

$result1=mysqli_query($conn,$query1);

if(mysqli_num_rows($result1)>0){	
	$row=mysqli_fetch_array($result1);
	
		$id=$row['id'];
		$class_id=$row['class_id'];
		$name=$row['name'];
		$duration=$row['duration'];
		$rate=$row['rate'];
		$start=$row['start'];
		$end=$row['end'];
		$image=$row['image'];
		#echo $id." ".$class_id." ". $name." ". $duration." ". $rate." ". $start ." ".$end;
}
else{
	echo "Unable to get course details";
}

$query2 = "select * from class where id in (select class_id from course where id=$c_id);";

$result2=mysqli_query($conn,$query2);
if(mysqli_num_rows($result2)>0){
	$row=mysqli_fetch_array($result2);
	$classId = $row["id"];	
	$className = $row["name"];
	$contactNo = $row["contact_no"];
	$classAddr = $row["address"];
}

?>
<html>
<head>

		<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115094610-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-115094610-1');
    </script>
    <!-- google analytics ends -->
    
    <!--Responsive-->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
		<!--responsive ends-->

		<link rel="icon" type="image/png" href="favicon.ico">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <script src="jquery.js"></script>		
		<script src="bootstrap/js/bootstrap.min.js"></script>



	<style type="text/css">
		#course-image{
		    height: 100%;
		    width: 100%;
		}
	</style>
	<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 75%;
        width: 94%;
        margin: 3%;
      }
    </style>

</head>
<body>
<!-- Navigation -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="index.php">Course Guru</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarNav">
		    <ul class="navbar-nav ml-auto">
		      <li class="nav-item">
		        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item" active>
		        <a class="nav-link" href="">About Us</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal">Login</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#" data-toggle="modal" data-target="#registerModal">Register</a>
		      </li>
		      
		    </ul>
		  </div>
		</nav>
		<div id="loginModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Login Page</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					
				</div>
				<div class="modal-body">
					<ul class="nav nav-tabs">
		
						<li><a data-toggle="tab" href="#studentLogin"><h2>Student/</h2></a></li>
						<li><a data-toggle="tab" href="#classLogin"><h2>Classes<h2></a></li>
					</ul>
		
		<div class="tab-content">
			
			<div id="studentLogin" class="tab-pane fade">
				<label> Email </label>
				<input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email" />
				<br />
			
				<label> Password </label>
				<input type="password" name="password" id="password" class="form-control" placeholder="Enter your Password"  />
				<br />
				<button type="button" name="login_button" id="login_button" class="btn btn-warning">Login</button>
			</div>
			
			
			
			<div id="classLogin" class="tab-pane fade">
				<label> Email Id: </label>
				<input type="email" name="email"  class="form-control" placeholder="Enter your Email" />
				<br />
			
				<label> Password </label>
				<input type="password" name="password"  class="form-control" placeholder="Enter your Password"  />
				<br />
				<button type="button" name="login_button"  class="btn btn-warning">Login</button>
			</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<div id="registerModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Registration Page</h5>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					
				</div>
				<div class="modal-body">
					<ul class="nav nav-tabs">
		
			<li><a data-toggle="tab" href="#student"><h2>Student/</h2></a></li>
			<li><a data-toggle="tab" href="#classes"><h2>Classes<h2></a></li>
		</ul>
		
		<div class="tab-content">
			
			<div id="student" class="tab-pane fade">
				<label> Email: </label>
				<input type="email" name="email" class="form-control" placeholder="Enter your Email" />
				<br />
			
				<label> Password: </label>
				<input type="password" name="password" class="form-control" placeholder="Enter your Password"  />
				<br />
				
				<label> Confirm Password: </label>
				<input type="password" name="cpassword" class="form-control" placeholder="Confirm Password"  />
				<br />
				<button type="button" name="login_button" id="login_button" class="btn btn-warning">Register</button>
			</div>
			
			
			
			<div id="classes" class="tab-pane fade">
				<label> Email Id: </label>
				<input type="email" name="email"  class="form-control" placeholder="Enter your Email" />
				<br />
			
				<label> Password: </label>
				<input type="password" name="password"  class="form-control" placeholder="Enter your Password"  />
				<br />
				
				<label> Confirm Password:</label>
				<input type="password" name="cpassword"  class="form-control" placeholder="Enter your Password"  />
				<br />
				<button type="button" name="login_button" class="btn btn-warning">Register</button>
			</div>
						
				</div>
			</div>
		</div>
	</div>
	</div>

	<div class="jumbotron"><?php echo '<img id="course-image" src="data:image/jpeg;base64,'.base64_encode($image).'"/>' ?></div>
	<div class="col" id="course">					
		<div class="card mb-3">
		  <div class="card-body">
		    <h5 class="card-text course-link" id="<?php echo $id ?>">Course Name:<?php echo $name ?></h5>
		    <p class="card-text">Duration:<?php echo $duration ?></p>
		    <p class="card-text">Rate:<?php echo $rate ?></p>
		    <p class="card-text">Starts on:<?php echo $start ?></p>
		    <p class="card-text">Ends on:<?php echo $end ?></p>
		    <p class="text"><a href="class_details.php?id=<?php echo $classId ?>"><?php echo "Course Provider: $className";?></a></p>
			<p class="text"><?php echo "Contact No: $contactNo";?></p>
		  </div>
		</div>					
	</div>

	
    <div id="map"></div>
    		<!-- google maps geocoding api -->
		<script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
        });
        var geocoder = new google.maps.Geocoder();
        geocodeAddress(geocoder, map);
      }

      function geocodeAddress(geocoder, resultsMap) {
        var address = "<?php echo $classAddr ?>";
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3BUx3LJ92e4Sh1pId7SKCem1ikf5QF8s&callback=initMap">
    </script>
    <!--api ends-->

</body>
</html>