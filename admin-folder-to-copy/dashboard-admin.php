<?php 
	session_start(); 
	include('calculate-admin.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>dashboard</title>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script type="text/javascript">
		$(document).ready(function() {
		$('.count').each(function () {
	    $(this).prop('Counter',0).animate({
	        Counter: $(this).text()
	    }, {
	        duration: 2000,
	        easing: 'swing',
	        step: function (now) {
	            $(this).text(Math.ceil(now));
	        }
	    });
	});
	});
	</script>
	<style type="text/css">
		@import url(http://weloveiconfonts.com/api/?family=fontawesome);
		@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,300);

		/* fontawesome */
		[class*="fontawesome-"]:before {
		  font-family: 'FontAwesome', sans-serif;
		}
		.left {
		  float: left;
		}
		.clear {
		clear: both;
		}

		.buysblock {
		  background: rgb(38,168,226);
		}
		.customerblock {
		  background: rgb(39,183,121);
		}
		.shoppingblock{
			background: rgb(37,183,151);
		}
		.productsblock{
			background: rgb(37,183,201);
		}
		.count{
			color: #FFFFFF;
			font-size: 70px;
			text-align: center;
		}
		.metroblock {
		  width: 20em;
		  height: 10em;
		  padding: 2em 0em 1em 1em;
		  color: #fff;
		  font-family: 'Open Sans', sans-serif;
		  margin: 0.3em;
		  text-align: center;
		}

		.metroblock h1, .metroblock h2, .metroblock .icon {
		  font-weight: 300;
		  margin: 0;
		  padding: 0;
		}
		.metroblock h1, .metroblock .icon {
		  font-size: 6em;
		  text-align: center;
		}
		.metroblock .icon {
		  margin-right: .2em;
		}
	</style>
</head>
<body>

	<div class="metroblock buysblock left ">
	  <span class="icon fontawesome-briefcase left"></span>
	  <span class="count">0</span>
	  <div class="clear"></div>
	  <h2>New Orders</h2>
	</div>
	<div class="metroblock customerblock left ">
	  <span class="icon fontawesome-user left"></span>
	  <span class="count">0</span>
	  <div class="clear"></div>
	  <h2>Total customers</h2>
	</div>
	<div class="metroblock shoppingblock left ">
	  <span class="icon fontawesome-truck left"></span>
	  <span class="count">0</span>
	  <div class="clear"></div>
	  <h2>Total items sold</h2>
	</div>
	<div class="metroblock productsblock left ">
	  <span class="icon fontawesome-shopping-cart left"></span>
	  <span class="count" style="text-align: center;"><?php echo $_SESSION['total_products']; ?></span>
	  <div class="clear"></div>
	  <h2>Total products</h2>
	</div>

</body>
</html>	