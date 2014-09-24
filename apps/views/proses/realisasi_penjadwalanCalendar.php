
        <style type="text/css">
.calendar {
	font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif;
	width: 100%;
}

.calendar tbody tr:first-child th {
	color: #505050;
	font-size: 12px;
	margin: 0 0 0 0;
}

.day_header {
	font-weight: normal;
	text-align: center;
	color: #fff;
	border:none;
	background-color:#06C;
}

.tdWrapper {
	width: 14%; /* Force all cells to be about the same width regardless of content */
	border:1px inset #A4A4FF;
	height: 35px;
	vertical-align: top;
	font-size: 10px;
	padding: 0;
	cursor:pointer;
}

.day_listing {
	display: block;
	text-align: right;
	font-size: 12px;
	padding: 5px 5px 0 0;
}

.penuh{
	background:#590202;
	display: block;
	height:100%;
	color: #fff;
}

.hampirPenuh{
	background:#AE1F1F;
	display: block;
	height:100%;
	color: #fff;
}

.tengahTengah{
	background:#DA1D1D;
	display: block;
	height:100%;
	color: #070;
}

.hampirKosong{
	background:#CB5254;
	display: block;
	height:100%;
	color: #070;
}


.libur{
	background:#F00;
	display: block;
	height:100%;
	color: #fff;
}

.default{
	display: block;
	height:100%;
	color: #000;
}

.tdWrapper :hover {
	background: #0CF;
}

</style>
<br>
<p>
<div align="center" style="font-size:14px; font-family:'Palatino Linotype', 'Book Antiqua', Palatino, serif; background-color:#036; padding:10px 10px 10px 10px; color:#fff" ><a href="#calendar" onClick="changeMonth(0)">&lt;&lt;</a>&nbsp;&nbsp;&nbsp;<?php echo $month." - ".$year; ?>&nbsp;&nbsp;&nbsp;<a href="#calendar" onClick="changeMonth(1)">&gt;&gt;</a></div>
<?php echo $this->calendar->generate($year,$mon,$calendarContent); ?></p>
<table width="100%">
  <tr>
    <td bgcolor="#590202" width="15">&nbsp;</td>
    <td>Terisi 100%</td>
    <td bgcolor="#AE1F1F" width="15">&nbsp;</td>
    <td>Terisi ± 75%</td>
    <td bgcolor="#DA1D1D" width="15">&nbsp;</td>
    <td>Terisi ± 50%</td>
    <td bgcolor="#CB5254" width="15">&nbsp;</td>
    <td>Terisi ± 25%</td>
  </tr>
</table><script language="javascript">

 	function changeMonth(next){		
		var year = <?php echo $year; ?>;
		var mon = <?php echo $mon; ?>;
		
		if(next==1)
		{
			if(mon==12)
			{
				mon=1;
				year++;
			}
			else
				mon++;
		}
		else
		{
			if(mon==1)
			{
				mon=12;
				year--;
			}
			else
				mon--;
		}
		
		var empId = $("#employeeId").val();
		
       	var data = {empId:empId,mon:mon,year:year};
        $.ajax({
            type: "POST",
            url : "<?= base_url() ?>proses/realisasi/penjadwalanClendar",
            data: data,
            success: function(msg){
                $('#calendar').html(msg);
            }
        });	
		
		
    }
	
	function generateDaySchedule(day)
	{
		var year = <?php echo $year; ?>;
		var mon = <?php echo $mon; ?>;
		var month = '<?php echo $month; ?>';
		var empId = $("#employeeId").val();
		
		document.getElementById('labelJadwal').innerHTML="Jadwal pada tanggal "+day+" "+month+" "+year+" :";
		
		var data = {empId:empId,day:day,mon:mon,year:year};
		$.ajax({
            type: "POST",
            url : "<?= base_url() ?>proses/realisasi/penjadwalanJadwal",
            data: data,
            success: function(msg){
                $('#tableJadwal').html(msg);
            }
        });	
		
		document.getElementById("yearForm").value=year;
		document.getElementById("monForm").value=mon;
		document.getElementById("dayForm").value=day;
		document.getElementById('jadwal').style.visibility="visible";
		document.location="#jadwal";
		
	    $("#yearFormE").val(year);
	    $("#monFormE").val(mon);
	    $("#dayFormE").val(day);
	}
  </script>
