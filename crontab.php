<?Php
	/**
	* 
	*/
	class Test
	{
		
		
		function connection()
		{
			$dbserver = 'localhost';
			$dbusername = 'root';
			$dbpassword = 'notary';
			$dbname = 'notary';

			return $link = mysqli_connect($dbserver,$dbusername,$dbpassword,$dbname);
		}

		function crowling_and_compared()
		{

			$con=$this->connection();
			$query="select * from prosestran JOIN proses ON proses.PROSESID = prosestran.PROSESID";

			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			} else {
				$data=mysqli_query($con, $query);
				while($row = mysqli_fetch_array($data)) {
					$date1 = date('Y-m-d');
					$date2 = date('Y-m-d', strtotime($row['TGLDEADLINE']));

					$diff = abs(strtotime($date2) - strtotime($date1));

					$years = floor($diff / (365*60*60*24));
					$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
					$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

					$pic=null;
					if($row['PICALERTPROSTRAN']==null){
						$pic = $row['DEFPICALERT'];
					} else {
						$pic = $row['PICALERTPROSTRAN'];
					}

					$spv=null;
					if($row['SPVALERTPROSTRAN']){
						$spv = $row['DEFSPVALERT'];
					} else {
						$spv = $row['SPVALERTPROSTRAN'];
					}

					
					$sat = null;
					if($row['SATALERT'] == null){
						$sat = $row['DEFSATALERT'];
					} else {
						$sat = $row['SATALERT'];
					}
					$sat_data=mysqli_query($con, "select * from satuanwaktustd where SATWAKTUSTDID = $sat");
					while($row1 = mysqli_fetch_array($sat_data)) {
						$spv=$spv*$row1['KONVERSI'];
						$pic=$pic*$row1['KONVERSI'];
						//break;
					}

					echo $pic." -- selisih :".$years." - ".$months." - ".$days;
					
					$pembanding=($years*365)+($months*30)+$days;
					if($pembanding < $pic || strtotime($date2) < strtotime($date1)){
						$this->update_alert_pic($row['PROSESTRANID']);
						echo "==> update PIC";
					}

					if ($pembanding < $spv || strtotime($date2) < strtotime($date1)) {
						$this->update_alert_spv($row['PROSESTRANID']);
						echo "==> update SPV";
					}
					echo "<br/>";
			  	}
			}
		}

		function update_alert_spv($idp_trans)
		{
			$c=$this->connection();
			mysqli_query($c, "update prosestran SET ALERTSPV = 1 where PROSESTRANID = $idp_trans");
			
			$get_notif=mysqli_query($c, "select * from notifikasi where PROSESTRANID = $idp_trans");
			$getakta=mysqli_query($c, "SELECT akta.AKTADESC, transaksipra.SUPERVISOR, transaksipra.TRANSAKSIPRAID, prosestran.* from prosestran JOIN aktatran ON prosestran.PROSESTRANID = aktatran.CURRENTPROSES JOIN akta ON akta.AKTAID = aktatran.AKTAID
										JOIN transaksipra ON aktatran.TRANSAKSIPRAID = transaksipra.TRANSAKSIPRAID where prosestran.PROSESTRANID = $idp_trans limit 1");
				$get_nama_akta=null;
				$tgl_akhir=null;
				$employe = null;
				$transaksipraid = null;
				while($row1 = mysqli_fetch_array($getakta)) {
					$get_nama_akta = $row1['AKTADESC'];
					$tgl_akhir = $row1['TGLSELESAI'];
					$employe = $row1['SUPERVISOR'];
					$transaksipraid = $row1['TRANSAKSIPRAID'];
				}


			$id_notif =null;
			while ($r = mysqli_fetch_array($get_notif)){
				$id_notif = $r['NOTIFIKASIID'];
			}

			if($id_notif==null){
				mysqli_query($c, "INSERT INTO `notifikasi` (`TIPE`, `MESSAGE1`, `MESSAGE2`, `EMPLOYEEID`, `LINK`, `PROSESTRANID`) 
							VALUES(2, 'Alert : $get_nama_akta', 'deadline: $tgl_akhir', $employe, 'proses/detail_pasca_realisasi/$transaksipraid', $idp_trans)");
			} else {
				mysqli_query($c, "UPDATE notifikasi SET STATUS = 0 where NOTIFIKASIID = $id_notif");
			}
			mysqli_close($c);
		}

		function update_alert_pic($idp_trans)
		{
			$c=$this->connection();
			mysqli_query($c, "update prosestran SET ALERTPIC = 1 where PROSESTRANID =". $idp_trans);
			$get_notif=mysqli_query($c, "select * from notifikasi where PROSESTRANID =". $idp_trans);
			$getakta=mysqli_query($c, "SELECT akta.AKTADESC, " .
				"transaksipra.EMPLOYEEID, transaksipra.TRANSAKSIPRAID, " .
				"prosestran.* ".
				"from prosestran ".
				"JOIN aktatran ON prosestran.PROSESTRANID = aktatran.CURRENTPROSES ".
				"JOIN akta ON akta.AKTAID = aktatran.AKTAID" .
				"JOIN transaksipra ON aktatran.TRANSAKSIPRAID = transaksipra.TRANSAKSIPRAID" . 
				"WHERE prosestran.PROSESTRANID = ".$idp_trans." limit 1");
				$get_nama_akta=null;
				$tgl_akhir=null;
				$employe = null;
				$transaksipraid = null;
				while($row1 = mysqli_fetch_array($getakta)) {
					$get_nama_akta = $row1['AKTADESC'];
					$tgl_akhir = $row1['TGLSELESAI'];
					$employe = $row1['EMPLOYEEID'];
					$transaksipraid = $row1['TRANSAKSIPRAID'];
				}

			$id_notif =null;
			while ($r = mysqli_fetch_array($get_notif)){
				$id_notif = $r['NOTIFIKASIID'];
			}

			if($id_notif==null){
				mysqli_query($c, "INSERT INTO `notifikasi` (`TIPE`, `MESSAGE1`, `MESSAGE2`, `EMPLOYEEID`, `LINK`, `PROSESTRANID`) 
							VALUES(2, 'Alert : ".$get_nama_akta."', 'deadline: ".$tgl_akhir."', ".$employe.", 'proses/detail_pasca_realisasi/".$transaksipraid."', ".$idp_trans.")");
			} else {
				mysqli_query($c, "UPDATE notifikasi SET STATUS = 0 where NOTIFIKASIID = ".$id_notif);
			}
			mysqli_close($c);
		}
	}

	$run = new Test();
	$run->crowling_and_compared();
?>
