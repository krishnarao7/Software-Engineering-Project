

        <!-- Page Content -->
        <script type="text/javascript">
            function myfun(a)
            {
                document.getElementById("texto").removeAttribute("readonly");
                document.getElementById("edit").style.display="none";
                document.getElementById("save").style.display="inherit";
            }

        </script>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">MY SERVICES</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
                    <div class="col-lg-9 col-lg-offset-1">
                        <h3 class="page-header">Manage Profile </h3> 
                                <div class="col-lg-6">
                                <?php foreach ($spprofile as $key) {    ?>
                                   
                                    <h4><em><?php echo $key->Email; ?></em></h4>
                                    <hr>
                                </div>
                                <div class="clearfix"></div>
                             <div class="col-lg-4">
                             <form method="post"  action="<?php echo base_url(); ?>index.php/sp_controller/manageProfile">
                                
                              <div class="form-group">
                                <label for="exampleInputEmail1">My Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Full Name" value="<?php echo $key->SPName; ?>">
                              </div>
                            <br/>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Phone No</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Phone No" value="<?php echo $key->SPPhone; ?>">
                              </div>
                              <br/>

                              <div class="form-group">
                                <label for="exampleInputEmail1">Address</label>
                                <textarea class="form-control" rows="3"><?php echo $key->SPName; ?></textarea>
                              </div>
                              <br/>

                              <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Phone No" value="<?php echo $key->Password; ?>">
                              </div>
                              <br/>

                              <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Phone No" value="<?php echo $key->Password; ?>">
                              </div>

                               <div class="form-group">
                                <br>
                                <input type="submit" class="form-control btn btn-info" id="exampleInputEmail1"value="Update">
                              </div>
                            </div>

                                <div class="col-lg-5 col-lg-offset-1">
                                    <?php $url = base_url() . "" . $key->SPPhoto ?>
                                <img src="<?php echo $url; ?>" class="img-thumbnail" width="400px" height="400px">
                                </div>

                             </form>
                           
                        <?php  }    ?>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->


        </div>
        <!-- /#page-wrapper -->
