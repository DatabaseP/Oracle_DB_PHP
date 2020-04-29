<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dmo Admin</title>
</head>
<body>
<form action="demoadmin.php" method="post" enctype="multipart/form-data">
  <label for="title">Title:</label>
  <input type="text" id="title" name="title"><br><br>

  <label for="price">Price:</label>
  <input type="text" id="price" name="price"><br><br>

  <label for="fileToUpload">Images:</label>
  <input type="file" id="file" name="file"><br><br>

  <label for="brand">Brand:</label>

     <select name="brand" id="">
     	<option value="Null">Brand</option>
     	<option value="Alba">Alba</option>
     	<option value="Kalvin Klein">Kalvin Klein</option>
     	<option value="Casio">Casio</option>
     	<option value="Citizen">Citizen</option>
     	<option value="Di Milano">Di Milano</option>
     	<option value="Diesel">Di Milano</option>
     	<option value="Edifice">Edifice</option>
     	<option value="Emporio Armany">Emporio Armany"</option>
     	<option value="Esprit">Esprit</option>
     	<option value="Ferucci">Ferucci</option>
     	<option value="Fossil">Fossil</option>
     	<option value="G-Shock">Huawei</option>
     	<option value="Just Cavalli">Just Cavallii</option>
     	<option value="Lacoste">Lacoste</option>
     	<option value="Michael Kors">Michael Kors</option>
     	<option value="MVMT">MVMT</option>
     	<option value="Olivia Burton">Olivi Burton</option>
     	<option value="Orient">Orient</option>
     	<option value="G&G">G&G</option>
     	<option value="Slazenger">Slazenger</option>
     	<option value="Swatch">Swatch</option>
     	<option value="Swiss MIlitary">Swiss</option>
     	<option value="Tissot">Tissot</option>
     </select>
  <br><br>

  <label for="movement_type">Movement_Type:</label>
  <select name="movement_type" id="">
  	<option value="Null">Movement Type</option>
  	<option value="Anolog Quarty (Battery)"></option>
  	<option value="Digital">Digital</option>
  	<option value="Analog with Digital">Analog with Digital</option>
  	<option value="Automatic">Automatic</option>
  </select>

  <label for="gender">Gender:</label>
  <select name="gender">
		<option value="Null">Gender</option>
		<option value="Kids">Kids</option>
		<option value="Men">Men</option>
		<option value="Women">Women</option>
	</select><br><br>

	<label for="guarantee">Guarantee</label>
	<input type="text" name="guarantee"><br><br>

	<label for="water_resistant">Water resistant</label>
	<input type="text" name="water_resistant"><br><br>

	<label for="dial_color">Dial color:</label>
	<input type="text" name="dial_color"><br><br>

	<label for="band_size">Band Size</label>
	<input type="text" name="band_size"><br><br>

	<label for="band_material">Band Material</label>
	<select name="band_material" id="">
		<option value="Null">Band Material</option>
		<option value="Metal">Metal</option>
		<option value="Titanium">Titanium</option>
		<option value="Leather">Leather</option>
		<option value="Rubber/Resin">Rubber/Resin</option>
		<option value="Cloth">Cloth</option>
	</select><br><br>

	<label for="band_color">Band Color</label>
	<select name="band_color" id="">
		<option value="Null">Band Color</option>
		<option value="Silver">Silver</option>
		<option value="Golden">Golden</option>
		<option value="Black">Black</option>
		<option value="Brown">Brown</option>
		<option value="RoseGold">RoseGold</option>
		<option value="Silver & Golden">Silver & Golden</option>
		<option value="Silver & Rosegold">Silver & Rosegold</option>
		<option value="Gun Metal">Gun Metal</option>
		<option value="White">White</option>
		<option value="Dark Blue">Dark Blue</option>
		<option value="Other Colors">Other Colors</option>
	</select><br><br>


	<label for="case_size">Case Size</label>
	<input type="text" name="case_size"><br><br>


	<label for="band_thicknes">Case Thicknes</label>
	<input type="text" name="case_thicknes"><br><br>


	<label for=case_material>Case Material</label>
	<input type="text" name="case_material"><br><br>






  <input type="submit" value="Submit" name="submit">

</form>
	
</body>
</html>
<?php




// Check if image file is a actual image or fake image

