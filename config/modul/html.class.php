<?php

class html {
	
	
	var $title;
	var $thePage;
	
	function __contruct(){
		return $thePage;	
	}
	function __destruct(){
		unset($thePage);	
	}
	function getPage(){
		return $this->thePage;	
	}//Mendapatkan variabel ThePage
	function setPage($string){
		$page= $this->thePage = $string;
		return $page;	
	}//mengubah variabel ThePage
	
	function getTitle(){
		return $this->title;	
	}// Mendapatkan variabel title
	function setTitle($string){
		$title=$this->title = $string;
		return $title;	
	}//mengubah title
	
	function addText($string){
		$temp = $this->thePage = $string;
		$temp .=$this->thePage = "\n";
		
		print $temp;	
	}// Menuliskan isi variabel yang dimasukan
	
	function pageBreak(){
		$temp = "<br>";
		print $temp;	
	}
	
	function align($align=''){
		if($align=='L'){
				$a = 'left';	
			}
			elseif($align=='C'){
				$a = 'center';
			}
			elseif($align=='R'){
				$a = 'right';	
			}
			elseif($align=='LR') {
				$a = 'justify';	
			}
			else {
				$a = 'left';	
			}
			return $a;	
	}
	
	function tag($string,$tag,$class='',$id='',$name=''){
		//Dapat memasukan class dan id
		$temp = "<".$tag." class='".$class."' id='".$id."' name='".$name."'>".$string."</".$tag.">";
		$this->addText($temp);	
	}//Memasang tag HTML pada String yang dimasukan
	
	function h1($string){
		return $this->tag($string,'h1');	
	}
	function h2($string){
		return $this->tag($string,'h2');	
	}
	function h3($string){
		return $this->tag($string,'h3');	
	}
	function h4($string){
		return $this->tag($string,'h4');	
	}
	function h5($string){
		return $this->tag($string,'h5');	
	}
	function h6($string){
		return $this->tag($string,'h6');	
	}
	
	function p($string,$align='',$class='',$id=''){
		$a=$this->align($align);
		$temp = "<p align='".$a."' class='".$class."' id='".$id."'>";
		$temp .= $string;
		$temp .= "</p>";
	}
	
	function link($string,$link='',$class='',$id='',$name=''){
		$temp = "<a href='".$link."' id='".$id."' class='".$class."' name='".$name."'>".$string."</a>";
		return $this->addText($temp);	
	}//Create Link
	function span($string,$id='',$class='',$name=''){
		$temp = $this->tag($string,'span',$class,$id,$name);
		return $temp;	
	}// Create tag span
	
	
	function checkArray($array){
		if(is_array($array)){
			return true;	
		}
		else {
			return false;
			exit();	
		}
	}
	
	function li($array1,$ul='ul',$class='',$id=''){
		$this->checkArray($array1);
		$temp = "<ul class='' id=''>";
				foreach($array1 as $values){
					$temp .="<li>".$values."</li>";	
				}
		
		$temp .= "</ul>";
		
		return $this->addText($temp);
	}// Membuat tag li berbasis array level 1
	
	function img($src='',$w='',$h='',$title='',$id='',$class='',$link='',$onclick=''){
		$temp = "<img src='".$src."' width='".$w."' height='".$h."' class='".$class."' id='".$id."' onClick='".$onclick."' title='".$title."'>";
		return $this->addText($temp);	
	}// Membuat atau memanggil gambar
	
	
	//TABLE MANIPULATION
	function startTable($w='',$border=1,$class='',$id=''){
		$temp = "<table width='".$w."' border='".$border."' class='".$class."' id='".$id."'>";
		return $this->addText($temp);	
	}
	function gStartTable($w='',$border=1,$class='',$id=''){
		$temp = "<table width='".$w."' border='".$border."' class='".$class."' id='".$id."'>";
		return $temp;	
	}
	//Memulai Table
	function tRow($stringArray2,$td='td',$class='',$id='',$onClick=''){
		$this->checkArray($stringArray2);
		$temp = "<tr class='$class' id='$id' onClick='$onClick'>";
			foreach($stringArray2 as $cell => $val){
			$temp .="<".$td." width='".$val."'>".$cell."</".$td.">";	
			}
		$temp .= "</tr>";
		return $this->addText($temp);
	}
	function gTRow($stringArray2,$td='td',$class='',$id='',$onClick=''){
		$this->checkArray($stringArray2);
		$temp = "<tr class='$class' id='$id' onClick='$onClick'>";
			foreach($stringArray2 as $cell => $val){
			$temp .="<".$td." width='".$val."'>".$cell."</".$td.">";	
			}
		$temp .= "</tr>";
		return $temp;
	}
	function tRows($stringArray3,$td='td',$class='',$id='',$onClick=''){
		$this->checkArray($stringArray3);
		foreach($stringArray3 as $cell){
		$temp = "<tr class='$class' id='$id' onClick='$onClick'>";
			foreach($cell as $val){
			$temp .="<".$td.">".$val."</".$td.">";	
			}
		$temp .= "</tr>";
		}
		return $this->addText($temp);
	}
	function gTRows($stringArray3,$td='td',$class='',$id='',$onClick=''){
		$this->checkArray($stringArray3);
		foreach($stringArray3 as $cell){
		$temp = "<tr class='$class' id='$id' onClick='$onClick'>";
			foreach($cell as $val){
			$temp .="<".$td.">".$val."</".$td.">";	
			}
		$temp .= "</tr>";
		}
		return $temp;
	}

		
	function endTable(){
		$temp = "</table>";
		return $this->addText($temp);	
	}
	function gEndTable(){
		$temp = "</table>";
		return $temp;	
	}
	
