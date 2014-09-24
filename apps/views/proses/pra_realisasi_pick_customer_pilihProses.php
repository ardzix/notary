<?php
/*
 * Project Name: notary
 * File Name: pra_realisasi_pilih proses
 * Created on: 23 Jan 14 - 13:14:11
 * Author: PT. KIWARI USAHA NUSANTARA
 * Copyright 2014 PT. KIWARI USAHA NUSANTARA. All rights reserved.
 */
?>

<div class="head">                                
                                    <h2>&nbsp;</h2>
                                </div>                                        
                                <div class="data-fluid">
                                  <div class="row-form">
                                      <div class="span12">
                                            <span class="top title">Dokumen yang diserahkan:</span>
                                            <select name="ms_example2" multiple="multiple" id="msc">
                                              <?php
                                                                foreach ($dataTableTipeDokumen as $row):
                                                                    ?>
                                              <option value="<?= $row->TIPEDOKUMENID ?>">
                                                <?= $row->TIPEDOKDESC ?>
                                              </option>
                                              <?php
                                                                endforeach;
                                                                ?>
                                            </select>
                                        <div class="btn-group">
                                            <button class="btn btn-mini" id="ms_select">Select all</button>
                                            <button class="btn btn-mini" id="ms_deselect">Deselect all</button>
                                        </div>
                                      </div>
                                  </div>
                                    <div class="toolbar bottom tar">
                                        <div class="btn-group">
                                            <button type="button" class="btn" id="listGenerator">Tampilkan Proses Upload File</button>
                                        </div>
                                    </div>
                              </div>