    <!-- Header -->
    

    <!-- Page Content -->
    <div class="container">

        <div class="row">
            
            <div class="col-md-3">
                <p class="lead">Shop Name</p>
                <div class="list-group">

                    <?php foreach ($types as $item){ ?>

                            <a href="<?php echo base_url()."index.php/home_controller/service_type/".$item->SId ?>" class="list-group-item"><?php echo $item->Sname ?></a>
                    <?php } ?>
                    <!--
                        <a href="#" class="list-group-item">Category 1</a>
                        <a href="#" class="list-group-item">Category 2</a>
                        <a href="#" class="list-group-item">Category 3</a>
                     -->
                </div>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">
                    
                <?php foreach($types as $item){ ?>

                <!-- <a href="#" class="list-group-item"><?php  $item->service_type ?></a> -->
                    <div class="bs-callout bs-callout-info" id="callout-type-dl-truncate"> <h4><a href="#"><?php echo $item->Sname ?></a></h4> </div>

                     <?php foreach ($providers as $service_providers){
                        if($service_providers['sid'] == $item->SId){
                     ?>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo base_url().$service_providers['spphoto'] ?>" width="210px" height="210px">
                            <div class="caption">
                                <h4><a href=""><?php echo $service_providers['spname'] ?></a>
                                </h4>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">18 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    
                  <?php } } ?>
                  <div class="clearfix"></div>
                  <?php } ?>  

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

        <!-- Footer -->
        
