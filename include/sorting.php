<div id="choose-block">
	<form action="index.php" method="post">
		<select name="band_color">

			<option value="">Band Color</option>
			<!-- <option value="Silver">Silver</option>
			<option value="Golden">Golden</option>
			<option value="Brown">Black</option>
			<option value="Silver & Golden">Silver & Golden</option>
			<option value="Silver & RoseGolden">Silver & RoseGolden</option>
			<option value="Gun Metal">Gun Metal</option>
			<option value="White">White</option>
			<option value="Dark Blue">Dark Blue</option>
			<option value="Other Colors">Other Colors</option>  -->
			<?php 	
			$query_band_color = "SELECT BAND_COLOR FROM PRODUCTS_BANDS GROUP BY BAND_COLOR";
			$band_color = oci_parse($connection,$query_band_color);
			oci_execute($band_color);
			while (($band_colors = oci_fetch_assoc($band_color)) != false) {
				if ($band_colors['BAND_COLOR'] != "") {
					if ($band_colors['BAND_COLOR'] != "Null") {
						# code...
						echo "<option value = '".$band_colors['BAND_COLOR']."''>".$band_colors['BAND_COLOR']."</option>";
					}
			    }
			}
			echo "<option value = '".'Null'."''>".'Other colors'."</option>";

			 ?>
		</select>
		<select name="band_matterial">
		<option value="">Brand Material</option>
		<?php 	
			$query_band = "SELECT BAND_MATERIAL FROM PRODUCTS_BANDS GROUP BY BAND_MATERIAL";
			$band = oci_parse($connection,$query_band);
			oci_execute($band);
			while (($bands = oci_fetch_assoc($band)) != false) {
			    if ($bands['BAND_MATERIAL'] != "") {
			    	if ($bands['BAND_MATERIAL'] !== 'Null') {
			    		echo "<option value = '".$bands['BAND_MATERIAL']."''>".$bands['BAND_MATERIAL']."</option>";
			    }
			    
            }}
            echo "<option value = '".'Null'."''>".'Other materials'."</option>";
        

            

		 ?>
		</select>
		<select name="case_size">
			<option value="">Case size</option>
			<option value="between 20 and 25">XS(20-25mm)</option>
			<option value="between 26 and 32">S(26-32mm)</option>
			<option value="between 33 and 41">M(33-41mm)</option>
			<option value="between 42 and 47">L(42-47mm)</option>
			<option value="between 48 and 57">XL(48-57mm)</option>
		</select>
		<select name="gender">
			<option value="">Gender</option>
			<option value="Kids">Kids</option>
			<option value="Men">Men</option>
			<option value="Women">Women</option>
		</select>
		<select name="movement_type">
			<option value="">Movement Type</option>
			<?php 	
			$query_category = "SELECT MOVEMENT_TYPE FROM PRODUCTS_CATEGORYS  GROUP BY MOVEMENT_TYPE";
			$category = oci_parse($connection,$query_category);
			oci_execute($category);
			while (($categorys = oci_fetch_assoc($category)) != false) {
			    if ($categorys['MOVEMENT_TYPE'] != "") {
			    	if ($categorys['MOVEMENT_TYPE'] != "Null") {
			    	
			    	echo "<option value = '".$categorys['MOVEMENT_TYPE']."''>".$categorys['MOVEMENT_TYPE']."</option>";
			    
			    }
			    
            }
            echo "<option value = '".'Null'."''>".'Other types'."</option>";

        }

            

		 ?>
		</select>
		<select name="brand">
			<option value="">Brand</option>
		<?php 	
			$query_brand = "SELECT BRAND FROM PRODUCTS_BRANDS GROUP BY BRAND";
			$brand = oci_parse($connection,$query_brand);
			oci_execute($brand);
			while (($brands = oci_fetch_assoc($brand)) != false) {
			    if ($brands['BRAND'] != "") {
			    	//echo "<option value = '".$brands['BRAND']."''>".$brands['BRAND']."</option>";
			            if ($brands['BRAND'] != "Null") {
			    	      echo "<option value = '".$brands['BRAND']."''>".$brands['BRAND']."</option>";
			           }
            }
        }
        echo "<option value = '".'Null'."''>".'Other brands'."</option>";


            

		 ?>
	
		</select>
		<select name="price">
			<option value="">Price</option>
			<option value="between 0 and 10000">0-10000Tg</option>
			<option value="between 10001 and 20000">10000-20000Tg</option>
			<option value="between 20001 and 40000">20000-40000Tg</option>
			<option value="between 40001 and 80000">40000-80000Tg</option>
			<option value=" > 80000">greater 80000Tg</option>
		</select>
		<input type="submit" name="enter" value="Find" />
	</form>
</div>

<?php

?>

