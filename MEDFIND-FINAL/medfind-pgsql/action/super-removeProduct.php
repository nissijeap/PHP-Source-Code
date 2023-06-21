
<link rel="stylesheet" href="../assets/css/popup_style.css"> 
<style>

html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, div
pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, font, img, ins, kbd, q,
s, samp, small, strike, strong, sub, sup, tt, var, b, u, i, center, dl, dt, dd, ol, ul, li,
figure, header, nav, section, article, aside, footer, figcaption {
  margin: 0;
  padding: 0;
  border: 0;
  outline: 0;
  color: #fff;
}
</style>

<?php 	
include '../constant/connect.php';
include '../test.php';?>

<?php
$med_id = $_GET['id'];
		$sql1 = "select*from med_pharm where med_name = $med_id";
		$notdelete = pg_query($dbconn, $sql1);
		$notdeletefetch = pg_fetch_array($notdelete);

		if(pg_num_rows($notdelete) >= 1) { ?> 
			<!--echo "<script> alert('Medicine In-use. Do not remove'); window.location='../super-product.php'; </script>";-->
			<div class="popup popup--icon -error js_error-popup popup--visible">
			<div class="popup__background"></div>
			<div class="popup__content">
			  <h3 class="popup__content__title">
				Medicine In-use. Do not remove.
			  </h1>
			  <p>Error Adding Medicine</p>
			  <p>
			  <a href="../super-product.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
			  </p>
			</div>
		  </div>
		<?php } else{
	$sql = "CALL remove_medicine($med_id)";
	$delete = pg_query($dbconn, $sql);
	//echo "<script> alert('Medicine Removed Successfully'); window.location='../super-product.php'; </script>";
                echo '<div class="popup popup--icon -success js_success-popup popup--visible">
                        <div class="popup__background"></div>
                        <div class="popup__content">
                        <h3 class="popup__content__title">
                        Medicine Successfully Removed 
                </h1>
                <p>Medicine Successfully Removed</p>
                <p> ';
                echo  "<script>setTimeout(\"location.href = '../super-product.php';\",1500);</script>";
                    
                echo '</p>
            </div>
            </div>';
}

   //else if(pg_num_rows($querye)== 1) {
?>
