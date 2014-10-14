var x = 1;

function cek(){
    $.ajax({
        url: "cekpesan.php",
        cache: false,
        success: function(msg){
		var pisah = msg.split("|");
		if(pisah[1]=="1"){}
		else{
            
			tampildataNotif(msg); //memanggil function tampildataNotif untuk menampilkan Notif Popup
		}
		$("#notifikasi").html(pisah[0]);
        }
    });
    var waktu = setTimeout("cek()",3000);
}

function tampildataNotif(datanya){
	var pisah = datanya.split("|");
	
	$.gritter.add({
				title: pisah[3], 
				text: pisah[4],		
				sticky: false,
				image: 'gambar/nopic.jpg',
				time: '',
				before_open: function(){
                    if($('.gritter-item-wrapper').length == 1)
                    {
                       
                        return false;
                    }
                },
				after_open: function(e){
					 bunyiNotif();
				},
				after_close: function(e, manual_close){
                    simpandataTerkirim(pisah[7])
				}
			});

			return false;

}

function simpandataTerkirim(dataID)
{
		var code = "1";
			$.ajax(
			{
				type: "POST",
				url: "status.php",
				data: "code=" + code + "&IDnotif="+dataID,
				cache: false,
				success: function(message)
				{	
					
				}
			});
}

$(document).ready(function(){
$.extend($.gritter.options, { // for light notifications (can be added directly to $.gritter.add too)
		    position: 'bottom-left',
			fade_out_speed: 3000 // how fast the notices fade out
});
    cek();
    $("#pesan").click(function(){
        $("#loading").show();
        if(x==1){
            $("#pesan").css("background-color","#efefef");
            x = 0;
        }else{
             $("#pesan").css("background-color","#4B59a9");
            x = 1;
        }
        $("#info").toggle();
        //ajax untuk menampilkan pesan yang belum terbaca
        $.ajax({
            url: "lihatpesan.php",
            cache: false,
            success: function(msg){
                $("#loading").hide();
                $("#konten-info").html(msg);
            }
        });

    });
    $("#content").click(function(){
        $("#info").hide();
        // $("#pesan").css("background-color","#4B59a9");
        x = 1;
    });
});


function bunyiNotif(){
	var sound1 = "assets/sound/x.ogg";
	var sound2 = "assets/sound/x.mp3";
	var sound3 = "assets/sound/x.wav";
	$('<audio id="chatAudio"><source src="'+sound1+'" type="audio/ogg"><source src="'+sound2+'" type="audio/mpeg"><source src="'+sound3+'" type="audio/wav"></audio>').appendTo('body');
	$('#chatAudio')[0].play();
}