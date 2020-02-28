        <div class="row">	
			<div class="col-md-12">
				<section class="panel">
                    <div class="panel-body">
                        <div class="prf-contacts">
						    <div class="location-info">
                                <div class="row">
                                <br/><br/>
                                    
                                    <?php 
                                    $id     = $_GET['id']; 
                                    $sql    =  "SELECT * FROM m_progress 
                                                LEFT JOIN m_project ON m_progress.r_p_id=m_project.p_id
                                                LEFT JOIN m_crm2 ON m_project.p_id=m_crm2.c_id
                                                WHERE m_progress.r_id = $id";

                                    $query  = mysqli_query($konek, $sql);
                                    $data   = mysqli_fetch_array($query);
                                    ?>

                                    <form role="form" class="form-horizontal" action="<?php echo $base_url ?>/action/update_log.php" method="POST">
                                        
                                        <input type="hidden" id="id" name="id" value="<?php echo $id ?>">

                                        <div class="form-group">
                                            <div class="col-md-3"><h5 class="bold">PA Node ID</h5></div>
                                            <div class="col-md-9"><h5>: <b><?php echo $data['c_pa_node_id']?></b></h5></div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3">Date</label>
                                            <div class="col-md-4">
                                                <input class="form-control form-control-inline input-medium default-date-picker" value="<?php echo date('m-d-Y', strtotime($data['r_input_date']))?>" name="date" size="16" type="text" />
                                            </div>
                                        </div>


                                        <?php if(($data['r_p_status_progress'] == 2) && ($data['r_p_status'] != 0)){ ?>
                                        <div class="form-group">
                                            <label class="col-lg-3">Kategori Kendala</label>
                                            <div class="col-lg-4">
                                                <select id="kategori" name="kategori" class="form-control">
                                                    <?php 
                                                        $sql5 	= "SELECT * FROM m_kategori ORDER BY k_desc ASC";
                                                        $query5 = mysqli_query($konek, $sql5);
                                                        while ($data5 = mysqli_fetch_array($query5)){?>
                                                            <option <?php if($data5['k_id'] == $data['r_kategori']){echo "selected";} ?> value="<?php echo $data5['k_id'];?>"><?php echo $data5['k_desc'];?></option>
                                                        <?php }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3">Description</label>
                                            <div class="col-lg-8">
                                                <textarea rows="5" cols="30" class="form-control" id="desc" name="desc"><?php echo $data['r_desc']?></textarea>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        

                                        <div class="form-group">
                                            <div class="col-lg-offset-3 col-lg-9">
                                                <button class="btn btn-primary" type="submit">Save</button>
                                                <button class="btn btn-default" type="button">Cancel</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>