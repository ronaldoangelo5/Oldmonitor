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
                        <a href="?modul=tambah_kategori"><input type="button" class="btn btn-default" value="Tambah Kategori"></a>
                    </div>
                    <br/>&nbsp;
                    
                    <div class="panel-body">
                        <div class="adv-table">
                            <table class=" table table-hover general-table" id="dynamic-table">
                                <thead>
                                    <tr>
                                        <th style="width:10%;">No </th>
                                        <th style="width:80%">Kategori</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $no = 1;
                                        $sql    = "SELECT * FROM m_kategori";
                                        $query  = mysqli_query($konek, $sql);
                                        
                                        while($data = mysqli_fetch_array($query)){ ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $data['k_desc'];?></td>
                                            <td>
                                                <a href="?modul=edit_kategori&id=<?php echo $data['k_id']?>"><span class="label label-warning label-mini">edit</span></a>
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