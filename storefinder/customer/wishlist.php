 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"> 
    <!-- Main content -->
    <section class="content">
      <div class="row"> 
        <!-- /.col -->
        <?php if (!isset($_GET['p'])) {  ?>
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Wish List</h3> 
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="table-responsive mailbox-messages">
                <table id="dash-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
                    <thead>
                      <tr>  
                        <th>Product</th>
                        <th>Description</th>
                        <th>Price</th> 
                        <!-- <th>Expired Date</th>  -->
                        <th>Categories</th>
                        <!-- <th>Status</th>  -->
                      </tr> 
                    </thead> 
                    <tbody>
                      <?php 
                       // `COMPANYID`, `OCCUPATIONTITLE`, `REQ_NO_EMPLOYEES`, `SALARIES`, `DURATION_EMPLOYEMENT`, `QUALIFICATION_WORKEXPERIENCE`, `JOBDESCRIPTION`, `PREFEREDSEX`, `SECTOR_VACANCY`, `JOBSTATUS`
                       $sql ="SELECT * FROM `tblwishlist` w, `tblproduct` p, `tblcategory` c WHERE w.`ProductID`=p.`ProductID` AND p.`CategoryID`=c.`CategoryID` AND `CustomerID`=".$_SESSION['CustomerID'];
                        $mydb->setQuery($sql);
                        $cur = $mydb->loadResultList(); 
                      foreach ($cur as $result) {

                        // $expiry_date = $result->DateExpire;
                        // $today = date('d-m-Y',time()); 
                        // $exp = date('d-m-Y',strtotime($expiry_date));
                        // $expDate =  date_create($exp);
                        // $todayDate = date_create($today);
                        // $diff =  date_diff($todayDate, $expDate);
                        // if($diff->format("%R%a")>0){

                        // $expStatus =  "active";
                        // }else{
                        // $expStatus =  "Expired";
                        // }
                          echo '<tr>'; 
                          echo '<td><a href="'.web_root.'index.php?q=products&id='.$result->ProductID.'">'. $result->ProductName.'</a></td>';
                          echo '<td>' . $result->Description.'</a></td>';
                          echo '<td>' . $result->Price.'</a></td>';  
                          // echo '<td>'. $result->DateExpire.'</td>';
                          echo '<td>'. $result->Categories.'</td>';  
                          // echo '<td>'. $expStatus.'</td>';   
                          echo '</tr>';
                      } 
                      ?>
                    </tbody>
                    
                  </table> 
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div> 
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
        <?php }else{
          require_once ("viewjob.php");          
        } ?>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
   
 