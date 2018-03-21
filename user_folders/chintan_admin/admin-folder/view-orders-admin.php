<?php session_start();?>


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
		<style>
		.label {
		  display: inline;
		  padding: .2em .6em .3em;
		  font-size: 75%;
		  font-weight: bold;
		  line-height: 1;
		  color: #fff;
		  text-align: center;
		  white-space: nowrap;
		  vertical-align: baseline;
		  border-radius: .25em;
		}
		.label-info {
			background-color: #5bc0de;
		}
		.label-danger {
 			background-color: #d9534f;
		}
		.label-success {
 	 		background-color: #5cb85c;
		}
		.btn {
		  display: inline-block;
		  padding: 6px 12px;
		  margin-bottom: 0;
		  font-size: 14px;
		  font-weight: normal;
		  line-height: 1.42857143;
		  text-align: center;
		  white-space: nowrap;
		  vertical-align: middle;
		  cursor: pointer;
		  -webkit-user-select: none;
			 -moz-user-select: none;
			  -ms-user-select: none;
				  user-select: none;
		  background-image: none;
		  border: 1px solid transparent;
		  border-radius: 4px;
		}
		.btn:focus,
		.btn:active:focus,
		.btn.active:focus {
		  outline: thin dotted;
		  outline: 5px auto -webkit-focus-ring-color;
		  outline-offset: -2px;
		}
		.btn:hover,
		.btn:focus {
		  color: #333;
		  text-decoration: none;
		}
		.btn:active,
		.btn.active {
		  background-image: none;
		  outline: 0;
		  -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
				  box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125);
		}

		.btn-danger {
		  color: #fff;
		  background-color: #d9534f;
		  border-color: #d43f3a;
		}
		.btn-okay {
		  color: #fff;
		  background-color: #5cb85c;
		  border-color: #5cb85c;
		}
		.fa-check-circle-o:before {
		  content: "\f05d";
		}
		.fa {
		  display: inline-block;
		  font-family: FontAwesome;
		  font-style: normal;
		  font-weight: normal;
		  line-height: 1;
		  -webkit-font-smoothing: antialiased;
		  -moz-osx-font-smoothing: grayscale;
		}
		.fa-times-circle:before {
		  content: "\f057";
		}
		.fa-times-check:before {
		  content: "\f058";
		}
		</style>
		<script type="text/javascript">
			function proceed(key,index){
				window.location.href= 'update-orders-admin.php?proceed='+key+'&id='+index;
			}
			function cancel(key,index){
				window.location.href= 'update-orders-admin.php?cancel='+key+'&id='+index;
			}
			function load(type){
				if(type == 'new'){
					document.getElementById('ship_table').style.display='none';
					document.getElementById('cancel_table').style.display='none';
					document.getElementById('new_table').style.display='block';
					
				}
				else if(type == 'ship'){
					document.getElementById('cancel_table').style.display='none';
					document.getElementById('new_table').style.display='none';
					document.getElementById('ship_table').style.display='block';
					

				}
				else{
					document.getElementById('new_table').style.display='none';
					document.getElementById('ship_table').style.display='none';
					document.getElementById('cancel_table').style.display='block';
				}
			}
		</script>
			
	</head>
	<body>
		<div class="col-md-9" id="customer-orders">
			<div class="box">
				<h2 align="center">Orders</h2>
				<div id="new_table" class="table-responsive">
					<div id="buttons_1" align="center" >
						<a id="new_button" class="button" onclick="load('new');">New Orders</a>
						<a id="ship_button" class="button alt" onclick="load('ship');">Shipped Orders</a>
						<a id="cancel_button" class="button alt" onclick="load('cancel');">Cancelled Orders</a>
					</div>
					<br>
					<table class="table table-hover">
						<?php 
							if (file_exists('../orders.json') == 0){
								echo "<h3 align='center'>You have no orders.</h3>";
							}
							else {
								$file_name = '../orders.json';
								$str = file_get_contents($file_name);
								$json = json_decode($str, true);
								//print_r($read_data);
								$root = array_keys($json)[0];
								$orders = $json[$root];
								
								echo '<thead>
										<tr>
											<th>Order ID</th>
											<th>Product</th>
											<th>User</th>
											<th>Date/Time</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									  </thead>
									<tbody>';
								foreach($orders as $key => $value){
									$order_detail_list = $value['order_detail'];
									echo '<tr>
                                                <th># '.$key.'</th>
												<td>';
									for($i=0;$i<count($order_detail_list);$i++){
										$order_detail = $order_detail_list[$i];
										 			echo 'Product ID : '.$order_detail['product_id'].'<br>
													Product name : '.$order_detail['product_name'].'<br>
													Product category : '.$order_detail['product_category'].'<br>
													Product subcategory : '.$order_detail['product_subcategory'].'<br>
													Product price : '.$order_detail['sold_price'].'<br>
													Product quantity : '.$order_detail['product_quantity'].'<br>
													Total : '.$order_detail['subtotal'].'<br>----------------<br>';
												
									}
									echo '</td>';
									echo '<td>Name : '.$value['name'].'<br>
											  Email : '.$value['email'].'<br>
											  Phone : '.$value['phone'].'<br>
											  ------Address------
														<div>'.$value['address'].',<br>
											             '.$value['city'].',<br> 
														 '.$value['zip'].',<br> 
														 '.$value['state'].',<br> 
														 '.$value['country'].'.
									
										  </div></td>';
									echo '<td>'
										  .$value['date'].'<br>'
										  .$value['time'].
										  '</td>';
									echo '<td>';
									for($i=0;$i<count($order_detail_list);$i++){
										$order_detail = $order_detail_list[$i];
										if($order_detail['status'] == 'order cancelled'){
										echo '<span class="label label-danger">'.$order_detail['status'].'</span><br>----------------<br><br><br><br><br><br><br><br>';
										}
										if($order_detail['status'] == 'cancelled (user)'){
										echo '<span class="label label-danger">'.$order_detail['status'].'</span><br>----------------<br><br><br><br><br><br><br><br>';
										}
										else if($order_detail['status'] == 'order shipped'){
										echo '<span class="label label-success">'.$order_detail['status'].'</span><br>----------------<br><br><br><br><br><br><br><br>';
										}
										else{
										echo '<span class="label label-info">'.$order_detail['status'].'</span><br>----------------<br><br><br><br><br><br><br><br>';
										}
									}
									echo '</td>';
									echo '<td>';
									for($i=0;$i<count($order_detail_list);$i++){
										$order_detail = $order_detail_list[$i];
										if($order_detail['status'] == 'order cancelled'){
											echo 'Order Closed<br>----------------<br><br><br><br><br><br><br>';
											
											
										}
										else if($order_detail['status'] == 'cancelled (user)'){
											echo 'Order cancelled by user<br>----------------<br><br><br><br><br><br><br>';
											
											
										}
										else if($order_detail['status'] == 'order shipped'){
											echo 'Order Shipped<br>----------------<br><br><br><br><br><br><br>';
											
										}
										else{
											echo '<a class="btn btn-okay" onclick="'.'proceed('.$key.','.$i.');'.'"><i class="fa fa-times-check"></i> Proceed</a><br><br><a class="btn btn-danger" onclick="'.'cancel('.$key.','.$i.');'.'"><i class="fa fa-times-circle"></i> Cancel</a>
											<br>----------------<br><br><br><br><br>';
											
										}
									}
									echo '</td>';
									echo '</tr>';
									
								}
									  
									
									   echo '</tbody>';
							}
						?>
						
					</table>
                </div>
                <div id="ship_table" class="table-responsive" style="display:none">
                	<div id="buttons_2" align="center" >
						<a id="new_button" class="button alt" onclick="load('new');">New Orders</a>
						<a id="ship_button" class="button" onclick="load('ship');">Shipped Orders</a>
						<a id="cancel_button" class="button alt" onclick="load('cancel');">Cancelled Orders</a>
					</div>
					<br>
					<table class="table table-hover">
						<?php 
							if (file_exists('../shipped_orders.json') == 0){
								echo "<h3 align='center'>You have no orders.</h3>";
							}
							else {
								$file_name = '../shipped_orders.json';
								$str = file_get_contents($file_name);
								$json = json_decode($str, true);
								$root = array_keys($json)[0];
								$orders = $json[$root];
								
								echo '<thead>
										<tr>
											<th>Order ID</th>
											<th>Product</th>
											<th>User</th>
											<th>Date/Time</th>
											<th>Status</th>
										</tr>
									  </thead>
									<tbody>';
								foreach($orders as $key => $value){
									$order_detail_list = $value['order_detail'];
									echo '<tr>
                                                <th># '.$key.'</th>
												<td>';
									for($i=0;$i<count($order_detail_list);$i++){
										$order_detail = $order_detail_list[$i];
										 			echo 'Product ID : '.$order_detail['product_id'].'<br>
													Product name : '.$order_detail['product_name'].'<br>
													Product category : '.$order_detail['product_category'].'<br>
													Product subcategory : '.$order_detail['product_subcategory'].'<br>
													Product price : '.$order_detail['sold_price'].'<br>
													Product quantity : '.$order_detail['product_quantity'].'<br>
													Total : '.$order_detail['subtotal'].'<br>----------------<br>';
												
									}
									echo '</td>';
									echo '<td>Name : '.$value['name'].'<br>
											  Email : '.$value['email'].'<br>
											  Phone : '.$value['phone'].'<br>
											  ------Address------
														<div>'.$value['address'].',<br>
											             '.$value['city'].',<br> 
														 '.$value['zip'].',<br> 
														 '.$value['state'].',<br> 
														 '.$value['country'].'.
									
										  </div></td>';
									echo '<td>'
										  .$value['date'].'<br>'
										  .$value['time'].
										  '</td>';
									echo '<td>';
									for($i=0;$i<count($order_detail_list);$i++){
										$order_detail = $order_detail_list[$i];
										if($order_detail['status'] == 'order cancelled'){
										echo '<span class="label label-danger">'.$order_detail['status'].'</span><br>----------------<br><br><br><br><br><br><br><br>';
										}
										if($order_detail['status'] == 'cancelled (user)'){
										echo '<span class="label label-danger">'.$order_detail['status'].'</span><br>----------------<br><br><br><br><br><br><br><br>';
										}
										else if($order_detail['status'] == 'order shipped'){
										echo '<span class="label label-success">'.$order_detail['status'].'</span><br>----------------<br><br><br><br><br><br><br><br>';
										}
										else{
										echo '<span class="label label-info">'.$order_detail['status'].'</span><br>----------------<br><br><br><br><br><br><br><br>';
										}
									}
									echo '</td>';
									echo '</tr>';
									
								}
									  
									
									   echo '</tbody>';
							}
						?>
						
					</table>
                </div>
                <div id="cancel_table" class="table-responsive" style="display:none">
                	<div id="buttons_3" align="center">
						<a id="new_button" class="button alt" onclick="load('new');">New Orders</a>
						<a id="ship_button" class="button alt" onclick="load('ship');">Shipped Orders</a>
						<a id="cancel_button" class="button" onclick="load('cancel');">Cancelled Orders</a>
					</div>
					<br>
					<table class="table table-hover">
						<?php 
							if (file_exists('../cancelled_orders.json') == 0){
								echo "<h3 align='center'>You have no orders.</h3>";
							}
							else {
								$file_name = '../cancelled_orders.json';
								$str = file_get_contents($file_name);
								$json = json_decode($str, true);
								$root = array_keys($json)[0];
								$orders = $json[$root];
								
								echo '<thead>
										<tr>
											<th>Order ID</th>
											<th>Product</th>
											<th>User</th>
											<th>Date/Time</th>
											<th>Status</th>
										</tr>
									  </thead>
									<tbody>';
								foreach($orders as $key => $value){
									$order_detail_list = $value['order_detail'];
									echo '<tr>
                                                <th># '.$key.'</th>
												<td>';
									for($i=0;$i<count($order_detail_list);$i++){
										$order_detail = $order_detail_list[$i];
										 			echo 'Product ID : '.$order_detail['product_id'].'<br>
													Product name : '.$order_detail['product_name'].'<br>
													Product category : '.$order_detail['product_category'].'<br>
													Product subcategory : '.$order_detail['product_subcategory'].'<br>
													Product price : '.$order_detail['sold_price'].'<br>
													Product quantity : '.$order_detail['product_quantity'].'<br>
													Total : '.$order_detail['subtotal'].'<br>----------------<br>';
												
									}
									echo '</td>';
									echo '<td>Name : '.$value['name'].'<br>
											  Email : '.$value['email'].'<br>
											  Phone : '.$value['phone'].'<br>
											  ------Address------
														<div>'.$value['address'].',<br>
											             '.$value['city'].',<br> 
														 '.$value['zip'].',<br> 
														 '.$value['state'].',<br> 
														 '.$value['country'].'.
									
										  </div></td>';
									echo '<td>'
										  .$value['date'].'<br>'
										  .$value['time'].
										  '</td>';
									echo '<td>';
									for($i=0;$i<count($order_detail_list);$i++){
										$order_detail = $order_detail_list[$i];
										if($order_detail['status'] == 'order cancelled'){
										echo '<span class="label label-danger">'.$order_detail['status'].'</span><br>----------------<br><br><br><br><br><br><br><br>';
										}
										else if($order_detail['status'] == 'cancelled (user)'){
										echo '<span class="label label-danger">'.$order_detail['status'].'</span><br>----------------<br><br><br><br><br><br><br><br>';
										}
										else if($order_detail['status'] == 'order shipped'){
										echo '<span class="label label-success">'.$order_detail['status'].'</span><br>----------------<br><br><br><br><br><br><br><br>';
										}
										else{
										echo '<span class="label label-info">'.$order_detail['status'].'</span><br>----------------<br><br><br><br><br><br><br><br>';
										}
									}
									echo '</td>';
									echo '</tr>';
									
								}
									  
									
									   echo '</tbody>';
							}
						?>
						
					</table>
                </div>
			</div>
		</div>	
	</body>
</html>


