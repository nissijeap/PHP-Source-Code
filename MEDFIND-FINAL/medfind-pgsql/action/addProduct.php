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

if (isset($_POST['create'])) {
	include "../constant/connect.php";
    include "../test.php"; ?>

  <?php
 
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}


if($_POST) {	

  $med_name =validate($_POST['med_name']);
  $med_quan =validate($_POST['med_quan']);
  $med_price=validate($_POST['med_price']);
  $med_pack =validate($_POST['med_pack']);
  $med_dosage = validate($_POST['med_dosage']);
  $med_class = validate($_POST['med_class']);
  $med_stat ="";
  $med_exp	=validate($_POST['med_exp']);
  $med_added=date('Y-m-d');
 
  if($med_quan == 0){
	$med_stat = "Not Available";
} else {
	$med_stat = "Available";
}


$sql = "CALL add_medpharm('$med_name', '$med_quan', '$med_price', '$med_stat', '$med_added', '$med_exp', '$pharm')";
				

    if (pg_query($dbconn, $sql)) { 
      /*echo "<script>setTimeout(\" location.href = '../product.php';\",1500);</script>";
      //echo "<script> alert('Medicine Successfully Added'); window.location='../product.php'; </script>";*/
        echo '<div class="popup popup--icon -success js_success-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                    Success 
                    </h1>
                    <p>Medicine Added Successfully</p>
                    <p>
                    <p> ';
                    echo  "<script>setTimeout(\"location.href = '../product.php';\",1500);</script>";
                        
                    echo '</p>
                    </div>
                </div>';
     } else { ?>
            <div class="popup popup--icon -error js_error-popup popup--visible">
                <div class="popup__background"></div>
                <div class="popup__content">
                    <h3 class="popup__content__title">
                    Error Adding Medicine
                    </h1>
                    <p>Error Adding Medicine</p>
                    <p>
                    <a href="../add-product.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
                    </p>
                </div>
                </div>
			<?php }


} 
}
?>
