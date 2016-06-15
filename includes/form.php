<?php
class Form{
	//to store html of the form
	public $sHTML;
	public $Data;

	public function __construct(){
		//so that there is no initial HTML
		$this->sHTML=''; 
		$this->aData=[]; //initialise to be a empty list.
	}

	//form building methods
	public function open(){
		$this->sHTML.= '<form action ="" method="post">';//add more html into $sHTML
	}
	public function close(){
		$this->sHTML .='</form>';
	}
	public function makeTextInput($sLabel,$sInputName){//change label because you might want to change. php need only name, and not id but sill tend to use id and have all label for, id, name
		$sData = '';

		//looking for sticky data of input
		if(isset($this->aData[$sInputName]) == true){
			$sData =  $this->aData[$sInputName];
		}

		$this->sHTML .='<label for="'.$sInputName.'">'.$sLabel.'</label>
						<input type="text" id="'.$sInputName.'" name="'.$sInputName.'" value="'.$sData.'"/>';
	}
	public function makeTextArea($sLabel,$sInputName){
		$sData = '';
		//looking for sticky data of input
		if(isset($this->aData[$sInputName]) == true){
			$sData = $this->aData[$sInputName];
		}
		$this->sHTML .='<label for="'.$sInputName.'">'.$sLabel.'</label>
				<textarea id="'.$sInputName.'" name="'.$sInputName.'">'.$sData.'</textarea>';
	}
	public function makeSubmit($sLabel,$sInputName){
		//leaver the----input type = "submit"---- as it already is
		$this->sHTML .='<input type="submit" name="'.$sInputName.'" value="'.$sLabel.'"/>';//whatever I put in a value is what I see.
	}
}


?>