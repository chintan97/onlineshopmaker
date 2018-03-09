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
                    <li class="active"><a href="#">Home</a>
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
								echo '<li><a href="category.php">'.$category[$j].'</a></li>';
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
									<h5>'.$subcat.'</h5>
									<ul>';
										for($k=0;$k<count($json[$shopname][$cat][$subcat]);$k++){
											if($k>3){
												echo '<li><a href="category.php">More</a></li>';
												break;
											}
											else{
												$subsubcat = array_keys($json[$shopname][$cat][$subcat])[$k];
												echo '<li><a href="category.php">'.$subsubcat.'</a></li>';
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
                    <a href="basket.php" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">cart</span></a>
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
                        <input type="text" class="form-control" placeholder="Search">
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