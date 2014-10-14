<?php 

class calendarModel extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function statusJadwal($empId,$year,$mon)
	{
		$data=array();
			
			for($i=1;$i<=31;$i++)
			{
				$query = 'SELECT
						Sum(aktivitasnotaris.TOTALJAM)  as TOTALJAM
						FROM
						aktivitasnotaris
						WHERE
						aktivitasnotaris.EMPLOYEEID = '.$empId.' AND
						YEAR(aktivitasnotaris.AWALAKTIFITAS) = '.$year.' AND
						MONTH(aktivitasnotaris.AWALAKTIFITAS) = '.$mon.' AND
						DAY(aktivitasnotaris.AWALAKTIFITAS) = '.$i.'
						';
						
				$result = $this->model_core->getDataSpecifiedQuery2($query);
				foreach($result as $row){$totalJam = $row['TOTALJAM'];}
						
				$data[$i]="default";//libur,penuh,hampirPenuh,hampirKosong,default
				if($totalJam>=2)
					$data[$i]="hampirKosong";
				if($totalJam>=4)
					$data[$i]="tengahTengah";
				if($totalJam>=6)
					$data[$i]="hampirPenuh";
				if($totalJam>=8)
					$data[$i]="penuh";
				
			}
		return $data;
	}
	
}