<?php
//if first arive to a page, there is nothing inside array.
//there is no action, it doenst know where to send and it gets loaded on the same page and array shows all the inputs.(another requrest for another page )in POST request, it has post information in it. 
//GET happens first(empty), and if I write in information, you get the same page ut has POST data.  

// echo'<pre>';
// print_r($_POST);
// echo'</pre>';
require_once('includes/page.php');
require_once('includes/admin_header.php');
require_once('includes/form.php');

//can creat any sort of form with this! 

	$oForm = new Form(); // link from form.php

	//first time, this doesnt run, but if I put data in, it will run.
	if(isset($_POST['submit']) == true){
		//this is a POST request, create a new page
		$oPage = new Page();//create new page
		$oPage->iSubjectId = $_POST['subject_id'];//what user send to the DB. 
		$oPage->sPageName = $_POST['page_name'];
		$oPage->iPosition = $_POST['position'];
		$oPage->iVisible = $_POST['visible'];
		$oPage->sContent = $_POST['content'];

		$oPage->save();// save data 

		//redirect browser to new page
		header('Location:admin_main.php?pageid='.$oPage->iId); //whatever location will be typed in.  id that i pulled out for a database

	}

	$oForm->open();
	$oForm->makeTextInput('Page Name','page_name'); //name of input tend to be similar to the name of column
	$oForm->makeTextInput('Subject ID','subject_id');
	$oForm->makeTextInput('Position','position');
	$oForm->makeTextInput('Visible','visible');
	$oForm->makeTextArea('Content','content');//for text area, I have make a new one. (function)
	$oForm->makeSubmit('Add Page','submit');
	$oForm->close();

?>
		<div class="two-thirds column">
			<h3>New Page</h3>
			<?php echo $oForm->sHTML;?>
<!-- 			<form action ="" method="post"> 
				<label for="page_name">Page Name</label>
				<input type="text" id="page_name" name="page_name" value=""/>

				<label for="subject_id">Subject ID</label>
				<input type="text" id="subject_id" name="subject_id" value=""/>

				<label for="position">Postion</label>
				<input type="text" id="position" name="position" value=""/>

				<label for="visible">Visible</label>
				<input type="text" id="visible" name="visible" value=""/>

				<label for="content">Content</label>
				<textarea id="content" name="content"></textarea>

				<input type="submit" name="submit" value="Add page"/>
			</form> -->
		</div>

<?php
require_once('includes/footer.php');
?>