<?php
session_start();
$_SESSION['USERNAME'] = $this->session->userdata('USERNAME'); // Must be already set

?>
<!DOCTYPE html>
<html lang="en">
    <!-- header tag start here -->
    <head>
		<script>
			var url_ = '<?= base_url() ?>';
		</script>
        <script type="text/javascript" src="<?= NOTARY_ASSETS ?>chat/js/jquery.js"></script>
        <script type="text/javascript" src="<?= NOTARY_ASSETS ?>chat/js/chat.js"></script>

        <link type="text/css" rel="stylesheet" media="all" href="<?= NOTARY_ASSETS ?>chat/css/chat.css" />
        <link type="text/css" rel="stylesheet" media="all" href="<?= NOTARY_ASSETS ?>chat/css/screen.css" />

        <?= $this->load->view('slice/header-content'); ?>
        <!-- jquery untuk handle table -->
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/datatables/jquery.dataTables.min.js'></script>

        <!-- jquery validation engine -->
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/validationEngine/languages/jquery.validationEngine-en.js'></script>
        <script type='text/javascript' src='<?= NOTARY_ASSETS ?>js/plugins/validationEngine/jquery.validationEngine.js'></script>
    </head>
    <body>    
        <div id="loader"><img src="<?= NOTARY_ASSETS ?>img/loader.gif"/></div>
        <div class="wrapper">

            <!-- sidebar menu start here -->
            <?= $this->load->view('slice/sidebar'); ?>

            <div class="body">

                <!-- header menu start here -->
                <?= $this->load->view('slice/header-menu'); ?>

                <!-- content start here -->
                <div class="content">

                    <div class="page-header">
                        <div class="icon">
                            <span class="ico-chat"></span>
                        </div>
                        <h1>Chatting <small> Chatting dengan user lain</small></h1>
                    </div>


                    <div class="row-fluid">
                        <div class="span12">
                            <div class="block">
                                <div class="head dblue">
                                    <div class="icon"><span class="ico-layout-9"></span></div>
                                    <h2>User Yang Sedang Online</h2>
                                    <ul class="buttons">
                                        <li><a href="#" onClick="source('table_sort_pagination');
                                                return false;"><div class="icon"><span class="ico-info"></span></div></a></li>
                                    </ul>                                                        
                                </div>                
                                <div class="data-fluid">
                                    <table class="table fpTable lcnp" cellpadding="0" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" class="checkall"/></th>
                                                <th width="20%">Username</th>
                                                <th width="30%">Employee</th>
                                                <th width="30%">Status User</th>
                                                <th width="20%" class="TAC">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($user as $row):
                                                ?>
                                                <tr>
                                                    <td><input type="checkbox" name="order[]" value="528"/></td>
                                                    <td><?= $row->USERNAME ?></td>
                                                    <td>
                                                        <?php
                                                        if ($row->EMPLOYEEID == '') {
                                                            echo "-";
                                                        } else {
                                                            echo $this->model_translate->employee($row->EMPLOYEEID);
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if ($row->EMPLOYEEID == '') {
                                                            echo "-";
                                                        } else {
                                                            echo $this->model_translate->statususer($row->STATUSUSERID);
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0)" onclick="javascript:chatWith('<?= $row->USERNAME ?>','<?= base_url() ?>')">Chat</a>
                                                    </td>
                                                </tr>
                                                <?php
                                            endforeach;
                                            ?>                     
                                        </tbody>
                                    </table>                    
                                </div> 
                            </div> 
                        </div>
                        <?= $this->load->view('slice/tambal'); ?>
                    </div>                
                </div>               
            </div>
        </div>
    </div>
</body>
</html>