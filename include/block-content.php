
<div id="block-content">
		
		<ul  id="grid-content">
		<?php

		$search_by = "";
		if(isset($_GET['search'])) {
			$search_by = "WHERE p.title like '%".$_GET['q']."%'";
		}
		//echo $search_by;

		$sortby = isset($_GET['sort']) ? $_GET['sort'] : 'ORDER BY  P.PRODUCT_ID' ;

		$sort_name = '';
		if ($sortby == 'all-watch') {
		# code...
			$sortby = 'ORDER BY P.TITLE';
			$sort_name = 'All Watches';
		}
		elseif ($sortby == 'price-desc') {
		# code...
			$sortby = 'ORDER BY P.PRICE DESC';
			$sort_name = 'Low to High';
		}
		elseif ($sortby == 'price-asc') {
		# code...
			$sortby = 'ORDER BY P.PRICE ASC';
			$sort_name = 'High to Low';
		}
		elseif ($sortby == 'news') {
		# code...
			$sortby = 'ORDER BY P.DATETIME DESC';
			$sort_name = 'New Coollection';
		 }


		$sort = ""; 
		if(isset($_POST['enter'])){

            $selected = array('F.band_color = ', 'F.band_matterial = ', 'F.gender =', ' P.brand =','P.movement_type =' ,'F.case_size', 'P.price');
            $selected_post = array('band_color', 'band_matterial',  'gender', 'brand','movement_type' ,'case_size', 'price');
            $selected_not_null = array();
            $count = 0;
           // echo $_POST[$selected_post[$count]]."<br><br>";
            for($i = 0; $i < 7; $i++){

            	if ($_POST[$selected_post[$i]] !=='') {
            		$selected_not_null[$count] = $i;
            		$count++;
            	}

            }
            if ($count > 0) {
            	$sort = "Where ";
            	for($i = 0; $i < $count - 1; $i++){
            		if ($selected_not_null[$i] === 5) {
            			$sort .= $selected[$selected_not_null[$i]]." ".$_POST[$selected_post[$selected_not_null[$i]]]." "."and ";
            		}
            		else{
            			$sort .= $selected[$selected_not_null[$i]]." '".$_POST[$selected_post[$selected_not_null[$i]]]."' and ";
            		}

            	}
            	$sort.= $selected_not_null[$count-1] === 5 || $selected_not_null[$count-1] === 6 ? $selected[$selected_not_null[$i]]." ".$_POST[$selected_post[$selected_not_null[$i]]]:   $selected[$selected_not_null[$i]]." '".$_POST[$selected_post[$selected_not_null[$i]]]."'";
            	
            }
            //echo $sort;
            //echo json_encode($selected_not_null);


		}




			
			$query = 'SELECT * FROM PRODUCTS P JOIN PRODUCTS_FEATURES F ON P.PRODUCT_ID=F.FEATURE_ID '. $sort." ". $search_by." ".$sortby; 
			$stid = oci_parse($connection,$query);
			oci_execute($stid);
			while (($row = oci_fetch_assoc($stid)) != false){ 
			    if ($row['LOGO_IMAGES'] != "" && file_exists("./upload_images/".$row['LOGO_IMAGES'])) {
			    	# code...
			    	$img_path = './upload_images/'.$row['LOGO_IMAGES'];
			    	$max_width = 300;
			    	$max_heigh = 300;
			    	list($width,$height) = getimagesize($img_path);
			    	$ratioh = $max_heigh/$height;
			    	$ratiow = $max_width/$width;
			    	$ration = min($ratioh,$ratiow);
			    	$width = intval($ration * $width);
			    	$height = intval($ration * $height);
			    echo "
			    <li>

			         <div>

			          <div id = 'block-grid'>
			             <div><img src ='".$img_path."' width = ".$width." height = ".$height." ><div>
			          </div>
			           <div>
				           <p class = 'style-title'><a href = '' >".$row['TITLE']."</a></p>
				           <p class = 'style-price'><strong>".$row['PRICE']."</strong>Tg.</p> 
				        </div> 
				     </div>   
				</li>


			    ";
            }
           
    
        }

            

		 ?>
		 </ul>
		 <!-- <img src='upload_images/img1.jpg' alt=''/> -->
	</div>