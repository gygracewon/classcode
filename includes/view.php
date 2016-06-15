<?php

class View{

	//no attribute

	static public function renderNav($aSubjects){//render is to view.
		$sHTML = '<ul>';
		
		//because I have many subjects, loop $aSubjects <-this array

		//making subjects
		for($i=0; $i<count($aSubjects); $i++){//count($aSubjects) get the lists. 

			$oSubject = $aSubjects[$i];
			$aPages = $oSubject->aPages;
		

			$sHTML .= '<li><h3>'.$oSubject->sSubjectName.'</h3>
					<ul>';

			//making pages				
			for($j=0; $j<count($aPages); $j++){//looping throguth pages 

				$oPage = $aPages[$j];

			$sHTML .='<li><a href="main.php?pageid='.$oPage->iId.'">'.$oPage->sPageName.'</a></li>';// string catenation to load differnt pages when navigate.		

			}

			$sHTML .= '</ul></li>';


		}

		$sHTML .= '</ul>';


		return $sHTML;
	}

	static public function renderPage($oPage){
		//html from main.php
		$sHTML = 	'<div class="two-thirds column">
						<h3>'.$oPage->sPageName.'</h3>
						<p>'.$oPage->sContent.'</p>
					</div>';

		return $sHTML;
	}

	//this is terrible so we will use (framework)view engine in the future. and don't have to do caternation. 

	//create navigation for admin to use.

	static public function renderAdminNav($aSubjects){//render is to build HTML becasue data itself doenst have a certain structure, so it will turn data to a meaningful HTML.
		//each li is one subjects and fisrst one doest have caternation because you can caternation nothingness.
			$sHTML = '<ul>'; 

			for($i=0;$i<count($aSubjects);$i++){//loop list of subjects. ($aSubjects) loop till the end of the list
				$oSubject = $aSubjects[$i];
				$aPages = $oSubject->aPages;
			
				$sHTML .= '<li><h3>'.$oSubject->sSubjectName.'</h3> 							
								<ul>';
				
				for($j=0;$j<count($aPages);$j++){//loop list of pages.
					$oPage = $aPages[$j];
					$sHTML .= '<li><a href="admin_main.php?pageid='.$oPage->iId.'">'.$oPage->sPageName.'</a></li>';
				}					
				
									
				$sHTML .= '</ul></li>';
			}

			$sHTML .= '</ul>
					<a href="admin_new_page.php">+ New page</a>';

			return $sHTML; 
	}

	static public function renderAdminPage($oPage){

		$sHTML = '<div class="two-thirds column">';
		$sHTML .= '<h3>'.$oPage->sPageName.'</h3>
			<p>'.$oPage->sContent.'</p>';

		$sHTML .= '<a href="admin_edit_page.php?pageid='.$oPage->iId.'">+ Edit this page</a></div>';

		return $sHTML;
	}
}
//to render you have to give a data.

// <li><h3>Events</h3>
// 							<ul>
// 								<li><a href="admin_page.html">Lorem.</a></li>
// 								<li><a href="admin_page.html">Dolorem?</a></li>
// 								<li><a href="admin_page.html">Enim.</a></li>
// 							</ul>
// 						</li>
?>