<html>
    <head>
        <title>Prakiraan Cuaca</title>
        <script type="text/javascript" src="asset/js/jquery-1.7.2.min.js"></script>
        <link href="asset/css/bootstrap.css" rel="stylesheet">
    
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCozHnZDqprb-O-sWBAhH7uIxqkcGS0DU&sensor=false">
    </script>
    <script type="text/javascript">
      
    </script>
    
    </head>
    <body>
        <div>
            <table width="700" align="center" border="1" cellspacing="2" cellpadding="2">
                <tr>
                    <td colspan="2">
                        <select name="propinsi" id="propinsi">
                            <option>Pilih Propinsi</option>
                            <option value='01'>Aceh</option>
                            <option value='02'>Sumatera Utara</option>
                            <option value='03'>Sumatera Barat </option>
                            <option value='04'>Jambi</option>
                            <option value='05'>Bengkulu</option>
                            <option value='06'>Riau</option>
                            <option value='07'>Riau Kepulauan</option>
                            <option value='08'>Sumatera Selatan</option>
                            <option value='09'>Bangka Belitung</option>
                            <option value='10'>Lampung</option>
                            <option value='11'>Banten</option>
                            <option value='12'>    </option>
                            <option value='13'>Jawa Barat</option>
                            <option value='14'>Jawa Tengah</option>
                            <option value='15'>DI Yogyakarta</option>
                            <option value='16'>Jawa Timur</option>
                            <option value='17'>Bali</option>
                            <option value='18'>Nusa Tenggara Barat</option>
                            <option value='19'>Nusa Tenggara Timur</option>
                            <option value='20 '>Kalimantan Barat</option>
                            <option value='21'>Kalimantan Tengah</option>
                            <option value='22'>Kalimantan Selatan</option>
                            <option value='23'>Kalimantan Timur </option>
                            <option value='24'>Gorontalo</option>
                            <option value='25'>Sulawesi Utara Kepulauan</option>
                            <option value='26'>Sulawesi Tengah</option>
                            <option value='27'>Sulawesi Tenggara</option>
                            <option value='28'>Sulawesi Selatan</option>
                            <option value='29 '>Sulawesi Barat</option>
                            <option value='30'>Maluku</option>
                            <option value='31'>Maluku Utara</option>
                            <option value='32'>Papua Barat </option>
                            <option value='33'>Papua</option>
                        </select>
                        <select name="kota" id="kota"></select>
                        <input type="button" name="proses" id="proses" value="Lihat Cuaca" />
                        <span id="loading"></span>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2">
                        <div id="cuaca"></div>
                    </td>
                </tr>
                <tr valign="top">
                    <td colspan="2">
                         <div id="map-canvas"/>
                    </td>
                </tr>
                <tr valign="top" align="center">
                    <td colspan="2">
                         Supported by:<br><br>
                         <img src="asset/pics/bmkg.jpg"/> &nbsp;&nbsp;&nbsp;
                         <img src="asset/pics/google_maps.jpg" /> &nbsp;&nbsp;&nbsp;
                         <img src="asset/pics/wolfram_alpha.jpg"  />
                    </td>
                </tr>
                <tr valign="top" align="center">
                    <td colspan="2">
                        <h4>Tugas DADD</h4>
                        Anggota Kelompok
                        <br><br>
                        <div style="width: 70%; text-align: left">
                            <ol>
                                <li>13/356282 /PPA/04383 Teguh Andriyanto</li>
                                <li>13/354959/PPA/04328 Nola Ritha</li>
                                <li>13/354967/PPA/04329 Dwi Amalia Purnamasari</li>
                                <li>13/354969/PPA/04331 Alena Uperiati</li>
                                <li>13/356471/PPA/04430 Emmi</li>
                            </ol>
                        </div>
                        
                        Pasca Sarjana Ilmu Komputer<br>FMIPA - UGM<br>@2014
                    </td>
                </tr>
            </table>
            
        </div>
    </body>
</html>
 
<div id="translated"></div>

<script type="text/javascript">
$(document).ready(function() {
	
    $("#propinsi").change(function(){
        var propinsi = $("#propinsi").val();
        $.ajax({
            url     : "get_kota.php",
            type    : "POST",
            data    : "propinsi="+propinsi,
            success : function(data){
                $("#kota").html(data);
            }
        });
    })
    
    $('#proses').click(function(){
        var propinsi = $("#propinsi").val();
        var kota = $("#kota").val();
        $('#loading').html("<img src='asset/pics/loader.gif' width='10' height='10' /> Loading...");
        $.ajax({
            url     : "get_cuaca.php",
            type    : "POST",
            data    : "propinsi="+propinsi+"&kota="+kota,
            success : function(data){
                $("#cuaca").html(data);
                $('#loading').html('');
            }
        });
    })
    
})
function initialize(x,y) {
    var mapOptions = {
      center: new google.maps.LatLng(x,y),
      zoom: 8
    };
    var map = new google.maps.Map(document.getElementById("map-canvas"),
        mapOptions);
}


    
</script>
    
