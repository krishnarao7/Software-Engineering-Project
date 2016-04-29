    <!-- Header -->
    

    <!-- Page Content -->
    <div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php foreach ($types as $row) { echo $row['Sname']; ?>
                    <small><?php echo $row['SDesc']; ?> </small>
                    <?php }?>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
                <?php foreach($providers as $row) { ?>
                    
               
            <div class="col-md-4 portfolio-item">
                <a href="#">
                    <img class="img-responsive" src="<?php echo base_url(). $row['SPPhoto'] ?>" alt="" width="210px" height="210px">
                </a>
                <h3>
                    <a href="<?php echo base_url() . 'index.php/home_controller/showProfile/'. $row['SId'] . "/" . $row['SPId'] ?>"><?php echo $row['SPName'];?></a>
                </h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
            </div>

            <?php } ?>
        </div>
        

        <!-- /.row -->

        <hr>

        <!-- Pagination -->
        <div class="row text-center">
            <div class="col-lg-12">
                <ul class="pagination">
                    <li>
                        <a href="#">&laquo;</a>
                    </li>
                    <li class="active">
                        <a href="#">1</a>
                    </li>
                    <li>
                        <a href="#">2</a>
                    </li>
                    <li>
                        <a href="#">3</a>
                    </li>
                    <li>
                        <a href="#">4</a>
                    </li>
                    <li>
                        <a href="#">5</a>
                    </li>
                    <li>
                        <a href="#">&raquo;</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->

    </div>
    <!-- /.container -->

    <!-- jQuery -->
   