	function buildTable($theArray,$border=1,$w='',$id='',$class=''){
		$temp = $this->gStartTable($w,$border,$class,$id);
			foreach($theArray as $row){
				$temp .= $this->gTRow($row); 	
			}
		$temp .= $this->gEndTable();
		return $this->addText($temp);
	}
	
	//Header and Footer
	function setHeader($title='Untitled Website',$keyword='',$description=''){
		$temp = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
		<html xmlns=\"http://www.w3.org/1999/xhtml\">
		<head>
		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
		<meta name=\"keywords\" content=\"".$keyword." \" />
		<meta name=\"description\" content=\"".$description." \" />
		<title>".$title."</title>
		</head>";
		
		$this->addText($temp);
	}
	function setFooter($string,$tag='div',$align='C',$id='',$class=''){
		$temp = "<".$tag.">";
			
			$a =$this->align($align);
			$temp .= $this->p($string,$a,$class,$id);
		
		$temp .="</".$tag.">";
		
		$this->addText($temp);
	}
	
	//External File
	function stylesheet($href='',$rel='stylesheet', $type='text/css'){
	$temp = "<link href=\"".$href."\" rel=\"".$rel."\" type=\"".$type."\" />";
	$this->addText($temp);	
	}//Memanggil file css
	function scriptSrc($src){
	$temp = "<script src=\"".$src."\"></script>";	
	$this->addText($temp);
	}//Memanggil file script
	
	
	//FORM MANIPULATION
	function startForm($method='post',$action='',$name='',$enctype='',$id='',$class=''){
		$temp = "<form method='".$method."' action='".$action."' name='".$name."' enctype='".$enctype."' id='".$id."' class='".$class."'>";
		return $this->addText($temp);	
	}
	function gStartForm($method='post',$action='',$name='',$enctype='',$id='',$class=''){
		$temp = "<form method='".$method."' action='".$action."' name='".$name."' enctype='".$enctype."' id='".$id."' class='".$class."'>";
		return $temp;	
	}//Memulai form
	
	function endForm(){
		$temp="</form>";
		return $this->addText($temp);	
	}
	function gEndForm(){
		$temp="</form>";
		return $temp;	
	}//Menutup Form
	
	function input($type,$label='',$name='',$value='',$max='',$title='',$id='',$class='',$onScript='',$position='L'){
		if($position=='R'){
		$temp = "<label><input type='".$type."' name='".$name."' value='".$value."' size='".$max."' title='".$title."' id='".$id."' class='".$class."' ".$onScript."><span>".$label."</span></label>";
		}
		else{
		$temp = "<label><span>".$label."</span><input type='".$type."' name='".$name."' value='".$value."' size='".$max."' id='".$id."' class='".$class."' ".$onScript."></label>";	
		}
		return $this->addText($temp);	
	}
	function gInput($type,$label='',$name='',$value='',$max='',$title='',$id='',$class='',$onScript='',$position='L'){
		if($position=='R'){
		$temp = "<label><input type='".$type."' name='".$name."' value='".$value."' size='".$max."' title='".$title."' id='".$id."' class='".$class."' ".$onScript."><span>".$label."</span></label>";
		}
		else{
		$temp = "<label><span>".$label."</span><input type='".$type."' name='".$name."' value='".$value."' size='".$max."' id='".$id."' class='".$class."' ".$onScript."></label>";	
		}
		return $temp;	
	}//Membuat Input
	
