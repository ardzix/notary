<?php 

$this->load->model('model_core');
$parent = $this->model_core->getDataSpecifiedWthWhere('proses',array('PROSESID', 'PROSESDESC'),array('PROSESPARENT',$_POST['values']));

 ?>
                                    <div class="row-form">
                                      <div class="span4">Buat proses pada level ini:</div>
                                      <div class="span8">
                                        <input id="deskripsiProses3" type="text" name="deskripsiProses3"/>
                                        <span class="bottom">Wajib diisi jika ingin membuat proses pada level 4</span></div>
                                    </div>
                                    <div class="row-form">
                                      <div class="span4">Atau di bawah level:</div>
                                        <div class="span8">
                                            <select  name="parent3" id="parent3" >
                                                                <option value="0">Memilih proses pada level ini</option>
                                                                <?php
                                                                foreach ($parent as $row):
                                                                    ?>
                                                                    <option value="<?= $row->PROSESID; ?>"><?= $row->PROSESDESC; ?></option>
                                                                    <?php
                                                                endforeach;
                                                                ?>                                  
                                            </select>
                                        </div>
                                    </div>
                                    
<script language="javascript">
$("#parent3").change(function(){
		
		var comboValue = document.getElementById("parent3").value;
        var data = {values:comboValue};
//		alert(comboValue);

		
		if(comboValue!=0)
		{
			document.getElementById("deskripsiProses3").disabled=true;
		  $.ajax({
			type: "POST",
			url : "<?= base_url() ?>master_data/proses_master/setupProsesFormGenerator3",
			data: data,
			success: function(msg){
				$('#formGenerated3').html(msg);
			}
           });
			$('#formGenerated4').html("");
		}
		else
		{
			$('#formGenerated3').html("");
			$('#formGenerated4').html("");
			document.getElementById("deskripsiProses3").disabled=false;
		}
	});
</script>                                    