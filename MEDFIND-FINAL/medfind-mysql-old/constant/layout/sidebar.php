 <?php 
 include ('./constant/connect.php');
 ?>
        <div class="left-sidebar">
            
            <div class="scroll-sidebar">
                
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label" style="margin-top: 50px">Home</li>
                        <li> <a href="dashboard.php" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li> 

                        <li> <a href="pharm_prof.php" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Profile</span></a>
                        </li> 

                        <li> <a href="brand.php" aria-expanded="false"><i class="fa fa-industry"></i><span class="hide-menu">Packages</span></a>
                        </li> 

                        <li> <a href="categories.php" aria-expanded="false"><i class="fa fa-list"></i><span class="hide-menu">Classification</span></a>
                        </li> 
                    
                    <?php if(isset($_SESSION['userId'])) { ?>
                        <li> <a class="has-arrow" href="#" aria-expanded="false"><i class="fa fa-medkit"></i><span class="hide-menu">Medicine</span></a>
                            <ul aria-expanded="false" class="collapse">
                           
                                <li><a href="add-product.php">Add Medicine</a></li>
                           
                                <li><a href="product.php">Manage Medicine</a></li>

                                <li><a href="expired.php">Expired Medicines</a></li> 
                            </ul>
                        </li>
                    <?php }?>

                         
                        <?php if(isset($_SESSION['userId'])) { ?>

                  <?php }?>

                         
                    <?php if(isset($_SESSION['userId'])) { ?>
                                <li> <a href="./constant/logout.php" aria-expanded="false"><i class="fa fa-power-off"></i><span class="hide-menu">LOG OUT</span></a>
                            </ul>
                        </li>
                    <?php }?>


    
                    </ul>   
                </nav>
                
            </div>
            
        </div>
        