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
                                    $sql    = "SELECT * FROM m_kategori WHERE k_id = $id";
                                    $query  = mysqli_query($konek, $sql);
                                    $data   = mysqli_fetch_array($query);
                                    ?>

                                    <form role="form" class="form-horizontal" action="action/update_kategori.php" method="POST">
                                        
                                        <input type="hidden" id="k_id" name="k_id" value="<?php echo $id ?>">
                                        <div class="form-group">
                                            <label class="col-lg-3">Kategori Kendala</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" id="kategori" name="kategori" required value="<?php echo $data['k_desc']?>">
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