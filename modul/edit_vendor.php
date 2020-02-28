        <div class="row">	
			<div class="col-md-12">
				<section class="panel">
                    <div class="panel-body">
                        <div class="prf-contacts">
						    <div class="location-info">
                                <div class="row">
                                <br/><br/>
                                    <form role="form" class="form-horizontal" action="action/update_vendor.php" method="POST">
                                        
                                        <?php 
                                            $id     = $_GET['id'];
                                            $sql    = "SELECT * FROM m_vendor WHERE v_id = $id";
                                            $query  = mysqli_query($konek, $sql);
                                            $data   = mysqli_fetch_array($query);
                                        ?>

                                        <input type="hidden" id="v_id" name="v_id" value="<?php echo $data['v_id']?>">

                                        <div class="form-group">
                                            <label class="col-lg-3">Nama Vendor</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" id="nama_vendor" name="nama_vendor" value="<?php echo $data['v_name']?>" required placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3">PIC Vendor</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" id="pic_vendor" name="pic_vendor" value="<?php echo $data['v_pic']?>" required placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3">No. Telp PIC</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" id="no_pic" name="no_pic" value="<?php echo $data['v_pic_telp']?>" required placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3">Email</label>
                                            <div class="col-lg-4">
                                                <textarea rows="10" cols="30" class="form-control" id="email" name="email"><?php echo $data['v_email']?></textarea>
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