<?php
require_once('function.php');
dbconnect();
session_start();

if (!is_user()) {
	redirect('index.php');
}

?>

		

<?php
 $user = $_SESSION['username'];
$usid = $pdo->query("SELECT id FROM users WHERE username='".$user."'");
$usid = $usid->fetch(PDO::FETCH_ASSOC);
 $uid = $usid['id'];
 include ('header.php');
 ?>



 
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View Measurement</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                
                <div class="col-md-10 col-md-offset-1">
				
		
                    <div class="form-group">
<p style="font-weight:100; color:#666; font-size:24px;">					
					<?php
$id = $_GET["id"];
$dda = $pdo->query("SELECT fullname,sex FROM customer where id = '$id'");
$dda = $dda->fetch(PDO::FETCH_ASSOC);
    
    echo($dda['fullname']);
?></p>

</div>
              
        <?php
$type = $pdo->query("SELECT id, title FROM type where sex= '$dda[sex]'");

while ($typee = $type->fetch(PDO::FETCH_ASSOC))
{
	echo('<br/><br/><br/><div><p style="font-size:22px; color="#000"; font-weight="700"">'.$typee['title'].'</p><br/>');
	 echo('<table>'); 
	$ddaa = $pdo->query("SELECT id, title, image FROM part where type='$typee[id]'");
    while ($data = $ddaa->fetch(PDO::FETCH_ASSOC))
    {
		$mes = $pdo->query("SELECT measurement FROM measurement where customer_id = '$id' AND part_id = '$data[id]'");
		$mes = $mes->fetch(PDO::FETCH_ASSOC);
		if(!$data['image']) $data['image']="tailor.png";
		$img = 'img/part/'.$data['image'];
		echo "<tr><td style='width:100px; height: 40px; margin: 20px;'><a href='$img'><img src='$img' width='50px' /></a></td><td style='width:200px; height: 40px; margin: 20px;'><label><a href='partedit.php?id=$data[id]'>$data[title]</a></label></td>";
		echo "<td><input type='text' name='$data[id]' value='$mes[measurement]' style='width:200px; height: 40px; margin: 20px;' /></td></tr>";
		
	}
	echo('</table>'); 
	echo('</div>');
}
?> 
      
    
				
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
	    



<script src="js/bootstrap-timepicker.min.js"></script>


<script>
jQuery(document).ready(function(){
    
  
  jQuery("#ssn").mask("999-99-9999");
  
  // Time Picker
  jQuery('#timepicker').timepicker({defaultTIme: false});
  jQuery('#timepicker2').timepicker({showMeridian: false});
  jQuery('#timepicker3').timepicker({minuteStep: 15});

  
});
</script>







<?php
 include ('footer.php');
 ?>