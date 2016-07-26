<?php
print_r($_FILES);
move_uploaded_file($_FILES['file']['tmp_name'],'./upload/'.$_FILES['file']['name']);
?>