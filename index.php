<?php 
include("web_scraping/simple_html_dom.php");
include 'vendor/Behat-Transliterator/Transliterator.php';
include 'vendor/jeroendesloovere-vcard/VCard.php';

use JeroenDesloovere\VCard\VCard;

$website_url = "http://localhost/fatema/murasalaat.php";
$html = file_get_html($website_url);

//echo $html;
 
 $data1 = array();
 

 
foreach($html->find('tr span') as $index => $amil_date)
 {

	 $data1[] = $amil_date->text();
	 
 }
 //print_r($data1);	
 $html_data = "";
 $cnt = count($data1);
 $srno=0;
 $name=1;
  $email=7;
  $phone=6;
  $itsid=2;
  $mauze=4;
  $ummal=5;

 

 
for($i=0;$i<=$cnt;$i+8)
 {      $vcardObj = new VCard();
 
		$vcardObj->addName($data1[$name]);
		
        $vcardObj->addEmail($data1[$email]);
        $vcardObj->addPhoneNumber($data1[$phone],'WORK');
        //$vcardObj->addAddress($data1[$itsid] . " " . $data1[$mauze] . " " .$data1[$ummal] . " ");
        
		$vcard->setSavePath('Contacts');
		return $vcard->download();

		
		//$vcardobj->save();		
       // $vcardObj->download();
		// save vcard on disk
		

	 $srno = $srno+8;
	 $name = $name+8;
	 $email = $email+8;
	 $phone = $phone+8;
	 $itsid = $itsid+8;
	 $mauze = $mauze+8;
	 $ummal = $ummal+8;
 }
?>