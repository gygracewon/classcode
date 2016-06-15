<?php
require_once('connection.php');

class Page{
	//property of a page
	public $iId;
	public $pageName;
	public $sContent; //string
	public $iPosition; //integer 
	public $iVisible;
	public $iSubjectId;

	//constructor to initial data
	public function __construct(){ //constructor. implicit 
		$this->iId = 0;
		$this->sPageName = '';
		$this->sContent= '';
		$this->iPosition = 0;
		$this->iVisible = 0 ;
	}

	//to load a page from DB based on page id
	public function load($iId){//get information from database

		//1:make connection
		$oConnection = new Connection(); //connect to the wrapper

		$sSQL = 'SELECT id, page_name, content, position, visible, subject_id
				FROM pages
				WHERE id = '.$iId;	


		//3: execute query
		$oResultSet = $oConnection->query($sSQL);
		//4: fetch data from result set
		$aRow = $oConnection->fetch($oResultSet); // when fetch , we get array.  and make sure what I want to fetch, once fetch ->store into perperty. and do mapping.
		
		$this->iId = $aRow['id'];
		$this->sPageName = $aRow['page_name'];
		$this->sContent= $aRow['content'];
		$this->iPosition = $aRow['position'] ;
		$this->iVisible = $aRow['visible'];
		$this->iSubjectId = $aRow['subject_id'] ;
		//5: close connection
	}
	//commit the data to DB
	public function save(){
		//1: open connecton
		$oConnection = new Connection();

		if($this->iId == 0 ){
			//do insert
		
			//2: create insert query	
			//double quotation for start/end tag, becasue wit will be mixed up
			$sSQL = "INSERT INTO pages (subject_id, page_name, position, visible, content)
					VALUES ('".$this->iSubjectId."', '".$this->sPageName."', '".$this->iPosition."', '".$this->iVisible."', '".$this->sContent."')";

		
			//3: execute query 
			$bSuccess = $oConnection->query($sSQL);

			//4: check for successful creation 
			if($bSuccess == true){
				$this->iId = $oConnection->getInsertId();
			}

		}else{
			//do update


			//make update query 
			$sSQL = "UPDATE pages
					SET subject_id = '".$this->iSubjectId."', 
					page_name = '".$this->sPageName."',
					position = '".$this->iPosition."',
					visible = '".$this->iVisible."',
					content = '".$this->sContent."'
				WHERE id = ".$this->iId;

			// echo $sSQL;
			//exute query 
			$oConnection->query($sSQL);
		}

	}
}
/// testing -------------------------
//this will do an update.
// $oPage = new Page();
// $oPage->load(1);
// // $oPage->iSubjectId = 2;
//  $oPage->sPageName = 'Hello';
// // $oPage->iPosition = 5;
// // $oPage->iVisible = 1;
// // $oPage->sContent = 'This is Graces page';

// $oPage->save();

// // echo '<pre>';
// // print_r($oPage);
// // echo '</pre>';
?>



