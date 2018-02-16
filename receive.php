<?php
if(!empty($_FILES)){
	print_r($_FILES);
	move_uploaded_file($_FILES['file']['tmp_name'],'./phptests/'.$_FILES['file']['name']);
}else{
	echo "NO FILE";
}
?>