	function select($theArray1, $name='',$id='',$class=''){
		$temp = "<select name='".$name."' id='".$id."' class='".$class."'>";
			foreach($theArray1 as $cell => $value){
			$temp .="<option value='".$value."'>".$cell."</option>";	
			}
		$temp .= "</select>";
		
		return $this->addText($temp);	
	}
	function gSelect($theArray1, $name='',$default='',$id='',$class=''){
		$this->checkArray($theArray1);
		$temp = "<select name='".$name."' id='".$id."' class='".$class."'>";
			$temp .="<option value='".$default."'>".$default."</option>";
			foreach($theArray1 as $cell => $value){
			$temp .="<option value='".$cell."'>".$value."</option>";	
			}
		$temp .= "</select>";
		
		return $temp;	
	}//Membuat list Select array
	
	
	function checkBox($label='',$name='',$value='',$title='',$id='',$class='',$onScript=''){
		$temp = $this->gInput('checkbox',$label,$name,$value,'',$id,$class,$onScript,'R');
		return $this->addText($temp);
	}
	function gCheckBox($label='',$name='',$value='',$title='',$id='',$class='',$onScript=''){
		$temp = $this->gInput('checkbox',$label,$name,$value,'',$id,$class,$onScript,'R');
		return $temp;
	}//Membuat Check Box
	
	function radioBtnGroup($theArray,$name,$title='',$checked='0',$id='',$class='',$onScript=''){
		$temp = "<fieldset>";
			$temp .= "<legend>".$title."</legend>";
			foreach($theArray as $label => $value){
				if($checked == $value){
					$checked='checked';
				}
				else {
					$checked = '';
				}
			$temp .= $this->gInput('radio',$label,$name,$value,'',$id,$class,$checked,'R');
			}
		$temp .= "</fieldset>";
		return $this->addText($temp);	
	}
	function gRadioBtnGroup($theArray,$name,$title='',$checked='0',$id='',$class='',$onScript=''){
		$temp = "<fieldset>";
			$temp .= "<legend>".$title."</legend>";
			foreach($theArray as $label => $value){
				if($checked !== $value){
					$check='checked';
				}
				else {
					$check = '';
				}
			$temp .= $this->gInput('radio',$label,$name,$value,'',$id,$class,$check,'R');
			}
		$temp .= "</fieldset>";
		return $temp;	
	}//Membuat Radio Group Button
	
	function textarea($string='',$name='',$cols='',$rows='',$class='',$id=''){
		$temp="<textarea name='".$name."' cols='".$cols."' rows='".$rows."' class='".$class."' id='".$id."'>";
		$temp.=$string;
		$temp.="</textarea>";
		return $this->addText($temp);	
	}
	function gTextarea($string='',$name='',$cols='',$rows='',$class='',$id=''){
		$temp="<textarea name='".$name."' cols='".$cols."' rows='".$rows."' class='".$class."' id='".$id."'>";
		$temp.=$string;
		$temp.="</textarea>";
		return $temp;	
	}//Membuat Textarea
	
	function submit($name='submit',$value='Submit',$id='',$class=''){
		$temp="<input type='submit' name='".$name."' value='".$value."' id='".$id."' class='".$class."'>";
		return $this->addText($temp);	
	}
	function gSubmit($name='submit',$value='Submit',$id='',$class=''){
		$temp="<input type='submit' name='".$name."' value='".$value."' id='".$id."' class='".$class."'>";
		return $temp;	
	}//Membuat Tombol Submit
	function resetBtn($name='reset',$value='Reset',$id='',$class=''){
		$temp="<input type='reset' name='".$name."' value='".$value."' id='".$id."' class='".$class."'>";
		return $this->addText($temp);	
	}
	function gResetBtn($name='reset',$value='Reset',$id='',$class=''){
		$temp="<input type='reset' name='".$name."' value='".$value."' id='".$id."' class='".$class."'>";
		return $temp;	
	}//Membuat Tombol Reset
	
	function button($name='button',$value='Button',$id='',$class='',$onclick=''){
		$temp="<input type='submit' name='".$name."' value='".$value."' id='".$id."' class='".$class."' onclick='".$onclick."'>";
		return $this->addText($temp);	
	}
	function gButton($name='button',$value='Button',$id='',$class='',$onclick=''){
		$temp="<input type='submit' name='".$name."' value='".$value."' id='".$id."' class='".$class."' onclick='".$onclick."'>";
		return $temp;	
	}//Membuat Tombol Submit
	
	function buildForm($formArr,$w='100%',$class='',$id=''){
		$temp = "<table width='".$w."' class='".$class."' id='".$id."'>";
		foreach($formArr as $label => $value){
			$temp .= "<tr>";
			$temp .="<td align='right' width='40%'><b>".$label."</b></td><td width='60%'><span>".$value."</span></td>";
			$temp .= "</tr>";	
		}
		$temp .= "</table>";
		return $temp;	
	}

	
	//ETC FUNCTION 
	function alert($string){
		$temp = "<script>alert('".$string."')</script>";
		return $temp;	
	}
	
}

?>