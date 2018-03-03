<?php session_start(); 
if(!isset($_SESSION["username"])){
	$_SESSION['go']=2;
	echo '<script language="javascript">
	alert("You need to Sign In to use this feature!!!")
	window.location.href="login.php"
	</script>';
}
?>
<html>
<head>
<style>
   .menu {
      float:left;
      width:15%;
      height:100%;
    }
    .topBar{
    	float: left;
    	width: 85%;
    	height: 10%;
    }
    .mainContent {
      float:left;
      width:85%;
      height: 90%;
    }
  </style>
  <script type="text/javascript">
  	function load_pages(choice){
  		if (choice == "preview-products"){
  			document.getElementById("mainContent").innerHTML='<iframe width=100% height=100% src="preview-products-admin.php" ></iframe>';
  		}
  		else if (choice == "download-products"){
  			document.getElementById("mainContent").innerHTML='<iframe width=100% height=100% src="download-product-data.php" ></iframe>';
  		}
  		else if (choice == "update-products"){
  			document.getElementById("mainContent").innerHTML='<iframe width=100% height=100% src="update-product-admin.php" ></iframe>';
  		}
  		else if (choice == "delete-products"){
  			document.getElementById("mainContent").innerHTML='<iframe width=100% height=100% src="delete-product-admin.php" ></iframe>';
  		}
  		else if (choice == "add-products"){
  			document.getElementById("mainContent").innerHTML='<iframe width=100% height=100% src="add-product-admin.php" ></iframe>';
  		}
  	}
  </script>
</head>
<body>
	<div class="menu" id="menu">
		<button onclick="load_pages('preview-products');">preview products</button><br>
		<button onclick="load_pages('download-products');">download data in excel</button><br>
		<button onclick="load_pages('update-products');">Update product data</button><br>
		<button onclick="load_pages('delete-products');">Delete product</button><br>
		<button onclick="load_pages('add-products');">Add product</button><br>
	</div>
	<div class="topBar" id="topBar">
		<a href="change-pass.php">change password</a>
		<a href="logout.php">logout</a>
		NOTIFICATIONS
	</div>
  	<div class="mainContent" id="mainContent"></div>
</body>
</html>