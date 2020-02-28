        <?php
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
                        <a href="?modul=tambah_vendor"><input type="button" class="btn btn-default" value="Tambah Vendor"></a>
                    </div>
                    <br/>&nbsp;

                    <div class="panel-body">
                        <div class="adv-table">
                            <table class=" table table-hover general-table" id="dynamic-table">
                                <thead>
                                    <tr>
                                        <th style="width:10px;">No. </th>
                                        <th style="width:150px;">Nama Vendor</th>
                                        <th style="width:120px;">PIC</th>
                                        <th style="width:120px;">No. PIC</th>
                                        <th style="width:150px;">Email</th>
                                        <th style="width:120px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        $sql    = "SELECT * FROM m_vendor";
                                        $query  = mysqli_query($konek, $sql);
                                        
                                        while($data = mysqli_fetch_array($query)){ ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $data['v_name'];?></td>
                                            <td><?php echo $data['v_pic'];?></td>
                                            <td><?php echo $data['v_pic_telp'];?></td>
                                            <td><?php echo $data['v_email'];?></td>
                                            
                                            <td>
                                                <a href="?modul=edit_vendor&id=<?php echo $data['v_id']?>"><span class="label label-warning label-mini">edit</span></a>
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