<?php session_start(); ?>
<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Online Shop Maker</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<script src="js/myjs.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	<style type="text/css">
		.image_class{
			position: relative;
    		display: inline-block;
    		font-size: 0;
		}
		.image_class .close{
			position: absolute;
			top: 3px;
			right: 3px;
			z-index: 100;
			background-color: #FFF;
		    padding: 5px 2px 2px;
		    color: #000;
		    font-weight: bold;
		    cursor: pointer;
		    opacity: .2;
		    text-align: center;
		    font-size: 22px;
		    line-height: 10px;
		    border-radius: 50%;
		}
		.image_class:hover .close {
 		   opacity: 1;
		}
	</style>
	<script>
		var images_to_delete = new Array();
		function showResult(str) {
		  if (str.length==0) { 
		    document.getElementById("show_product").innerHTML="";
		    document.getElementById("show_product").style.border="0px";
		    return;
		  }
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else {  // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (this.readyState==4 && this.status==200) {
		      document.getElementById("show_product").innerHTML=this.responseText;
		      document.getElementById("show_product").style.border="1px solid #A5ACB2";
		    }
		  }
		  xmlhttp.open("GET","search_update_product-admin.php?q="+str,true);
		  xmlhttp.send();
		}

		function showResult_cat(choice,str) {
		  if (str.length==0) { 
		    document.getElementById("show_product_cat").innerHTML="";
		    document.getElementById("show_product_cat").style.border="0px";
		    return;
		  }
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else {  // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (this.readyState==4 && this.status==200) {
		      document.getElementById("show_product_cat").innerHTML=this.responseText;
		      document.getElementById("show_product_cat").style.border="1px solid #A5ACB2";
		    }
		  }
		  xmlhttp.open("GET","search_update_product-admin.php?q="+str+"&c="+choice,true);
		  xmlhttp.send();
		}

		function showResult_subcat(choice,sub_choice,str) {
		  if (str.length==0) { 
		    document.getElementById("show_product_subcat").innerHTML="";
		    document.getElementById("show_product_subcat").style.border="0px";
		    return;
		  }
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else {  // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (this.readyState==4 && this.status==200) {
		      document.getElementById("show_product_subcat").innerHTML=this.responseText;
		      document.getElementById("show_product_subcat").style.border="1px solid #A5ACB2";
		    }
		  }
		  xmlhttp.open("GET","search_update_product-admin.php?q="+str+"&c="+choice+"&s="+sub_choice,true);
		  xmlhttp.send();
		}

		function change(){
			if (document.getElementById('choice').value == 'by_product_only'){
				document.getElementById('by_product_name').style.display='block';
				document.getElementById('by_category').style.display='none';
				document.getElementById('by_subcategory').style.display='none';
			}
			else if (document.getElementById('choice').value == 'by_category'){
				document.getElementById('by_product_name').style.display='none';
				document.getElementById('by_category').style.display='block';
				document.getElementById('by_subcategory').style.display='none';
			}
			else{
				document.getElementById('by_product_name').style.display='none';
				document.getElementById('by_category').style.display='none';
				document.getElementById('by_subcategory').style.display='block';
			}
		}

		function get_choice(){
			var choice = document.getElementById('choice_category').value;
			document.getElementById('temp_cat_choice').value = choice;
		}

		function submit_data(){
			var pro_name = document.getElementById("product_name").value;
			var pro_price = document.getElementById("product_price").value;
			var pro_stock = document.getElementById("product_stock").value;
			var pro_threshold = document.getElementById("product_threshold").value;
			var product_offer_price = document.getElementById("product_offer_price").value;
			var product_offer_percentage = document.getElementById("product_offer_percentage").value;
			if (pro_name==''){
				event.preventDefault();
				alert("You can not leave product_name empty!");
				document.getElementById('product_name').focus();
				return false;
			}
			else if (pro_price=='' || isNaN(pro_price) || pro_price < 0){
				event.preventDefault();
				alert("You can not leave product_price empty!");
				document.getElementById('product_price').focus();
				return false;
			}
			else if (pro_stock=='' || isNaN(pro_stock) || pro_stock < 0 || !(pro_stock % 1 === 0)){
				event.preventDefault();
				alert("You can not leave product_stock empty or it must be positive integer!");
				document.getElementById('product_stock').focus();
				return false;
			}
			else if (pro_threshold=='' || isNaN(pro_threshold) || pro_threshold < 0 || !(pro_threshold % 1 === 0)){
				event.preventDefault();
				alert("You can not leave product_threshold empty or it must be positive integer!");
				document.getElementById('product_threshold').focus();
				return false;
			}
			else if (document.getElementById('image_count').value == images_to_delete.length && document.getElementById('product_upload_image[]').value == ''){
				event.preventDefault();
				alert("You must keep at least one image, you have deleted all old images and no new images selected!");
				document.getElementById('product_upload_image[]').focus();
				return false;
			}
			else if (product_offer_price != '' && (isNaN(product_offer_price) || product_offer_price < 0)){
				event.preventDefault();
				alert('Offer price must be a non-nagetive number!');
				document.getElementById('product_offer_price').focus();
				return false;
			}
			else if (product_offer_percentage != '' && (isNaN(product_offer_percentage) || product_offer_percentage < 0)){
				event.preventDefault();
				alert('Offer percentage must be a non-nagetive number!');
				document.getElementById('product_offer_percentage').focus();
				return false;
			}
			else if (product_offer_price != '' || product_offer_percentage != ''){
				event.preventDefault();
				var get_per = ((pro_price - product_offer_price)*100)/(pro_price);
				if (!((product_offer_percentage - get_per) < 0.5 && (product_offer_percentage - get_per) > (0-0.5))){
					alert('Offer price and percentage not matched with actual price!');
					document.getElementById('product_offer_percentage').focus();
					return false;
				}
			}
			else if (product_offer_price > pro_price){
				event.preventDefault();
				alert('Offer price cannot be more than product price!');
				document.getElementById('product_offer_price').focus();
				return false;
			}
			else if (product_offer_percentage > 100){
				event.preventDefault();
				alert('Offer percentage cannot be more than 100!');
				document.getElementById('product_offer_percentage').focus();
				return false;
			}
			else if (product_offer_price != '' && product_offer_percentage == ''){
				var get_percentage = ((pro_price - product_offer_price)*100)/(pro_price);
				document.getElementById('product_offer_percentage').value = get_percentage;
			}
			else if (product_offer_price == '' && product_offer_percentage != ''){
				var get_price = ((100 - product_offer_percentage)*pro_price)/100;
				document.getElementById('product_offer_price').value = get_price;
			}
			console.log(images_to_delete);
			document.getElementById('images_to_delete').value = JSON.stringify(images_to_delete);
			console.log(document.getElementById('images_to_delete').value);
			document.update_form.submit();
		}

		function delete_image(img_name){
			console.log(img_name);
			document.getElementById(img_name).style.display = 'none';
			images_to_delete.push(img_name);
		}

		function get_offer_percentage(off_pri){
			var pro_pri = document.getElementById('product_price').value;
			if (pro_pri != '' && off_pri != '' && !isNaN(pro_pri) && !isNaN(off_pri) && off_pri >= 0 && pro_pri > 0){
				var get_percentage = ((pro_pri - off_pri)*100)/(pro_pri);
				document.getElementById('product_offer_percentage').value = get_percentage.toFixed(2);
			}
			if (off_pri == ''){
				document.getElementById('product_offer_percentage').value = '';
			}
		}		
		
		function get_offer_price(off_per){
			var pro_pri = document.getElementById('product_price').value;
			if (pro_pri != '' && off_per != '' && !isNaN(pro_pri) && !isNaN(off_per) && off_per >=0 && pro_pri > 0){
				var get_price = ((100 - off_per)*pro_pri)/100;
				document.getElementById('product_offer_price').value = get_price.toFixed(0);
			}
			if (off_per == ''){
				document.getElementById('product_offer_price').value = '';
			}
		}
	</script>

	</head>
	<body>
	<!-- Header -->

			<!--Main section-->
			<section id="main" class="wrapper">
				<div class="container">
					<h2 style="color:blue">Select product to update its data</h2>
					<br>

					<?php
						$file = fopen("user_folders/".$_SESSION['username']."/product_data.json", 'r');
						if (filesize("user_folders/".$_SESSION['username']."/product_data.json") == 0){
							echo "<h3>You have not entered any products till now!!!</h3>";
						}
						else{
							$file_read = fread($file, filesize("user_folders/".$_SESSION['username']."/product_data.json"));
							$json_array = json_decode($file_read, true);
							foreach ($json_array as $key => $value) {
								$_SESSION['shop_name'] = $key;
							}
							if (count($json_array[$_SESSION['shop_name']]) == 0){
								echo "<h3>You have not entered any products till now!!!</h3>";
							}
							else{
								$count_cat = 0;  // category count
								$count_subcat = 0;  // subcategory count
								$count_pro = 0;  // product count
								$list = [];  // list format => [product_category, product_subcategory, product_name]
								$unique_cat = ['']; // to use in drop down
								$unique_subcat = [['','']]; // to use in drop down
								$choice_to_fill = [];
								foreach ($json_array[$_SESSION['shop_name']] as $key=>$value) {
									$count_cat++;
									array_push($unique_cat, $key);
									foreach ($value as $key1 => $value1) {
										$count_subcat++;
										array_push($unique_subcat, [$key, $key1]);
										foreach ($value1 as $key2 => $value2) {
											$count_pro++;
											$list_names = [];
											array_push($list_names, $key);  // product category
											array_push($list_names, $key1);  // product subcategory
											array_push($list_names, $key2);  // product name
											array_push($list, $list_names);
										}
									}
								}
								$_SESSION["names"] = $list;
								?>

								<strong>Select your 'search by' choice:</strong>
								<div id="options" class="3u 6u$(4)">
									<select id="choice" onchange="change();">
										<option value="by_product_only">direct product name search</option>
										<option value="by_category">category specific products</option>
										<option value="by_subcategory">subcategory specific products</option>
									</select>
								</div>

								<div align="left" id="by_product_name" style="display: block;">
									<div class="3u 6u$(4)">
										<br><strong>Search by product name: </strong>
										<div align="left">
										 <input type="text" id="search_product" name="search_product" onkeyup="showResult(this.value);">
										 	<div id="show_product"></div>
										 </div>
									</div>
								</div>

								<div id="by_category" style="display: none;" class="3u 6u$(4)">
									<br><strong>select category(will appear only if you have entered data for same)</strong>
									<select id="choice_category" onchange="get_choice();">
										<?php
											foreach ($unique_cat as $key => $value) {
												echo "<option value='".$value."'>".$value."</option>";	
											}
										?>
									</select>
									<input type="hidden" id="temp_cat_choice">
									<br><strong>Product name</strong>
									<input type="text" id="search_product" name="search_product" onkeyup="showResult_cat(document.getElementById('temp_cat_choice').value,this.value);">
									<div id="show_product_cat"></div>
								</div>

								<script>
									var choices = new Array();
									var i = 0;

									<?php foreach ($unique_subcat as $value) { ?>
											var temp = [];
											temp.push('<?php echo $value[0]; ?>');
											temp.push('<?php echo $value[1]; ?>');
											choices.push(temp);
											//console.log(choices);
											i++;
											//document.write(choices);
									<?php }  ?>

									function get_choice_sub(){
										var selected_cat = document.getElementById('choice_subcategory').value;	
										removeAllOptions(document.temp_form.fill_subcategory_choices);

										for (var j=0; j<choices.length; j++){
											if (selected_cat == choices[j][0]){
												addOption(document.temp_form.fill_subcategory_choices, choices[j][1], choices[j][1]);
											}
										}
									}

									function addOption(selectbox, value, text )
									{
										var optn = document.createElement("OPTION");
										optn.text = text;
										optn.value = value;

										selectbox.options.add(optn);
									}

									function removeAllOptions(selectbox)
									{
										var i;
										for(i=selectbox.options.length-1;i>=0;i--)
										{
												//selectbox.options.remove(i);
												selectbox.remove(i);
										}
									}

									function set_subcategory(){
										var temp_cat_name = document.getElementById('choice_subcategory').value;
										var temp_subcat_name = document.getElementById('fill_subcategory_choices').value;
										document.getElementById('temp_cat_choice_sub').value = temp_cat_name;
										document.getElementById('temp_subcat_choice_sub').value = temp_subcat_name;
									}
								</script>


								<div id="by_subcategory" style="display: none;" class="3u 6u$(4)">
									<br><strong>select category(will appear only if you have entered data for same)</strong>
									<select id="choice_subcategory" onchange="get_choice_sub();">
										<?php
											foreach ($unique_cat as $key => $value) {
												echo "<option value='".$value."''>".$value."</option>";	
											}
										?>
									</select>
									<br><strong>select subcategory(will appear only if you have entered data for same)</strong>
									<form name="temp_form">
									<select id="fill_subcategory_choices" name="fill_subcategory_choices" onchange="set_subcategory();">
									</select>
									</form>
									<input type="hidden" id="temp_cat_choice_sub">
									<input type="hidden" id="temp_subcat_choice_sub">
									<br><strong>Product name</strong>
									<input type="text" id="search_product" name="search_product" onkeyup="showResult_subcat(document.getElementById('choice_subcategory').value,document.getElementById('fill_subcategory_choices').value,this.value);">
									<div id="show_product_subcat"></div>
								</div>
						
								<?php

								if (isset($_GET["pro"])){
									$got_name = $_GET["pro"];
									$got_id = $_GET["i"];
									if ($got_name != ""){
										echo "<br><br><h4>Showing data for product name: ".$got_name."</h4>";
										?>
										<form enctype="multipart/form-data" method="post" id="update_form" name="update_form" action="update-data-admin.php">
										<?php
										$data_to_show = $json_array[$_SESSION['shop_name']][$list[$got_id][0]][$list[$got_id][1]][$got_name];
										echo "<br>Product category: ".$list[$got_id][0];
										echo "<br>Product subcategory: ".$list[$got_id][1];
										echo "<br>product_name: <input type='text' id='product_name' name='product_name' value='".$got_name."'>";
										foreach ($data_to_show as $key => $value) {
											if ($key != "product_image" && $key != "product_id" && $key != "product_offer_price" && $key != "product_offer_percentage"){
												echo "<br>".$key.": <input type='text' id='".$key."' name='".$key."' value='".$value."'>";
											}
											else if ($key == "product_offer_price"){
												echo "<br>".$key.": <input type='text' onkeyup='get_offer_percentage(this.value);' id='".$key."' name='".$key."' value='".$value."'>";
											}
											else if ($key == "product_offer_percentage"){
												echo "<br>".$key.": <input type='text' onkeyup='get_offer_price(this.value);' id='".$key."' name='".$key."' value='".$value."'>";
											}
											else if ($key == "product_id"){
												echo "<input type='hidden' id='product_id' name='product_id' value='".$value."'>";
											}
											else{
												echo "<br>product_image<br><strong>Once you delete image, action cannot be undone</strong><br>";
												?>
												<input type="hidden" id="image_count" name="image_count" value="<?php echo count($value); ?>">
												<?php
												for ($j=0; $j<count($value); $j++){
												?>	<div class="image_class">
													<div id="<?php echo $value[$j] ?>">
													<span class="close" onclick="delete_image('<?php echo $value[$j] ?>');">&times;</span>
													<br><img alt="Image could not be loaded" width="200" height="300" src="<?php echo 'user_folders/'.$_SESSION['username'].'/images/'.$value[$j]; ?>" border="5"/>
													</div>
													</div>
												<?php
												}
												?>
													<br><br>
													<input type="file" id="product_upload_image[]" name="product_upload_image[]" accept="image/*" multiple/><label>Add more images (You can select multiple images)</label>
												<?php
											}
										}
										?>
										<input type="hidden" name="images_to_delete" id="images_to_delete">
										<button onclick="submit_data();">Update</button>
										</form>	
										<?php
									}
								?>
								<script>    
    								if(typeof window.history.pushState == 'function') {
        							window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
    								}
									</script>
								<?php
								}
							}
						}
					?>

				</div>
			</section>

			<!-- Footer -->
			
	</body>

</html>