if(isset($_POST["submit"])) {
	// Start upload
    $file = $_FILES['file'];
    //print_r($file);
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType= $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed  = array('jpg','jpeg','png','pdf');
    if (in_array($fileActualExt, $allowed)) {
    	# code...
    	if ($fileError === 0) {
    		if ($fileSize < 1000000) {
    			$fileNameNew = uniqid('',true).".".$fileActualExt;
    			# code...
    			$fileDestination = 'upload_images/'.$fileName;//Фотолар кайжерге тусетинин корсетеди
    			move_uploaded_file($fileTmpName, $fileDestination);
    			echo "Succes<br>";
    		}
    		else{
    			echo "Your file so big<br>";
    		}
    		# code...
    	}
    	else{
    		echo "There was an error uploading your file<br>";
    	}


    }
    else{
    	echo "you cannot upload this type file<br>";
    }
    if ($_FILES['file']['size'] == 0) {
    	$fileName = 'Null';

    }
    // End upload

    //Start dannilardi input arkili alu
    $input = array(
    	'title',
    	'price',
    	'brand',
    	'movement_type',
    	'gender',
    	'guarantee',
    	'water_resistant',
    	'dial_color',
    	'band_size',
    	'band_material',
    	'band_color',
    	'case_size',
    	'case_thicknes',
    	'case_material'
    );
    $get_data = array();
    $t = 0;

    $arrlength = count($input);
    for($x = 0; $x < $arrlength ; $x++) {
    	if ($t  === 2) {
    		$get_data[$t] = $fileName;
    		$get_data[$t + 1] = $_POST[$input[$x]];
    		$t++;
    	}
    	else{
    		if (strlen($_POST[$input[$x]])==0) {
    			if ($t===1) {
    				$get_data[$t] = '8000'; //Price degen sebebi bul eshkahsan null bolmau kerek
    			}
    			else if ($t===0) {
    				$get_data[$t] = 'Not Name';
    			}
    			else{
    				$get_data[$t] = 'Null';
    			}
    			
    		}
    		else{
    			$get_data[$t] = $_POST[$input[$x]];
    		}
    	}
    	$t++;
    }
    //End dannilardi input arkili alu
    $s = 0;
    foreach ($get_data as  $value) {
    	echo $value." ".$s."<br>";
    	$s++;
    }

    // Start products table ge productidi tigamiz

   $insert_products = 'INSERT INTO PRODUCTS (PRODUCT_ID, TITLE, PRICE, DATETIME, LOGO_IMAGES, BRAND,MOVEMENT_TYPE) VALUES ( (SELECT COUNT(PRODUCT_ID) FROM PRODUCTS)+1,';
   for ($i = 0; $i < 5 ; $i++) { 
   	   if ($i==1) {
   	   	$insert_products .= $get_data[$i].", ";
   	   	    $i++;
   	   }
   	   if ($i == 2) {
   	   		$insert_products .="SYSDATE, ";
   	   }

   		$insert_products .= "'".$get_data[$i]."'";
   		if ($i !== 4) {
   			$insert_products .=","; 

   		}

   }
   $insert_products .= ")";

   echo $insert_products."<br>";
   echo count($get_data)."<br>";

   //End products tabdle

   $insert_features = 'INSERT INTO PRODUCTS_FEATURES(FEATURE_ID,GENDER,GUARANTEE,WATER_RESISTANT,DIAL_COLOR,BAND_SIZE,BAND_MATTERIAL,BAND_COLOR,CASE_SIZE,CASE_THICKNES,CASE_MATERIAL) VALUES ((SELECT COUNT(FEATURE_ID) FROM PRODUCTS_FEATURES)+1,';

   for ($i = 5; $i < 14; $i++) { 
   	# code...
   	 if ($i===6  || $i===7   || $i===9  || $i===12 || $i===13 ) {
   	 	$x =( $get_data[$i]==='Null' ? (rand(10,50)) : $get_data[$i]);
   	   	$insert_features .= $x.", ";
   	   }
   		else{
   			$insert_features .= "'".$get_data[$i]."'"." ,";
   		}
   		echo $get_data[$i]."<br>";
   }
   $insert_features .= "'".$get_data[14]."' )"; 

   echo  $insert_features."<br>";

   $insert_brands = "INSERT INTO PRODUCTS_BRANDS(BRAND_ID,BRAND) VALUES ((SELECT COUNT(BRAND_ID) FROM PRODUCTS)+1, '".$get_data[3]."' )";
   echo $insert_brands."<br>";

   $insert_type = "INSERT INTO PRODUCTS_CATEGORYS(CATEGORY_ID,MOVEMENT_TYPE) VALUES ((SELECT COUNT(CATEGORY_ID) FROM PRODUCTS)+1, '".$get_data[4]."' )";

   echo $insert_type."<br>";

   $insert_band = "INSERT INTO PRODUCTS_BANDS(BAND_ID,BAND_COLOR,BAND_MATERIAL) VALUES ((SELECT COUNT(BAND_ID) FROM PRODUCTS_BANDS)+1, '".$get_data[11]."', '".$get_data[10]."' )";
   echo $insert_band;


    include("include/db_connect.php");
    $products= oci_parse($connection,$insert_products);
	oci_execute($products);

	$brand = oci_parse($connection, $insert_brands);
	oci_execute($brand);

	$band = oci_parse($connection, $insert_band);
	oci_execute($band);

	$features = oci_parse($connection, $insert_features);
	oci_execute($features);

	$type = oci_parse($connection, $insert_type);
	oci_execute($type);




	

}


?>

