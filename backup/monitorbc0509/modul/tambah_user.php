        <div class="row">	
			<div class="col-md-12">
				<section class="panel">
                    <div class="panel-body">
                        <div class="prf-contacts">
						    <div class="location-info">
                                <div class="row">
                                <br/><br/>
                                    <form role="form" class="form-horizontal" action="action/create_user.php" method="POST">
                                        
                                        <div class="form-group">
                                            <label class="col-lg-3">Nama CRM</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" id="nama_crm" name="nama_crm" required placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3">Username</label>
                                            <div class="col-lg-4">
                                                <input type="text" class="form-control" id="username" name="username" required placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3">Email</label>
                                            <div class="col-lg-4">
                                                <input type="email" class="form-control" id="email" name="email" required placeholder="admin@example.com">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3">Password</label>
                                            <div class="col-lg-4">
                                                <input type="password" class="form-control" id="password" name="password" required placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-3">Level</label>
                                            <div class="col-lg-4">
                                                <select id="level" name="level" class="form-control">
                                                    <option value="2">PIC</option>
                                                    <option value="1">Admin</option> 
                                                </select>
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