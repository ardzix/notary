 
 <?php  

$arrayWhere = explode(',',$_POST['values']);
$query='SELECT DISTINCT
prosesdoc.TIPEDOKUMENID
FROM
prosesdoc ';

$par = array();
$com = array();
$fun = array();
for($i=0;$i<count($arrayWhere);$i++)
{
	$par[$i]=' `AKTAID` ';
	$com[$i]=' = ';
	$fun[$i]=' OR ';
}

$query= $query.$this->model_core->whereImploder($par,$arrayWhere,$com,$fun);



$dataTableTipeDokumen = $this->model_core->getDataSpecifiedQuery($query);
  
  
  foreach ($dataTableTipeDokumen as $row):       ?>
                     <option value="<?= $row->TIPEDOKUMENID ?>">
                      <?php  echo $this->model_translate->dynamicTranslate('tipedokumen','TIPEDOKUMENID',$row->TIPEDOKUMENID,'TIPEDOKDESC'); ?>
                       </option>
                        <?php endforeach;  ?>
            