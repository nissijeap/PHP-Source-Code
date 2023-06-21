 <?php 
 include ('./constant/connect.php');
 ?>
        <div class="left-sidebar">
            
            <div class="scroll-sidebar">
                
                <nav class="sidebar-nav">
                    <?php if($pharm == 3){?>

                        <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label" style="margin-top: 50px">Home</li>
                        <li> <a href="super-dashboard.php" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>

                        <li> <a href="super-users.php" aria-expanded="false"><i class="fa fa-user-md"></i><span class="hide-menu">Users</span></a>
                        </li>

                        <li> <a href="super-pharmacy.php" aria-expanded="false"><i class="fa fa-hospital-o"></i><span class="hide-menu">Pharmacies</span></a>
                        </li> 

                        <li> <a href="super-brand.php" aria-expanded="false"><i class="fa fa-industry"></i><span class="hide-menu">Packages</span></a>
                        </li> 

                        <li> <a href="super-categories.php" aria-expanded="false"><i class="fa fa-list"></i><span class="hide-menu">Classifications</span></a>
                        </li> 
                    
                        <li> <a href="super-product.php" aria-expanded="false"><i class="fa fa-medkit"></i><span class="hide-menu">Medicines</span></a>
                        </li> 


                         
                    <?php if(isset($_SESSION['userId'])) { ?>
                                <li> <a href="./constant/logout.php" aria-expanded="false"><i class="fa fa-power-off"></i><span class="hide-menu">LOG OUT</span></a>
                            </ul>
                        </li>
                    <?php }?>


    
                    </ul>   

                        <?php } else { ?>
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label" style="margin-top: 50px">Home</li>
                        <li> <a href="dashboard.php" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li> 

                        <li> <a href="pharm_prof.php" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Profile</span></a>
                        </li> 

                        <li> <a href="product.php" aria-expanded="false"><i class="fa fa-medkit"></i><span class="hide-menu">All Medicines</span></a>
                        </li> 

                        <li> <a href="add-product.php" aria-expanded="false"><i class="fa fa-plus-circle"></i><span class="hide-menu">Add Medicine</span></a>
                        </li> 

                        <li> <a href="available.php" aria-expanded="false"><i class="fa fa-check-circle"></i><span class="hide-menu">Available Medicines</span></a>
                        </li> 

                        <li> <a href="stock.php" aria-expanded="false"><i class="fa fa-times-circle"></i><span class="hide-menu">Out of Stock</span></a>
                        </li> 

                        <li> <a href="expired.php" aria-expanded="false"><i class="fa fa-exclamation-circle"></i><span class="hide-menu">Expired Medicines</span></a>
                        </li> 


                         
                        <?php if(isset($_SESSION['userId'])) { ?>

                  <?php }?>

                         
                    <?php if(isset($_SESSION['userId'])) { ?>
                                <li> <a href="./constant/logout.php" aria-expanded="false"><i class="fa fa-power-off"></i><span class="hide-menu">LOG OUT</span></a>
                            </ul>
                        </li>
                    <?php }?>


    
                    </ul>   <?php } ?>
                </nav>
                
            </div>
            
        </div>
        