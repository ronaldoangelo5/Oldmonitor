        <?php
            $lvl = $_SESSION['lvlmon'];
            $uid = $_SESSION['idmon'];

            if(isset($_SESSION['notif'])){
                if($_SESSION['notif'] == 1){
                    echo   '<div class="alert alert-success fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                                <strong>Well done!</strong> You successfully read this important alert message.
                            </div>';
                    unset($_SESSION['notif']);
                }
                elseif($_SESSION['notif'] == 2){
                    echo   '<div class="alert alert-danger fade in">
                                <button data-dismiss="alert" class="close close-sm" type="button">
                                    <i class="fa fa-times"></i>
                                </button>
                                <strong>Well done!</strong> You successfully read this important alert message.
                            </div>';
                    unset($_SESSION['notif']);
                }
                else{
                    echo '';
                }
            }
        ?>
        
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    
                    <br/>
                    <div class="col-md-5">
                        <a href="?modul=tambah_user"><input type="button" class="btn btn-default" value="Tambah User"></a>
                    </div>
                    <br/>&nbsp;


                    <div class="panel-body">
                        <div class="adv-table">
                            <table class=" table table-hover general-table" id="dynamic-table">
                                <thead>
                                    <tr>
                                        <th>No </th>
                                        <th>Nama CRM</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>level</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        $sql    = "SELECT * FROM m_user";
                                        $query  = mysqli_query($konek, $sql);
                                        
                                        while($data = mysqli_fetch_array($query)){ ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $data['u_name_crm'];?></td>
                                            <td><?php echo $data['u_name'];?></td>
                                            <td><?php echo $data['u_email'];?></td>
                                            <?php 
                                                $level = $data['u_level'];
                                                if($level==1){ ?>
                                                    <td><span class="label label-info label-mini"><?php echo "ADMIN";?></span></td>
                                                <?php }
                                                else{ ?>
                                                    <td><span class="label label-primary label-mini"><?php echo "PTL";?></span></td>
                                                <?php }
                                            ?>
                                            

                                            <td>
                                                <a href="#"><span class="label label-warning label-mini">edit</span></a>
                                                <a href="#"><span class="label label-danger label-mini">delete</span></a>
                                            </td>
                                        </tr>
                                        <?php 
                                        $no++;
                                        }
                                    ?>
                                
                                
                                </tbody>
                            </table>
                        </div>    
                    </div>
                </section>
            </div>
        </div>