

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">SERVICES</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>

                <div class="row">
                    <div class="col-lg-9 col-lg-offset-1">
                        <h3 class="page-header">Current Services</h3>

                       <!--  -->

                       <table class="table table-bordered table-hover"> 
                           <thead> 
                               <tr> 
                                   <th>#</th> 
                                   <th>Service ID</th> 
                                   <th>Service Name</th> 
                                   <th>Service Description</th>
                                  
                               </tr> 
                           </thead> 
                           <tbody> 
                             <?php $count=1; foreach ($types as $row){ ?>
                               <tr> 
                                   <th scope="row"><?php echo $count; ?></th> 
                                   <td><?php echo $row->SId ?></td> 
                                   <td><?php echo $row->Sname ?></td> 
                                   <td><?php echo $row->SDesc ?></td> 
                                   
                               </tr> 
                             <?php $count++;} ?>
                           </tbody> 
    </table> 

<!--  -->
                        <hr>
                            <h3 class="page-header">Add New Service</h3>

                            <form method="post" action="<?php echo base_url(); ?>index.php/add_new_service/add_service">
                                <label for="exampleInputEmail1">Types of Services</label>
                                <div class="row">
                                    <div class="col-md-5">
                                  <div class="form-group ">
                                    
                                    <input type="text" class="form-control" name="Sname" required >
                                    </div>
                                    <div class="form-group">
                                    <label for="exampleInputEmail1">Description of Services</label>
                                        <input type="hidden" name="SPId" value="1">
                                        <textarea required class="form-control" name="SDesc" rows="4" cols="50" ></textarea>
                                    </div>
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-block btn-primary ">Submit</button>
                                    </div>
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
