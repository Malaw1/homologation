<?php

// $path="uploads/overviews/myfile.pdf";

$path = 'storage/app/public/uploads/modules/4/1/M6cdaWp8uU.pdf';

// $path =  asset('storage/uploads/modules/'.auth()->user()->id.'/'.$_GET['id'].'/'.$_GET['file']) ;
// header('content-type:application/pdf');

echo file_get_contents($path);

?>
