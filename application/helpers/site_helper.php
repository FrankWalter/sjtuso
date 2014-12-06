<?php

function curl_json( $URL , $post_arr = null )
{
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL , $URL );
    if($post_arr == null){
    	curl_setopt ( $ch, CURLOPT_POST , false ); 
    }else{
    	curl_setopt ( $ch, CURLOPT_POST , true ); 
    	$post_data = json_encode($post_arr);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data  ) ;
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $ret = curl_exec($ch);
    curl_close($ch);
    return $ret;
}