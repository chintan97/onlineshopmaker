<?php 
	session_start();
	if (isset($_SESSION['username'])){
		$file_read = file_get_contents('user_folders/'.$_SESSION["username"].'/owner_data.json');
		$file_data = json_decode($file_read, true);
		$username = $_SESSION['username'];
		$shop_name = $file_data[$username]['shop_name'];
		$contact_email = $file_data[$username]['contact_email'];
		$contact_mobile = $file_data[$username]['contact_mobile'];
		$shop_address = $file_data[$username]['shop_address'];
		$shop_nearest_location = $file_data[$username]['shop_nearest_location'];
		$name = $file_data[$username]['name'];
	}
	else {
		echo "<script>window.location.href='admin-page.php';</script>";
	}
?>
<html>
<head>
	<script src="js/jquery.min.js"></script>
	<script src="js/skel.min.js"></script>
	<script src="js/skel-layers.min.js"></script>
	<script src="js/init.js"></script>
	<script src="js/list.js"></script>
	<noscript>
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-xlarge.css" />
	</noscript>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnN1vzotvPpQp18QJW8gWpbWaCHpzP-5w&libraries=places&callback=initAutocomplete" defer></script>
	<script>

	      function initAutocomplete() {
	        autocomplete = new google.maps.places.Autocomplete((document.getElementById('shop_nearest_location')),{types: ['geocode']});
			
	      }
		  function geolocate() {
	        if (navigator.geolocation) {
	          navigator.geolocation.getCurrentPosition(function(position) {
	            var geolocation = {
	              lat: position.coords.latitude,
	              lng: position.coords.longitude
	            };
	            var circle = new google.maps.Circle({
	              center: geolocation,
	              radius: position.coords.accuracy
	            });
	            autocomplete.setBounds(circle.getBounds());
	          });
	        }
			
	      }
	      
	</script>
	<script type="text/javascript">
		function update_data(){
			var contact_email = document.getElementById('contact_email').value;
			var contact_mobile = document.getElementById('contact_mobile').value;
			var shop_address = document.getElementById('shop_address').value;
			var entered_name = document.getElementById('entered_name').value;
			var shop_nearest_location = document.getElementById('shop_nearest_location').value;
			var email_pattern = /^\w+\@[a-zA-Z_.]+\.\w{2,5}$/;
			var split_data = shop_nearest_location.split(',');
			var temp_city = split_data[split_data.length - 3];
			var temp_state = split_data[split_data.length - 2];
			var temp_country = split_data[split_data.length - 1];
			if (contact_email == ''){
				event.preventDefault();
				alert('Please enter contact email!');
				document.getElementById('contact_email').focus();
				return false;
			}
			else if (entered_name == ''){
				event.preventDefault();
				alert('Please enter name!');
				document.getElementById('entered_name').focus();
				return false;
			}
			else if (contact_mobile == ''){
				event.preventDefault();
				alert('Please enter contact mobile!');
				document.getElementById('contact_mobile').focus();
				return false;
			}
			else if (shop_address == ''){
				event.preventDefault();
				alert('Please enter shop address!');
				document.getElementById('shop_address').focus();
				return false;
			}
			if (shop_nearest_location == ''){
				event.preventDefault();
				alert('Please enter shop nearest location!');
				document.getElementById('shop_nearest_location').focus();
				return false;
			}
			else if (email_pattern.test(contact_email) == false){
				event.preventDefault();
				alert('Please enter valid email!');
				document.getElementById('contact_email').focus();
				return false;
			}
			else if (temp_city === undefined || temp_state === undefined || temp_country === undefined){
				event.preventDefault();
				alert("Please enter city, state, country atleast!");
				document.getElementById("shop_nearest_location").focus();
				return false;
			}
			document.update_shop.submit();
		}
	</script>
</head>
<body>
	<form name="update_shop" method="post" action="">
		&nbsp;
		<input type="text" id="entered_name" name="entered_name" value="<?php echo $name; ?>" required/><label>Name<font Size="5" Color="red">*</font></label>
		<input type="text" id="contact_email" name="contact_email" value="<?php echo $contact_email; ?>" required/><label>Contact Email<font Size="5" Color="red">*</font></label>
		<input type="text" id="contact_mobile" name="contact_mobile" value="<?php echo $contact_mobile; ?>" required/><label>Contact Mobile<font Size="5" Color="red">*</font></label>	
		<input type="text" id="shop_address" name="shop_address" value="<?php echo $shop_address; ?>" required/><label>Shop address<font Size="5" Color="red">*</font></label>
		<input type="text" id="shop_nearest_location" name="shop_nearest_location" value="<?php echo $shop_nearest_location; ?>" required/><label>nearest shop location<font Size="5" Color="red">*</font></label><br>
		<button type="submit" onclick="update_data();" style="color: #FFFFFF; background-color: #944dff; width: 100px; height: 30px; border-radius: 5px;">Update</button>
	</form>
</body>
</html>

<?php
	if (isset($_POST['contact_email'])){
		$name1 = $_POST['entered_name'];
		$contact_email1 = $_POST['contact_email'];
		$contact_mobile1 = $_POST['contact_mobile'];
		$shop_address1 = $_POST['shop_address'];
		$shop_nearest_location1 = $_POST['shop_nearest_location'];
		$file_data[$username]['name'] = $name1;
		$file_data[$username]['contact_email'] = $contact_email1;
		$file_data[$username]['contact_mobile'] = $contact_mobile1;
		$file_data[$username]['shop_address'] = $shop_address1;
		$file_data[$username]['shop_nearest_location'] = $shop_nearest_location1;
		file_put_contents('user_folders/'.$username.'/owner_data.json', json_encode($file_data));
		unset($_POST['contact_email']);
		unset($_POST['contact_mobile']);
		unset($_POST['shop_address']);
		unset($_POST['shop_nearest_location']);
		echo "<script>window.location.href='update-shop-admin.php';</script>";
	}
?>