<?php 

//function createslug($slug){

if(isset($_POST['title'])){

$slug =  $_POST['title'];

$lettersNumbersSpacesHypens = '/[^\-\s\pN\pL]+/u';
$spacesDuplicateHypens = '/[\-\s]+/';

$slug = preg_replace($lettersNumbersSpacesHypens,'',mb_strtolower($slug,'UTF-8'));
$slug = preg_replace($spacesDuplicateHypens, '-', $slug);
$slug = trim($slug, '-');

echo  $slug;

}else{ echo "error"; }

?>