
<?php
    $propinsi = $_POST['propinsi'];
    $kota = $_POST['kota'];
    
    
    /*$url = "xml/propinsi_".$propinsi."_1.xml";
    $sUrl = file_get_contents($url, False);
    $xml = simplexml_load_string($sUrl);
    foreach($xml->Isi->Row as $row){
        if($row->Kota==$kota){
            $kecepatan_1 = (30-$row->KecepatanAngin)/10;
            $kecepatan_angin_1 = $row->KecepatanAngin;
            $lintang_1 = $row->Lintang;
            $bujur_1 = $row->Bujur;
            $suhu_min_1 = $row->SuhuMin;
            $suhu_max_1 = $row->SuhuMax;
            $kelembapan_min_1 = $row->KelembapanMin;
            $kelembapan_max_1 = $row->KelembapanMax;
            $arah_angin_1 = $row->ArahAngin;
            $cuaca_1 = $row->Cuaca;
        }
    }*/
    
    //$url = "xml/propinsi_".$propinsi."_2.xml";
    $url = "http://data.bmkg.go.id/propinsi_".$propinsi."_2.xml";
    $sUrl = file_get_contents($url, False);
    $xml = simplexml_load_string($sUrl);
    foreach($xml->Isi->Row as $row){
        if($row->Kota==$kota){
            $kecepatan_2 = (50-$row->KecepatanAngin)/20;
            $kecepatan_angin_2 = $row->KecepatanAngin;
            $lintang_2 = $row->Lintang;
            $bujur_2 = $row->Bujur;
            $suhu_min_2 = $row->SuhuMin;
            $suhu_max_2 = $row->SuhuMax;
            $kelembapan_min_2 = $row->KelembapanMin;
            $kelembapan_max_2 = $row->KelembapanMax;
            $arah_angin_2 = $row->ArahAngin;
            $cuaca_2 = $row->Cuaca;
        }
    }
    
    //$url_wa = "http://api.wolframalpha.com/v1/query?input=".$kota."&appid=KPL2RU-X9W23YRPWG";
    $url_wa = "http://api.wolframalpha.com/v1/query?input=".$kota."&appid=U6J9PG-PQ7VP75W2K";
    $sUrl_wa = file_get_contents($url_wa, False);
    $xml_wa = simplexml_load_string($sUrl_wa);
    
?>



<table width="100%">
    <tr align="center" valign="middle">
        <td width="30%"><h3><?php echo 'Cuaca '.$kota; ?></h3></td>
        <td width="30%"><h3>Tgl</h3></td>
        <td><h3><?php echo 'Tentang '.$kota; ?></h3></td>
    </tr>
    <tr valign="top">
        <td>
            <strong><?php echo $cuaca_2;?></strong><br>
            <img src="asset/pics/<?php echo $cuaca_2;?>.gif" />
            <br>
            <br><br>
            <strong>Kecepatan Angin</strong><br>
            <?php echo $kecepatan_angin_2.' Km/Jam';?>
            <div class="mt-scene-label mt-height1 mt-imagerotationeffect">&nbsp;
            <img src="asset/pics/fan.png" alt="" />&nbsp;</div>
        </td>
        <td>
            
            <strong>Suhu</strong><br>
            <?php echo $suhu_min_2." - ".$suhu_max_2;?>
            <br><br>
            <strong>Kelembapan</strong><br>
            <?php echo $kelembapan_min_2." - ".$kelembapan_max_2;?>
            <br><br>
            <strong>Arah Angin</strong><br>
            <?php echo $arah_angin_2;?>
        </td>
        <td>
			<?php
			foreach($xml_wa->pod as $pod){
                            /*if(($pod['id']=='Population:CityData')
                                ||($pod['id']=='CurrentTime:CityData')
                                ||($pod['id']=='CityHierarchyInfo:CityData')
                                ||($pod['id']=='AirportHierarchyInfo:CityData')
                                ||($pod['id']=='FeaturesHierarchyInfo:CityData')
                                ||($pod['id']=='OceansHierarchyInfo:CityData')
                                ||($pod['id']=='NotablePeople:CityData')
                                ||($pod['id']=='FoundingDates:CityData')
                                ){*/
				echo '<strong>'.$pod['title'].'</strong>';
				echo '<br>';
				echo $pod->subpod->plaintext;
				echo '<br><br>';
                            //}
			}
			?>
        </td>
    </tr>

</table>

<style type="text/css">
      #map-canvas { height: 200; width: 100% }
    </style>
<script type="text/javascript">
    initialize(<?php echo $lintang_2.','.$bujur_2;?>);
                google.maps.event.addDomListener(window, 'load', initialize);
</script>

<style type="text/css">
    .title_date{
        background-color: green;
    }
    body {
            background: white;
            color: #black;
    }
    .mt-scene-label {
            width: 100px;
            height: 100px;
            display: block;
            margin: 10px;
            padding: 0px;
    }
    img {
            width: 80px;
            height: 80px;
    }
    .mt-imagerotationeffect img {
            -webkit-transition-duration: <?php echo $kecepatan_2;?>s;
            -moz-transition-duration: <?php echo $kecepatan_2;?>s;
            -o-transition-duration: <?php echo $kecepatan_2;?>s;
            transition-duration: <?php echo $kecepatan_2;?>s;
            -webkit-transition-property: -webkit-transform;
            -moz-transition-property: -moz-transform;
            -o-transition-property: -o-transform;
            transition-property: transform;
            overflow: auto;
    }
    .mt-imagerotationeffect  img {
            animation: imagerotation <?php echo $kecepatan_2;?>s linear normal;
            -moz-animation: imagerotation <?php echo $kecepatan_2;?>s linear infinite;
            /*ubah ini saja*/
            -webkit-animation: imagerotation <?php echo $kecepatan_2;?>s linear infinite;
    }
    @-moz-keyframes imagerotation {
            0% {
                    -webkit-transform:rotate(0deg);
                    -moz-transform:rotate(0deg);
                    -o-transform:rotate(0deg);
                    transform:rotate(0deg)
            }
            100% {
                    -webkit-transform:rotate(360deg);
                    -moz-transform:rotate(360deg);
                    -o-transform:rotate(360deg);
                    transform:rotate(360deg)
            }
    }
    @-webkit-keyframes imagerotation {
            0% {
                    -webkit-transform:rotate(0deg);
                    -moz-transform:rotate(0deg);
                    -o-transform:rotate(0deg);
                    transform:rotate(0deg)
            }
            100% {
                    -webkit-transform:rotate(360deg);
                    -moz-transform:rotate(360deg);
                    -o-transform:rotate(360deg);
                    transform:rotate(360deg)
            }
    }
</style>
