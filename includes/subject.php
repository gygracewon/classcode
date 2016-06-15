<?php
require_once('connection.php');// link to mysquli
require_once('page.php');// link with page.php


class Subject{//properties of subjects
	public $iId; //piblic : for everyone can do anything to it 
	public $sSubjectName;
	public $iPosition;
	public $iVisible;
	public $aPages;


	public function __construct(){//initialise  //make array //__construct : give a direct variable 
		$this->iId = 0; //$this refers to iId subject.  buy why not just iId = 0?
		$this->sSubjectName = '';
		$this->iPosition = 0;
		$this->iVisible = 0;
		$this->aPages =[];
	}

	public function load($iId){//This means ... what are the pages that subject contains?
		$oConnection = new Connection();	

		$sSQL = 'SELECT id, subject_name, position, visible
				FROM subjects
				WHERE id = '.$iId; //all page id. 

		$oResultSet = $oConnection->query($sSQL);

		$aRow = $oConnection->fetch($oResultSet);

		$this->iId = $aRow['id']; //$this data 
		$this->sSubjectName = $aRow['subject_name'];
		$this->iPosition = $aRow['position'];
		$this->iVisible = $aRow['visible'];

		//loading pages of this subject

		//query all Page IDs of subject 
		$sSQL = 'SELECT id FROM pages WHERE subject_id ='.$iId; //depends on how many pages they have
		$oResultSet = $oConnection->query($sSQL);

		//fetch page IDs from the result set
		while($aRow =$oConnection->fetch($oResultSet)){ //Its sayin keep fetching one low at a time.
			$iPageId = $aRow['id']; //extract id. 
			
			$oPage = new Page();
			$oPage->load($iPageId); //making new page and load them. 
			$this->aPages[] = $oPage; // add more at the end pf array. one of the properties.
		}	

		$oConnection->close();
	}

	public function save(){// new subject in database

		$oConnection = new Connection();
		
		if($this->iId == 0 ){

			//remove Id so no crash
			$sSQL = "INSERT INTO subjects (subject_name, position, visible) 
					VALUES ('".$this->sSubjectName."', '".$this->iPosition."', '".$this->iVisible."')";

			$bSuccess = $oConnection->query($sSQL);
			
			if($bSuccess == true){ // if it is successful, 
				$this->iId = $oConnection->getInsertId();
		}
		
	}else{
			$sSQL = "UPDATE subjects 
					SET subject_name = '".$this->sSubjectName."',
					position = '".$this->iPosition."', 
					visible = '".$this->iVisible."' 
				WHERE id = ".$this->iId;

				$oConnection->query($sSQL);
		}
	}
}
//testing
$oSubject = new Subject();
$oSubject->load(3);//extracting database 
$oSubject->sSubjectName = 'HAHA';
$oSubject->iPosition = 2;
$oSubject->iVisible = 5;

$oSubject->save(); 

// echo '<pre>';
// print_r($oSubject);
// echo '</pre>';


?>