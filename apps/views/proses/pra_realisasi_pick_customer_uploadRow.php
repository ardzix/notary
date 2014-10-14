<?php
if(isset($_POST['values']))
{
	$value=explode(',',$_POST['values']);
	for($i=0;$i<$_POST['index'];$i++){
	?>

<tr class="">
                                                    <td><?php echo $i+1; ?></td>
                                                    <td><?php echo $this->model_translate->dynamicTranslate('tipedokumen','TIPEDOKUMENID',$value[$i],'TIPEDOKDESC'); ?></td>
                                                    <td><span class="label label-success">.jpg</span>&nbsp;<span class="label label-success">.png</span>&nbsp;<span class="label label-success">.pdf</span>&nbsp;<span class="label label-success">.docx</span></td>
                                                    <td><input name="file[]" type="file" />
                                                    </td>
                                                </tr>
                                                
<?php } } ?>                                                