<?php session_start(); ?>
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
	</head>

	<?php
		$username = $_SESSION['username'];
		$file_name = 'user_folders/'.$username.'/product_data.json';
		$file = fopen($file_name, 'r');
		$read_data = fread($file, filesize($file_name));
		$json_array = json_decode($read_data, true);
		$product_names = [];
		$max_id = 0;
		foreach ($json_array as $key => $value){
			$_SESSION['shop_name'] = $key;
			$shop_name = $key;
			foreach ($value as $category => $value) {
				foreach ($value as $subcategory => $value1) {
					foreach ($value1 as $key => $value2) {
						array_push($product_names, $key);
						if ((int)$value2['product_id'] > $max_id){
							$max_id = (int)$value2['product_id'];
						}
					}
				}
			}
		}
		$max_id++;
		fclose($file);
	?>
	<script type="text/javascript">
		var product_names = new Array();
		<?php foreach($product_names as $key => $val){ ?>
        	product_names.push('<?php echo $val; ?>');
    	<?php } ?>

    	function check_data(){
    		var product_name = document.getElementById('product_name').value;
    		var product_price = document.getElementById('product_price').value;
    		var product_stock = document.getElementById('product_stock').value;
    		var product_threshold = document.getElementById('product_threshold').value;
    		var product_cat = document.getElementById('Category').value;
    		var product_subcat = document.getElementById('SubCat').value;
    		var product_image = document.getElementById('product_image[]').value;
    		var product_offer_price = document.getElementById('product_offer_price').value;
    		var product_offer_percentage = document.getElementById('product_offer_percentage').value;
    		if (product_name == ''){
    			event.preventDefault();
    			alert("Product name cannot be empty!");
    			document.getElementById('product_name').focus();
    			return false;
    		}
    		else if (product_price == '' || isNaN(product_price) || product_price < 0){
    			event.preventDefault();
    			alert("Product price cannot be empty or it must be a positive number!");
    			document.getElementById('product_price').focus();
    			return false;
    		}
    		else if (product_stock == '' || isNaN(product_stock) || product_stock < 0 || !(product_stock % 1 === 0)){
    			event.preventDefault();
    			alert("Product stock cannot be empty or it must be a positive integer!");
    			document.getElementById('product_stock').focus();
    			return false;
    		}
    		else if (product_threshold == '' || isNaN(product_threshold) || product_threshold < 0 || !(product_threshold % 1 === 0)){
    			event.preventDefault();
    			alert("Product threshold cannot be empty or it must be a positive integer!");
    			document.getElementById('product_threshold').focus();
    			return false;
    		}
    		else if (document.getElementById('Category').value=='category'){
    			event.preventDefault();
				alert('Please select product category');
				document.getElementById('Category').focus();
				return false;
			}
			else if (document.getElementById('SubCat').value=='subcategory'){
				event.preventDefault();
				alert('Please select product subcategory');
				document.getElementById('SubCat').focus();
				return false;
			}
			else if (product_image == ''){
				event.preventDefault();
				alert('You must upload at least one image');
				document.getElementById('product_image[]').focus();
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
				var get_per = ((product_price - product_offer_price)*100)/(product_price);
				if (!((product_offer_percentage - get_per) < 0.5 && (product_offer_percentage - get_per) > (0-0.5))){
					alert('Offer price and percentage not matched with actual price!');
					document.getElementById('product_offer_percentage').focus();
					return false;
				}
			}
			else if (product_offer_price > product_price){
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
				var get_percentage = ((product_price - product_offer_price)*100)/(product_price);
				document.getElementById('product_offer_percentage').value = get_percentage;
			}
			else if (product_offer_price == '' && product_offer_percentage != ''){
				var get_price = ((100 - product_offer_percentage)*product_price)/100;
				document.getElementById('product_offer_price').value = get_price;
			}
			for (i = 0; i < product_names.length; i++){
				if (product_names[i] == product_name){
					event.preventDefault();
					alert('Product name cannot be same, product name '+product_name+' matched with other product! You can check product in preview product feature or change product name.');
					document.getElementById('product_name').value = '';
					document.getElementById('product_name').focus();
					return false;
				}
			}
			document.getElementById('product_cat').value = document.getElementById('Category').value;
			document.getElementById('product_subcat').value = document.getElementById('SubCat').value;
			document.data_product.submit();
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

	<body>
		<form enctype="multipart/form-data" method="post" name="data_product" id="add-formdata_product" action="add-product-data-admin.php">
			<select id="Category" name="Category" onchange="SelectSubCat();">
				<option value="category">category</option>
				<option value="electronics">electronics</option>
				<option value="accessories">accessories</option>
				<option value="footwear">footwear</option>
				<option value="top wear">top wear</option>
				<option value="bottom wear">bottom wear</option>
				<option value="innerwear">innerwear</option>
				<option value="baby and kids">baby and kids</option>
				<option value="toys">toys</option>
				<option value="home">home</option>
				<option value="furniture">furniture</option>
				<option value="books">books</option>
				<option value="games">games</option>
				<option value="sports">sports</option>
				<option value="fitness">fitness</option>
				<option value="other">other</option>
			</select><label>Select product category<font Size="5" Color="red">*</font></label>
			<select id="SubCat" name="SubCat"><option value="subcategory"></option></select><label>Select product subcategory<font Size="5" Color="red">*</font></label>
			<input type="text" id="product_name" name="product_name" required/><label>Product name<font Size="5" Color="red">*</font></label>
			<input type="text" id="product_price" name="product_price" required/><label>Product price<font Size="5" Color="red">*</font></label>
			<input type="text" id="product_stock" name="product_stock" required/><label>Product stock<font Size="5" Color="red">*</font></label>
			<input type="text" id="product_threshold" name="product_threshold" required/><label>Product threshold (it will notify when stock reaches threshold)<font Size="5" Color="red">*</font></label>
			<input type="file" id="product_image[]" name="product_image[]" accept="image/*" required multiple/><label>Product image (You can selsct multiple images)<font Size="5" Color="red">*</font></label>
			<input type="hidden" id="product_id" name="product_id" value="<?php echo str_pad($max_id, 5, '0', STR_PAD_LEFT); ?>">
			<input type="text" id="product_brand" name="product_brand"><label>Product brand</label>
			<input type="text" id="product_size" name="product_size" placeholder="width x height x depth or S/M/L/XL"><label>Product size</label>
			<input type="text" id="product_description" name="product_description"><label>Product description</label>
			<input type="text" id="product_gender" name="product_gender"><label>Product gender</label>
			<input type="text" id="product_offer_price" onkeyup="get_offer_percentage(this.value)" name="product_offer_price"><label>Product offer price</label>
			<input type="text" id="product_offer_percentage" onkeyup="get_offer_price(this.value)" name="product_offer_percentage"><label>Product offer in percentage(%)</label>
			<input type="text" id="product_color" name="product_color"><label>Product color</label>
			<input type="hidden" id="product_cat" name="product_cat">
			<input type="hidden" id="product_subcat" name="product_subcat">
			<input type="hidden" id="temp_flag" name="temp_flag" value="0">
			<button onclick="check_data();">Submit</button>
		</form>
	</body>
</html>