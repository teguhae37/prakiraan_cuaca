<?php
    $propinsi = $_POST['propinsi'];    
    $url = "http://data.bmkg.go.id/propinsi_".$propinsi."_2.xml";
    $sUrl = file_get_contents($url, False);
    $xml = simplexml_load_string($sUrl);
    foreach($xml->Isi->Row as $row){
        echo "<option value='".$row->Kota."'>".$row->Kota."</option>";
    }
?>
