/* Data get from laravel website end */

add_shortcode('asmaco', 'measuring_products');

function measuring_products(){
 
	$url = 'https://domain.com/api/products';
    
    $arguments = array(
        'method' => 'GET'
    );

	$response = wp_remote_get( $url, $arguments );

	if ( is_wp_error( $response ) ) {
		$error_message = $response->get_error_message();
		return "Something went wrong: $error_message";
	}
 
// 	$results = json_decode(wp_remote_retrieve_body( $response ) );
	//$results = json_decode(wp_remote_retrieve_body($response), true);
	$data = json_decode(wp_remote_retrieve_body($response), true);
// 	echo '<pre>';
// print_r($data);
	
	//var_dump($results);
  	$html ='';
	$html .='<div class="container"> <div class="row">';
	$i = 0;
	foreach($data["products"] as $item){
		// if($item["category_id"] == 1 && $item["brand_id"] == 7){
		if($item["brand_id"] == 5){
		//$html .='<tr><td> Product Name</td>';
		//$html .='<td>'.$item["name"].'</td></tr>';
		$html .='

		<div class="col-sm-3" style="text-align:center; float:left;">
    	<a href="https://domain.com/product/'. $item["slug"].'">
                        <img class="card-img-top" src="https://domain.com/public/'. $item["thumbnail_img"].'" alt="#">
		</a>
    	<div class="product-name"> 
     		<a href="https://domain.com/product/'. $item["slug"].'">'.$item["name"].'</a>
		</div>
	    
	    <div class="product-price"style="margin-bottom:5px;"> 
		<strong>AED '. round($item["unit_price"]*5/100+$item["unit_price"]).'</strong>
	    </div>
	   <a href="https://domain.com/product/'. $item["slug"].'" target="_blank" >
	    <button class="button" style="padding: 5px 40px;
	    font-size: 15px;
	    border-radius: 10px; margin-bottom:15px;">Buy Now</button>
	    </a>
		</div>';
			
//         echo $item["name"].'<br>';
//         echo $item["brand_id"].'<br>';
    	if ($i++ == 11) break;
		} 
        
		}
	$html .='  </div> </div>';
	return $html;
	 
}

/* Data get from shop website end */