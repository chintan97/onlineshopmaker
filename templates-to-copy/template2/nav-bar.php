<script type="text/javascript">
	function show_results(str) {
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
		xmlhttp.open("GET","search_product.php?q="+str,true);
		xmlhttp.send();
	}
</script>

<div class="navbar navbar-default yamm" role="navigation" id="navbar">
    <div class="container">
        <div class="navbar-header">

            <a class="navbar-brand home" href="#" data-animate-hover="bounce">
                <h2 style="margin-top:6.5px;color:#3FA449;"><?php echo $shopname;?></h2><span class="sr-only"><?php echo $shopname.' - Homepage';?></span>
            </a>
            <div class="navbar-buttons">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
                <a class="btn btn-default navbar-toggle" href="basket.php">
                    <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">cart</span>
                </a>
            </div>
        </div>
        <!--/.navbar-header -->

        <div class="navbar-collapse collapse" id="navigation">

            <ul class="nav navbar-nav navbar-left">
                <li class="active"><a href="index.php">Home</a>
                </li>
				<?php
					for($i=0;$i<count($category);$i++){
						if($i>3){
							echo 
							'<li class="dropdown yamm-fw">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Other<b class="caret"></b></a>
								<ul class="dropdown-menu">
								<li>
									<div class="yamm-content">
										<div class="row"><div class="col-sm-3">
									<h5>Other</h5>
									<ul>';
							for($j=4;$j<count($category);$j++){
								echo '<li><a href="category.php?cat='.$category[$j].'&subcat=">'.$category[$j].'</a></li>';
							}
							echo '</ul>
									</div>
										</div>
									</div>
									<!-- /.yamm-content -->
								</li>
								</ul>
							</li>';		
							break;

						}
						else{
							$cat = $category[$i];
							echo 
							'<li class="dropdown yamm-fw">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">'.$cat.'<b class="caret"></b></a>
								<ul class="dropdown-menu">
								<li>
									<div class="yamm-content">
										<div class="row">';
							for($j=0;$j<count($json[$shopname][$cat]);$j++){
								$subcat = array_keys($json[$shopname][$cat])[$j];
								echo 
								'<div class="col-sm-3">
									<a href="category.php?cat='.$cat.'&subcat='.$subcat.'"><h5>'.$subcat.'</h5></a>
									<ul>';
										for($k=0;$k<count($json[$shopname][$cat][$subcat]);$k++){
											if($k>3){
												echo '<li><a href="category.php">More</a></li>';
												break;
											}
											else{
												$subsubcat = array_keys($json[$shopname][$cat][$subcat])[$k];
												$subsubcat_id = $json[$shopname][$cat][$subcat][$subsubcat]['product_id'];
												echo '<li><a href="detail.php?pro='.$subsubcat.'&id='.$subsubcat_id.'">'.$subsubcat.'</a></li>';
											}
										}
									echo '</ul>
								</div>';
							}
							
							echo '
										</div>
									</div>
									<!-- /.yamm-content -->
								</li>
							</ul>
						</li>';
						
						}
					}
                                        
                     
					?>
            </ul>

        </div>
        <!--/.nav-collapse -->

        <div class="navbar-buttons">

            <div class="navbar-collapse collapse right" id="basket-overview">
                <a href="basket.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">
                	<?php
                		if (isset($_SESSION['cart'])){
                			echo "cart(".count($_SESSION['cart']).")";
                		}
                		else {
                			$_SESSION['cart'] = [];
                			echo "cart(0)";
                		}
                	?>
                </span></a>
            </div>
            <!--/.nav-collapse -->

            <div class="navbar-collapse collapse right" id="search-not-mobile">
                <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>

        </div>

        <div class="collapse clearfix" id="search">

            <form class="navbar-form" role="search">
                <div class="input-group">
                    <input type="text" class="form-control" id="search_product" name="search_product" onkeyup="show_results(this.value);" placeholder="Search">
                    <div id="show_product" style="text-align: left;"></div>
                    <span class="input-group-btn">

						<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

		    		</span>
                </div>
            </form>

        </div>
        <!--/.nav-collapse -->

    </div>
        <!-- /.container -->
</div>
<!-- /#navbar -->