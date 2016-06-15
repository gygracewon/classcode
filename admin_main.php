<?php
require_once('includes/admin_header.php');
require_once('includes/view.php');


	//end of admin header 
$iCurrentPageId = 1;
//check if we have pageid  n querystring
if(isset($_GET['pageid']) == true ){//if I do if 
	$iCurrentPageId = $_GET['pageid'];
}

//load page from database
$oPage = new Page();
$oPage->load($iCurrentPageId);

//render page into HTML
echo View::renderAdminPage($oPage);

require_once('includes/footer.php');
?>