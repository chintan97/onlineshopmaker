<?php session_start(); 
/*if(!isset($_SESSION["username"])){
	echo '<script language="javascript">
	alert("You need to Sign In to use this feature!!!")
	window.location.href="login.php"
	</script>';
}*/
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Website Builder</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<script src="js/myjs.js"></script>
		<script type='text/javascript'>
		Element.prototype.remove = function() {
			this.parentElement.removeChild(this);
		}
		NodeList.prototype.remove = HTMLCollection.prototype.remove = function() {
			for(var i = this.length - 1; i >= 0; i--) {
				if(this[i] && this[i].parentElement) {
					this[i].parentElement.removeChild(this[i]);
				}
			}
		}
		var tr,td,newdiv;
		var array = [];
		function make_fields(){
			var start=1;
			var count = document.getElementById('product_type').value;
			array.push(count);
			if (array[0] != count){remove_fields(array[0]);}
			newdiv=document.createElement('div');
			newdiv.setAttribute("id", "div_in");
			document.getElementById('type').appendChild(newdiv);
			while(start<=count){
				tr = document.createElement('tr');
				td = document.createElement('td');
				var x= 'product'+start;
				tr.setAttribute("id", "tr"+start);
				td.setAttribute('id', 'td'+start);
				td.innerHTML = x + "<input type='text' id="+x+" name="+x+" onfocusout='product_names("+start+");' required/>";
				document.getElementById('div_in').appendChild(tr);
				document.getElementById('tr'+start).appendChild(td);
				start++;
			}
		}
		function remove_fields(number){
			delete array[0];
			document.getElementById('div_in').remove();
		}
		function previous_click(n){
			if(n==2){
				document.getElementById('second_div').style.display='none';
				document.getElementById('first_div').style.display='block';
			}
		}
		function form_reset(n){
			if(n==1){
				document.getElementById('div_in').remove();
			}
			document.builder.reset();
			document.getElementById('second_div').style.display='none';
			document.getElementById('first_div').style.display='block';
			product_names_array=[];
		}
		function check_data_shop(n){
			var pattern=/^[A-Za-z]+$/;
			count=array[0];
			if(n==1){
				var product_type=[];
				var start=0
				var shopname = document.getElementById('shopname').value;
				while(start<count){
					product_type[start]=document.getElementById('product'+(start+1)).value;
					start++;
				}
				start=0;
				if(shopname==''){
					alert("Please Enter Shop Name");
					document.getElementById("shopname").focus();
					return false;
				}
				else if(pattern.test(shopname)==false){
					alert("Shop Name should only contain alphabets");
					document.getElementById("shopname").focus();
					return false;
				}
				else if(shopname.length<2 || shopname.length > 10){
					alert("Shop Name should have no of characters between 2 to 10!");
					document.getElementById("shopname").focus();
					return false;
				}
				if(document.getElementById('product_type').value==''){
					alert("Please Select Product Type!");
					document.getElementById("product_type").focus();
					return false;
				}
				else{
					while(start<count){
						var x=product_type[start];
						if(x==''){
							alert("Please Enter Product"+(start+1)+" Name");
							document.getElementById("product"+(start+1)).focus();
							return false;
						}
						else if(pattern.test(x)==false){
							alert("Product"+(start+1)+" should have no of characters between 2 to 10!");
							document.getElementById("product"+(start+1)).focus();
							return false;
						}
						else if(x.length < 2 || x.length > 10){
							alert("Product"+(start+1)+" should have no of characters between 2 to 10!");
							document.getElementById("product"+(start+1)).focus();
							return false;
						}
					
						start++;
					}
					
				}	
			document.getElementById('first_div').style.display='none';
			document.getElementById('second_div').style.display='block';
			document.getElementById('previous_button').style.display='block';
			document.getElementById('p1').innerHTML='Product Type -> '+product_type[0];
			document.getElementById('p1_fields').innerHTML='Choose Fields to Represent Product : ' +product_type[0];
		}
		
			
	}
		function product_names(n){
			if(n==2){
				if(document.getElementById('product2').value==document.getElementById('product1').value){
					alert("Products must have different names");
					document.getElementById('product2').value='';
					document.getElementById("product"+(n)).focus();
					return false;
				}
			}
			else if(n==3){
				if((document.getElementById('product3').value==document.getElementById('product2').value) || (document.getElementById('product3').value==document.getElementById('product1').value)){
					alert("Products must have different names");
					document.getElementById('product3').value='';
					document.getElementById("product"+(n)).focus();
					return false;
				}
			}
			else if(n==4){
				if((document.getElementById('product4').value==document.getElementById('product3').value) || (document.getElementById('product4').value==document.getElementById('product2').value) || (document.getElementById('product4').value==document.getElementById('product1').value)){
					alert("Products must have different names");
					document.getElementById('product4').value='';
					document.getElementById("product"+(n)).focus();
					return false;
				}
			}
			else if(n==5){
				if((document.getElementById('product5').value==document.getElementById('product4').value) || (document.getElementById('product5').value==document.getElementById('product3').value) || (document.getElementById('product5').value==document.getElementById('produc2').value) || (document.getElementById('product5').value==document.getElementById('produc1').value)){
					alert("Products must have different names");
					document.getElementById('product5').value='';
					document.getElementById("product"+(n)).focus();
					return false;
				}
			}
		}
		</script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<h1><a href="#">Shop Goes Online Here!</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="ourgoal.php">Our Goal</a></li>
						<li><a href="#">Website Builder</a></li>
						<?php 
						if(isset($_SESSION["username"])){
							echo '<li><a href="logout.php" class="button special" rel="nofollow" onClick="return confirm(\'Do You Really Want To LogOut??\');">LogOUT</a></li>';
						}
						else{
							echo '<li><a href="login.php" class="button special">Sign Up/In</a></li>';
						}
						?>
					</ul>
				</nav>
			</header>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="container">

					<header class="major">
						<h2>Builder</h2>
						<p>Here Shop Goes Online</p>
					</header>
					<form method="post" name='builder' action="">
				
					<div align='center'>
					<div id='first_div'>
						<header>
						<h3>Step 1</h3>
						</header>
						<div class="12u 12u$(4)">
							<table>
							<tr><td>Your Shop Name</td><td><input type="text" name="shopname" id="shopname"  placeholder="Shop Name" required /></td></tr>
							<tr>
							<td>How Many Types Of Products You Want In Your Shop? </td>
							<td>
							<div name='type' id='type' class="10u$">
							<div class="select-wrapper">
								<select name="product_type" id="product_type" onchange='make_fields();'>
								  <option value="">- Types -</option>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								  <option value="5">5</option>
								  </select>
							</div>
							</div>
							</td></tr>
							</table>
						</div>
						
						<div class="12u$">
							<ul class="actions">
								<li><input type="button" id='next_button' name='next_button' value="Next" class="special" onClick="check_data_shop(1);"/></li>
								<li><input type="button" id='reset_button' name='reset_button' value="Reset" onclick='form_reset(1);'/></li>
							</ul>
						</div>
						
						</div>
						
						
						
						<div id='second_div' style='display:none;'>
						<header>
						<h3>Step 2</h3>
						<p id='p1'></p>
						</header>
						<div class="12u 12u$(4)">
							<table>
							<tr><td id='p1_fields'></td>
							<td>
							<div class="9u 12u$(3)">
								<input type="checkbox" id="p1_id" name="p1_id">
								<label for="p1_id">Product Id</label>
								<input type="checkbox" id="p1_name" name="p1_name">
								<label for="p1_name">Product Name</label>
								<input type="checkbox" id="p1_brand" name="p1_brand">
								<label for="p1_brand">Product Brand</label>
							</div>
							</td>
							</tr>
							<tr>
							<td>How Many Types Of Products You Want In Your Shop? 2 </td>
							<td>
							<div name='type' id='type' class="10u$">
							<div class="select-wrapper">
								<select name="product_type" id="product_type" onchange='make_fields();'>
								  <option value="">- Types -</option>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								  <option value="5">5</option>
								  </select>
							</div>
							</div>
							</td></tr>
							</table>
						</div>
						<div class="12u$">
							<ul class="actions">
								<li><input type="button" id='previous_button' name='previous_button' value="Previous" onclick='previous_click(2);'/></li>
								<li><input type="button" id='next_button' name='next_button' value="Next" class="special" onClick="check_data_shop(2);"/></li>
								<li><input type="button" id='reset_button' name='reset_button' value="Reset" onclick='form_reset(2);'/></li>
							</ul>
						</div>
						</div>
					</div>
				</form>
						
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<section class="links">
						<div class="row">
							<section class="3u 6u(medium) 12u$(small)">
								<h3>Online Shop Maker</h3>
								<ul class="unstyled">
									<li><a href="index.php">Home</a></li>
									<li><a href="login.php">Register/Log In</a></li>
									<li><a href="ourgoal.php">Our Goal</a></li>
									<li><a href="#">Website Builder</a></li>
								</ul>
							</section>
							<section class="3u 6u(medium) 12u$(small)">
								<h3>Location</h3>
								<ul class="unstyled">
									<li><a>LDRP-ITR,</a></li>
									<li><a>Sector-15,Near Kh-5,</a></li>
									<li><a>Gandhinagar,</a></li>
									<li><a>Gujarat.</a></li>
								</ul>
							</section>
							<section class="3u$ 6u$(medium) 12u$(small)">
								<h3>Contact Us</h3>
								<ul class="unstyled">
									<li><a>onlineshopmaker_queries@gmail.com</a></li>
									<li><a>(+91)9427606780</a></li>
									<li><a>(+91)9408640023</a></li>
								</ul>
							</section>
						</div>
					</section>
					<div class="row">
						<div class="8u 12u$(medium)">
							<ul class="copyright">
								<li>&copy; Online Shop Maker. All rights reserved.</li>
								<li>Design & Images: <a href="#">Online Shop Maker</a></li>
							</ul>
						</div>
						<div class="4u$ 12u$(medium)">
							<ul class="icons">
								<li>
									<a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
								</li>
								<li>
									<a class="icon rounded fa-twitter"><span class="label">Twitter</span></a>
								</li>
								<li>
									<a class="icon rounded fa-google-plus"><span class="label">Google+</span></a>
								</li>
								<li>
									<a class="icon rounded fa-linkedin"><span class="label">LinkedIn</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>

	</body>
</html>