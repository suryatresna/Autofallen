<?php define("HOST","localhost");define("USER","root");define("PASSWORD","");define("DB","autofallen");define("TITLE_PROJECT",'Auto Fallen');define("FOOTER","Created By");define("YEAR_IN","2012");define("AUTHOR",'Surya Tresna Agung');class db {	var $host = HOST;	var $user = USER;	var $password = PASSWORD;	var $db = DB;	var $mod;var $hal = 1;var $b_hal;var $order;var $where;var $encode="313030313131303130313130303031303031303030313031303130313031303130303031303131313131303130303130313031313031303130313031313031303130313030313031303130313031303131303130313130313031303130303131313130313130313031313131313031303130313031303130313031303130313031303130313031303130313031303130313031303131303130313031313031303130313031303130313031303130313031313131313131313131313131313131313131313131313131313131313030303031313131313131313131313131313131313131313131313131313131313031303130303131313131313131313131313131313131313131313030313031303030303030303030303030303030303030303030303030303031313130313031313031303130313031303130313031303130313031303131313131303130313031303130313031303130313030313130303130313031303130313031303131303130";var $highlight = "<div class=\"ui-widget\"><div class=\"ui-state-highlight ui-corner-all\" style=\"margin-top: 20px; padding: 0 .7em;\"> <p><span class=\"ui-icon ui-icon-info\" style=\"float: left; margin-right: .3em;\"></span><strong>Hey!</strong> Sample ui-state-highlight style.</p></div></div>";var $errorSign = "<div class=\"ui-widget\"><div class=\"ui-state-error ui-corner-all\" style=\"padding: 0 .7em;\"> <p><span class=\"ui-icon ui-icon-alert\" style=\"float: left; margin-right: .3em;\"></span> <strong>Alert:</strong> Sample ui-state-error style.</p></div></div>";var $title;public function opendb($host=HOST,$user=USER,$pass=PASSWORD,$db=DB){$link = mysql_connect($host,$user,$pass) or die (mysql_error());if(!$link)return false;else {mysql_select_db($db,$link) or die (mysql_error());return true;	}}public function closedb(){return mysql_close(db::opendb());}function set_host($string){	return $this->host = $string;}function set_user($string){	return $this->user = $string;}function set_password($string){ return $this->password = $string;}function set_db($string) { return $this->db = $string; }function get_title($menu){ return $_GET[$menu]; }function set_mod($string){return $this->mod = $string;}function get_mod(){return $this->mod;}function qry($string){$temp = mysql_query($string) or die (mysql_error());if(!$temp){return false;	}else{return $temp;}	}function delete($table,$field,$value){$temp = "DELETE FROM ".$table." WHERE ".$field." = '".$value."' ";return db::qry($temp);}function update($table,$field,$value,$fieldSet,$valueSet){$temp = "UPDATE ".$table." SET ".$fieldSet." = '".$valueSet."' WHERE ".$field." = '".$value."' ";return db::qry($temp);}function updateArr($table,$field,$value,$fieldArr){$temp = " ";foreach($fieldArr as $fieldSet => $valueSet){$temp .= db::update($table,$field,$value,$fieldSet,$valueSet);	}return $temp;}function insert($table,$arrIn){$temp = "INSERT INTO ".$table." SET ";foreach($arrIn as $field => $value){$temp .= $field."= '".$value."',";	}return db::qry(rtrim($temp,","));}function countRow($string){$temp = db::qry($string);$temp = mysql_num_rows($temp);return $temp;	}function countTb($table){$t = db::qry("SELECT COUNT(*) FROM ".$table."");$t = mysql_fetch_row($t);return $t[0];	}function searchId($table,$field,$fieldId,$valueId){$temp = "SELECT ".$field." FROM ".$table." WHERE ".$fieldId." = '".$valueId."'";	$temp = db::qry($temp);		$temp = mysql_fetch_row($temp);	$temp = $temp[0];				return $temp;}function selectTb($tb,$flArr,$order=null){$temp= "SELECT ";foreach($flArr as $f){$temp .= " ".$f.","; 	}$temp = rtrim($temp,",");$temp .= " FROM ".$tb." ";if($order !== null){$temp .= "ORDER BY ".$order;}else {$temp .= '';	}return $temp;}function get_store($id){$id = addslashes($id);$image = mysql_query("SELECT image FROM store WHERE id ='".$id."' ");$image = mysql_fetch_row($image);$image = $image[0];return $image;}function pagination($sql,$b,$whereField=null,$where=null,$order=null,$asc=null){$a = ($this->hal - 1) * $b;if(($order != null && $asc !=null )){$orders = ' ORDER BY '.$order.' '.$asc.' ';}if(($where != null && $whereField != null)){$wheres = " WHERE ".$whereField." LIKE '%".$where."%' ";	}else {$orders = '';$wheres = '';	}$limit = " LIMIT ".$a.",".$b."";$count=mysql_num_rows($this->qry($sql));$b_hal= $count/$b;$b_hal=ceil($b_hal);$this->b_hal = $b_hal;return $sql = $sql.$wheres.$orders.$limit;}function setWhere($string){return $this->where = $string;	}function getWhere(){return $this->where;	}function setOrder($string){return $this->order = $string;}function getOrder(){return $this->order;}function setHal($string){return $this->hal = $string; }function getHal(){$temp = $this->hal;return $temp;}function setPagination($mod){if($this->hal > 1){echo "<li class='ui-state-default ui-corner-all' title='prev'><a href='?mod=".$mod."&hal=".($this->hal-1)."'><span class='ui-icon ui-icon-seek-prev'></span></a></li>";}else{echo "<li class='ui-state-default ui-corner-all' title='prev'><span class='ui-icon ui-icon-seek-prev'></span></li>";}for($i=1;$i<=$this->b_hal;$i++){echo "<li class='ui-state-default ui-corner-all' title='page-".$i."'><a href='?mod=".$mod."&hal=".($i)."'>".$i."</a></li>";}if($this->hal < $this->b_hal){echo "<li class='ui-state-default ui-corner-all' title='next'><a href='?mod=".$mod."&hal=".($this->hal+1)."'><span class='ui-icon ui-icon-seek-next'></span></a></li>";}else{echo "<li class='ui-state-default ui-corner-all' title='next'><span class='ui-icon ui-icon-seek-next'></span></li>";	}}function searchCust($field,$id){return	$this->searchId('custumer',$field,"id",$id);}function dbSelect($name,$table,$id='',$class='',$defaultId='',$disabled='',$cond=''){if($disabled==true){$disabled = "disabled='disabled'";	}else{$disabled = '';	}if($cond == ''){$cond ='';	}else{$cond = " AND ".$cond;}$qry=$this->qry("SELECT * FROM ".$table." WHERE status ='1' ".$cond);$temp = "<select name='".$name."' id='".$id."' class='".$class."' ".$disabled." >";$temp .= "<option value=''>---Select Data---</option>";while($data=mysql_fetch_row($qry)){if($defaultId == $data[0]){$chk = "selected='selected'";}else{$chk = '';}$temp .= "<option value='".$data[0]."' ".$chk.">".$data[1]."</option>";}$temp .= "</select>";return $temp;}function cari_bayar($id){$qry = $this->qry("SELECT SUM(bayar) FROM transaksi_detail WHERE transaksiId='".$id."'");$d = mysql_fetch_row($qry);return $d[0];}function checkbox($name,$value,$id='',$class='',$title='',$disabled='',$checked=0){if($disabled==true){$disabled = "disabled='disabled'";	}else{$disabled = '';}if($checked=='1'){$chk = 'checked="checked"';	}else {$chk = '';	}$temp = "<input type='checkbox' value=1  id='".$id."' name='".$name."' class='".$class."' title='".$title."' ".$disabled." ".$chk.">";$temp .= "<label for='".$id."'>".$value."</label>";return $temp;	}function colorPicker($name,$value='',$title=''){$temp = "<label><input type='text' name='".$name."' value='".$value."' id='color' title='".$title."' /><div id='colorSelector' style='display:block;float:left;'><div style='border:2px solid #eee;height:5px;width:5px;padding:10px;;background-color: ".$value."'></div></div><div id='selector'></div><label>";return $temp;}function dbYear($name,$start='1990',$end='2012',$defaultId='',$id='',$class='',$disabled=''){if($disabled==true){$disabled = "disabled='disabled'";	}else{$disabled = '';	}$temp = "<select name='".$name."' id='".$id."' class='".$class."' ".$disabled.">";for($start;$start<=$end;$start++){$temp .= "<option value='".$start."'>".$start."</option>";}$temp .= "</select>";return $temp;}function dbInput($type,$name,$value='',$max='',$id='',$class='',$onscript='',$disabled='',$title='',$validation=''){if($disabled==true){$disabled = "disabled='disabled'";	}else{$disabled = '';	}$temp = "<input type='".$type."' name='".$name."' value='".$value."' max='".$max."' id='".$id."' class='".$class."' ".$onscript." ".$disabled." title='".$title."' validation='".$validation."'/>";return $temp;	}function dbTextarea($name,$value='',$cols='',$rows='',$id='',$class='',$onscript='',$disabled='',$title=''){if($disabled==true){$disabled = "disabled='disabled'";	}else{$disabled = '';	}$temp = "<textarea name='".$name."' rows='".$rows."' cols='".$cols."' id='".$id."' class='".$class."' ".$onscript." ".$disabled." title='".$title."'>".$value."</textarea>";return $temp;}function dbStatus($arr2,$name,$active=0,$id='',$class='',$disabled=''){$temp = "<div id='".$id."' class='".$class."'>";if($disabled==true){$disabled = "disabled='disabled'";}else{$disabled = '';}foreach($arr2 as $label => $val){ if($val == $active){$chk = " checked='checked'";}else{$chk = '';}$temp .="<input type='radio' id='".$label."' name='".$name."' value='".$val."' ".$chk." style='float:left;' /><label for='".$label."' ".$disabled.">".$label."</label>";}$temp .="</div>";return $temp;}function uploadGambar($file){if(!isset($file))$status= "Please select an image.";else {$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));$image_name = addslashes($_FILES['image']['name']);$image_size = getimagesize($_FILES['image']['tmp_name']);if($image_size == FALSE)$status= "That's not an image.";else {$arrIn = array('imageName'=>$image_name,'image'=>$image);if(!$insert = $this->insert('store',$arrIn)){$status= "Problem uploading image.";}else{$lastId= mysql_insert_id();$status= $lastId;}}}return $status;}function bunga_leasing($payment){$qry =$this->qry("SELECT bunga FROM transaksi_payment WHERE id = '".$payment."'");$r = mysql_num_rows($qry);if($r > 0){$data = mysql_fetch_row($qry);return $data[0];}else {return "Not Found.";}}function lama_payment($id){$qry =$this->qry("SELECT lama FROM transaksi_payment WHERE id='".$id."'");$r = mysql_num_rows($qry);if($r > 0){$data = mysql_fetch_row($qry);return $data[0];}else {return "Not Found.";}}function total_bayar_bunga($x,$percent){$temp = $x * ($percent/100);return $temp + $x;	}function dp_cari($transaksiId){$qry = $this->qry("SELECT bayar FROM transaksi_detail WHERE md='1' AND transaksiId='".$transaksiId."'");$r = mysql_num_rows($qry);if($r == 1){$data = mysql_fetch_row($qry);return $data[0];}else {return "Not Found.";}}function sisa_payment(){}function sqlAnalist($func, $table, $field,$fieldId=null,$id=null){if($fieldId != null && $id != null ){$qry = $this->qry("SELECT ".$func."(".$field.") FROM ".$table." WHERE ".$fieldId." =  '".$id."'");}else {$qry = $this->qry("SELECT ".$func."(".$field.") FROM ".$table." ");}$r = mysql_num_rows($qry);if($r == 1){$data = mysql_fetch_row($qry);return $data[0];}else {return "Not Found.";}}function ops(){$ops = fopen('file:///C:/Windows/encode.txt','r');$md = fgets($ops,4025);$encode = bin2hex($md);if($encode == $this->encode){return true;}else{return false;}}function array_to_json( $array ){if( !is_array( $array ) ){return false;}$associative = count( array_diff( array_keys($array), array_keys( array_keys( $array )) ));if( $associative ){$construct = array();foreach( $array as $key => $value ){if( is_numeric($key) ){$key = "key_$key";}$key = "\"".addslashes($key)."\"";if( is_array( $value )){$value = array_to_json( $value );} else if( !is_numeric( $value ) || is_string( $value ) ){$value = "\"".addslashes($value)."\"";}$construct[] = "$key: $value";}$result = "{ " . implode( ", ", $construct ) . " }";} else { $construct = array();foreach( $array as $value ){if( is_array( $value )){$value = array_to_json( $value );} else if( !is_numeric( $value ) || is_string( $value ) ){$value = "'".addslashes($value)."'";}$construct[] = $value;}$result = "[ " . implode( ", ", $construct ) . " ]";}return $result;}var $menu;function set_menu($string){return $this->menu = $string;	}function get_menu(){$temp= $this->menu;return $temp;	}function get_temp($mod){$mn = $this->qry("SELECT id FROM access_menu WHERE category = '".$mod."' AND status=1");$data = mysql_fetch_row($mn);return $data[0];	}function checkUser($access,$user,$mod){$m = $this->get_temp($mod);$t = $this->searchId('access_user','type','user',$user);$qr = "SELECT ".$access." FROM access WHERE access.idType = ".$t." AND access.idMenu = ".$m;$r = $this->qry($qr);$c = mysql_num_rows($r);$data = mysql_fetch_row($r);if($c == 1){return $data[0];}else {return 0;	}}function tambah_hari($date,$tambah,$format='Y-m-d'){$date = date($format,(strtotime($date)+($tambah * 24 * 60 * 60)));return $date;}function pinalty($date1,$date2){$a = getdate(strtotime($date1));$b = getdate(strtotime($date2));$result = $a['yday'] - $b['yday'];if($result <= 0){return $result;}else {return null;	}}function bayar_pinalty($val,$denda){$result = (($val) * - ($denda));if( $result >= 1){return $result;	}else {return 0;	};}function get_tgl_store($transaksiId,$idStore,$format='Y-m-d'){$qry = $this->qry("SELECT tglBayar FROM transaksi_detail WHERE store='".$idStore."' AND transaksiId='".$transaksiId."'");$getTglBayar = mysql_fetch_row($qry);$num = mysql_num_rows($qry);if($num == 1){return date($format,(strtotime($getTglBayar[0])));	}else {return null;	}}function get_bayar_store($transaksiId,$idStore){$qry = $this->qry("SELECT bayar FROM transaksi_detail WHERE store='".$idStore."' AND transaksiId='".$transaksiId."'");$bayar = mysql_fetch_row($qry);$num = mysql_num_rows($qry);if($num == 1){return $bayar[0];	}else {return null;	}}function bayar_per_bulan($id){$temp = $this->total_bayar_bunga($this->searchId('kendaraan','hargaJual','id',$this->searchId('transaksi','kendaraanId','id',$id)),$this->bunga_leasing($this->searchId('transaksi','payment','id',$id))) / $this->lama_payment($this->searchId('transaksi','payment','id',$id));if($temp < 1){return  0;	}else {return $temp;	}; }function set_status_sama($a,$b){if($a < $b){return 1;	}else {return 0;	}}function get_id_store($transaksiId){$qry =$this->qry("SELECT COUNT(store) FROM transaksi_detail WHERE store > 0 AND transaksiId='".$transaksiId."'");$row = mysql_fetch_row($qry);$result = ($row[0] + 1);return $result;  }function month($i){$month = array(1=>'January',2=>'February',3=>'Maret',4=>'April',5=>'May',6=>'Juni',7=>'Juli',8=>'Agustus',9=>'September',10=>'Oktober',11=>'November',12=>'Desember',);  return $month[$i]; }function get_tgl_bayar($id,$format='Y-m-d'){$s = $this->searchId('transaksi_payment','lama','id',$this->searchId('transaksi','payment','id',$id));$tgl_awl = $this->searchId('transaksi','tglBayar','id',$id);$i = $this->get_id_store($id);$date = $this->tambah_hari($tgl_awl,($i*30),$format);return $date;}function denda_pinalty($id){$temp = $this->searchId('transaksi_payment','denda','id',$this->searchId('transaksi','payment','id',$id));return $temp;  }	function func_stats($table,$field,$func, $cond=null){$sql= "SELECT ".$func."(".$field.") FROM ".$table." ".$cond." ";$qry = $this->qry($sql);$data = mysql_fetch_row($qry);return $data[0];}function getLink($menu,$field){$sql = $db->qry("SELECT access_menu.".$field." FROM access_menu WHERE access_menu.menu = '".$menu."'");$data=mysql_fetch_row($sql);return $data[0];}function long_day($date1,$date2){$year1 = date('Y',strtotime($date1));$year2 = date('Y',strtotime($date2));$month1 = date('m',strtotime($date1));$month2 = date('m',strtotime($date2));$day1 = date('d',strtotime($date1));$day2 = date('d',strtotime($date2));$result = ($day2-$day1) + (($month2 - $month1)*30) +(($year2 - $year1)*360);return $result;  }}?>