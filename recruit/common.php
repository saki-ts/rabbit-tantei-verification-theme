<?php

	$domain = "https://rabbit-tantei.com";

	  function ff_line($type='text',$name,$value,$placeholder='',$size=20,$max_size=0,$flg_required){
	  if(!empty($max_size)){
	    $max_length = ' maxlength="' . intval($max_size) . '"';
	  }else{
	    $max_length = "";
	  }
	  if(!empty($placeholder))
	  {
	  $placeholder = ' placeholder="'.$placeholder.'"';
	  }
		if(!empty($flg_required))
	  {
	  $required = ' required';
	  }
	  return '<input type="'.$type.'" name="' . $name . '" id="'. $name . '" value="' . $value . '" size="' . $size . '"' .  $max_length . $placeholder . $required . '>';
	  }


	  function ff_text($name,$value,$size=20,$max_size=0){
	  if(!empty($placeholder))
	  {
	    $placeholder = ' placeholder="'.$placeholder.'"';
	  }
	  if(!empty($max_size)){
	      $max_length = "maxlength=\"" . intval($max_size) ."\"";
	  }else{
	      $max_length = "";
	  }
	  return "<input type=\"text\" name=\"" . $name . "\" id=\"" . $name . "\" value=\"" . $value . "\" size=\"" . $size . "\"" . $max_length . ">";
	  }

	  function ff_textarea($name,$value,$cols=40,$rows=5,$placeholder='',$flg_required=0){
			$required = '';
			if($flg_required)
			{
				$required = ' required';
			}
		return '<textarea name="'.$name.'" id="'.$name.'" cols="'.$cols.'" rows="'.$rows.'" placeholder="'.$placeholder.'"'.$required.'>'.$value.'</textarea>';
	  }

	function ff_hidden($name,$value)
	{
	  return "<input type=\"hidden\" name=\"" . $name . "\" id=\"" . $name . "\" value=\"" . $value . "\">";
	  }


	  function ff_select($name, $array, $num_selected,$flag_note=1){
	  $str = '';
	  $str .= "<select name='" . $name . "' id='" . $name . "'>";
	  switch ($flag_note)
	  {
	      case 1:
	   $str .= "<option value=''>" . $japanese_note . "選択</option>\n";
	   break;
	   }
	  foreach($array as $k => $v){
	      if( preg_match("/[0-9]+/",$num_selected) &&  $k == $num_selected ){
	          $ch = " selected='selected'";
	      }else{
	          $ch = "";
	      }
	   if($v){
	      $str .= "<option value='" . $k . "'" . $ch . ">".  $v . "</option>\n";
	   }
	  }
	  $str .= "</select>";
	  return $str;
	  }

	  function ff_radio($name,$array,$num_checked,$class=''){
	  if(!empty($class))
	  {
	     $class = ' ' . $class;
	  }
	  if(is_array($array))
	  {
	  $str = '<ul class="radio'.$class.'">';
	  foreach($array as $k => $v){
	     if( preg_match("/[0-9]+/",$num_checked) &&  $k == $num_checked ){
	         $ch = " checked=\"checked\"";
	     }else{
	         $ch = "";
	     }
	    if($v){
	     $str .= "<li><label for=\"". $name . $k . "\"><input type=\"radio\" name=\"" . $name . "\" id=\"" . $name . $k . "\"". $ch . " value=\"" . $k . "\">" . $v . "</label></li>\n";
	    }
	  }
	  $str .= "</ul>";
	  }else{
	  $str = '-------error---------' . $name;
	  }

	  return $str;
	  }

	  function ff_checkbox($name,$array_base,$array_selected,$class=''){
	  if(!empty($class))
	  {
	     $class = ' ' . $class;
	  }
	  $str = '<ul class="checkbox'.$class.'">';
	  foreach($array_base as $k => $v){
	  if(is_array($array_selected)){
	    if(in_array($k,$array_selected) ){
	        $ch = " checked='checked'";
	    }else{
	        $ch = "";
	    }
	  }
	  if($v){

	  $str.= "<li><label for='" . $name . $k . "'>";
	  $str .= "<input type='checkbox' name='" . $name . "[]' id='". $name. $k ."' value='" . $k . "'" . $ch . "> ". $v;

	  }
	  $str.= "</label></li>";
	    }
	  $str .= "</ul>";
	  return $str;
	  }

	  function post2params($post){

	  	//$params = '';
	  	if(isset($post)){
	  		foreach($post as $key => $value){
	  			if(is_array($value)){
	  				foreach($value as $value_p){
	  					$params[$key][] = trim($value_p);
	  				}
	  			}else{
	  				$params[$key] = trim($value);
	  			}
	  		}
	  	}
	  	return $params;
	  }
#array
$prefs = array(1=>'北海道',2=>'青森県',3=>'岩手県',4=>'宮城県',5=>'秋田県',6=>'山形県',7=>'福島県',8=>'茨城県',9=>'栃木県',10=>'群馬県',11=>'埼玉県',12=>'千葉県',13=>'東京都',14=>'神奈川県',15=>'新潟県',16=>'富山県',17=>'石川県',18=>'福井県',19=>'山梨県',20=>'長野県',21=>'岐阜県',22=>'静岡県',23=>'愛知県',24=>'三重県',25=>'滋賀県',26=>'京都府',27=>'大阪府',28=>'兵庫県',29=>'奈良県',30=>'和歌山県',31=>'鳥取県',32=>'島根県',33=>'岡山県',34=>'広島県',35=>'山口県',36=>'徳島県',37=>'香川県',38=>'愛媛県',39=>'高知県',40=>'福岡県',41=>'佐賀県',42=>'長崎県',43=>'熊本県',44=>'大分県',45=>'宮崎県',46=>'鹿児島県',47=>'沖縄県');;

$genders = array(1=>'男性',2=>'女性');
$jobtypes = array(1=>'調査員',2=>'現場管理',3=>'面談員',4=>'事務');
?>
