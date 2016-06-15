<?php
require_once('connection.php');
require_once('subject.php');

class SubjectManager{
	//no data - a shell class 


	static public function getSubjects(){//function called public// static: when class has no data at all, 

		$aSubject = [];

		$oConnection = new Connection(); //everytime to do query, make a new connecetion? (from Connection wrapper)
		//query subject ids 
		$sSQL = 'SELECT id FROM subjects';//ask database to list all subject ids  
		
		$oResultSet = $oConnection->query($sSQL); // ->  - locator .  tell object to do something.  ,:: - same, but its locater for class.

		//load each subject for each id
		while($aRow = $oConnection->fetch($oResultSet)){
			$iSubjectId = $aRow['id'];

			$oSubject = new Subject();
			$oSubject->load($iSubjectId); //$oSubject now storing all the information about subject
			$aSubject[] = $oSubject; // add subject to list
		}
		return $aSubject; 
	}
}
//testing...
// echo '<pre>';
// print_r(SubjectManager::getSubjects()); //:: - locater , tell SubjectMager where to find. Because its a static. Go to Subjectmanager before you go to getSubject. 
// echo '</pre>';
?>