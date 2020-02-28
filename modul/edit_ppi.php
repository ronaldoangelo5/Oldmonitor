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
                                    $sql    =  "SELECT * FROM m_ppi
                                                LEFT JOIN m_project ON m_ppi.ppi_project_id=m_project.p_id
                                                LEFT JOIN m_crm2 ON m_project.p_c_id=m_crm2.c_id
                                                WHERE m_ppi.ppi_id = $id";

                                    $query  = mysqli_query($konek, $sql);
                                    $data   = mysqli_fetch_array($query);
                                    ?>

                                    <form role="form" class="form-horizontal" action="<?php echo $base_url ?>/action/update_ppi.php" method="POST">
                                        
                                        <input type="hidden" id="id" name="id" value="<?php echo $id ?>">

                                        <div class="row">
                                            <div class="col-md-3"><h5><b>PA Node</b></h5></div>
                                            <div class="col-md-9"><h5>: <b><?php echo $data['c_pa_node_id']?></b></h5></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3"><h5><b>Customer</b></h5></div>
                                            <div class="col-md-9"><h5>: <?php echo $data['c_cust_name']?></h5></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3"><h5><b>Customer Address</b></h5></div>
                                            <div class="col-md-9"><h5>: <?php echo $data['c_address']?></h5></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3"><h5><b>PIC</b></h5></div>
                                            <div class="col-md-9"><h5>: <?php echo $data['c_pic']?></h5></div>
                                        </div>
                                        <br/><br/>
                                        


                                        <div class="form-group">
                                            <div class="col-md-3"><h5><b>Vendor</b></h5></div>
                                            <div class="col-lg-4">
                                                <select id="vendor" name="vendor" class="form-control">
                                                    <?php 
                                                        $sql1   = "SELECT * FROM m_vendor";
                                                        $query1 = mysqli_query($konek, $sql1);
                                                        while($data1 = mysqli_fetch_array($query1)){ ?>
                                                            <option <?php if ($data1['v_id'] == $data['ppi_vendor']){ echo 'selected';}?> value="<?php echo $data1['v_id']?>"><?php echo $data1['v_name']?></option>
                                                        <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3">Description</label>
                                            <div class="col-lg-8">
                                                <textarea rows="10" cols="30" class="form-control" id="desc" name="desc"></textarea>
                                            </div>
                                        </div>

                                        

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