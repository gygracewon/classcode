<?php

// echo '<pre>';
// print_r($_GET);
// echo '</pre>';

require_once('includes/view.php');
require_once('includes/page.php');
require_once('includes/header.php');//Our goal represent page . 

$iCurrentPageId = 1; 
//check if we have pageid in querystring
if(isset($_GET['pageid']) == true ){
	$iCurrentPageId = $_GET['pageid'];
}

//use data from model, so I dont have to 
$oPage = new Page();
$oPage->load($iCurrentPageId);//Forces to load certain page. 

echo View::renderPage($oPage);//get  $oPage from view.php

// <!-- 		<div class="two-thirds column">
// 			<h3>Our goal</h3>
// 			<p>Although coming from different backgrounds, we are united to become web experts. Here are our stories ...</p>
// 		</div>
//  -->
	
require_once('includes/footer.php');
?>

