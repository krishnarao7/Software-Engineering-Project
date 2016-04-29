

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
                        <h3 class="page-header">Current Services</h3>

                        <table class="table table-bordered table-hover"> 
                            <thead> 
                                <tr> 
                                    <th>#</th> 
                                    <th>Service ID</th> 
                                    <th>Service Name</th> 
                                    <th>Service Description</th>
                                    <th></th> 
                                
                                </tr> 
                            </thead> 
                            <tbody> 
                              <?php error_reporting(E_ERROR | ~E_WARNING | E_PARSE | E_NOTICE);
                              $count=1; foreach ($listServices as $row){ ?>
                                <tr> 
                                    <th scope="row"><?php echo $count; ?></th> 
                                    <td><?php echo $row['SId']; ?></td> 
                                    <td><?php echo $row['Sname']; ?></td> 
                                    <td><?php echo $row['SDesc']; ?></td> 
                                    <td>
                                        <input type="hidden" value="<?php echo $row['GId'];?>">
                                        <button type="button" class="btn btn-block btn-warning " onclick="location.href='<?php echo base_url()?>index.php/sp_controller/removeService<?php echo "/".$row['GId']; ?>'">Delete</button>
                                    </td>
                                </tr> 
                              <?php $count++;} ?>
                            </tbody> 
                        </table>


                        <hr>
                            <h3 class="page-header">Add New Service</h3>

                            <form method="post" action="<?php echo base_url(); ?>index.php/sp_controller/AddServices">
                                <label for="exampleInputEmail1">Types of Services</label>
                                <div class="row">
                                  <div class="form-group col-md-5">
                                    
                                    <select class="form-control" id="service" name="SPServices">
                                        <?php foreach ($types as $item){ ?>

                            <option  value="<?php echo $item->SId ?>" class="list-group-item"><?php echo $item->Sname ?></a>
                                        <?php } ?>
                                      
                                      
                                    </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="hidden" name="SPId" value="1">
                                    <button type="submit" class="btn btn-block btn-primary ">Submit</button>
                                    </div>

                              </div>
                              
                            </form>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->


        </div>
        <!-- /#page-wrapper -->
