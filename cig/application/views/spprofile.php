    <!-- Header -->
    

    <!-- Page Content -->
   
   
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Shop Name</p>
                <div class="list-group">
                    <a href="#" class="list-group-item active">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a>
                </div>
            </div>

            <div class="col-md-9">

                <div class="thumbnail">
                    <?php foreach ($providers as $row ) { ?>
                     <img class="img-responsive" src="<?php echo base_url() . $row['SPPhoto'] ?>" alt="" width="70%" height="30%" >
                    <h2>
                        <?php  echo $row['SPName']; ?>
                        
                    <div class="caption-full">

                        </h2>
                        <hr>
                        <h4>Address:  </h4>
                        <p><?php  echo $row['SPAddress'];?></p>

                        <hr>
                        <h4>Phone No:  </h4>
                        <p><?php  echo $row['SPPhone'];?></p>

                        <hr>
                        <h4>Email:  </h4>
                        <p><?php  echo $row['Email'];?></p>

                    
                    <div class="ratings">
                        <p class="pull-right">3 reviews</p>
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            4.0 stars
                        </p>
                    </div>
                    <button type="button" class="btn btn-primary" onclick="showForm();">Book Service</button>
                    
                    </div>
                    
                <div id="book" class="well" style="display: none;">
                     <?php foreach ($types as $row1 ) { ?>
                        <form method="post" class="form-inline" action="<?php echo base_url(); ?>index.php/home_controller/bookService/<?php echo $row1['SId'].'/'.$row['SPId']; ?>">
                           
                                <?php } ?>
                                <label for="formGroupExampleInput">Booking Date</label>
                                <input type="date" id="date" class="form-control" required  name="date" id="formGroupExampleInput">
                              
                              &emsp;&emsp;&emsp;
                                <label for="formGroupExampleInput2">Time</label>
                                <input type="time" class="form-control" name="time" id="formGroupExampleInput2" >
                             
                             <div class="col-md-4 pull-right">
                             <input type="hidden" name="user" value=" <?php  print_r($this->session->userdata('Cemail')); ?>"></input>
                              <button type="submit" id="b1" class="btn btn-primary btn-block">Book</button>
                              </div>
                        </form>
                        

                        <form >
  
                    
                </div>
        <?php } ?>
                <div class="well">

                    <div class="text-right">
                        <a class="btn btn-success">Leave a Review</a>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">10 days ago</span>
                            <p>This product was great in terms of quality. I would definitely buy another!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">12 days ago</span>
                            <p>I've alredy ordered another one!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">15 days ago</span>
                            <p>I've seen some better than this, but not at this price. I definitely recommend this item.</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

<script type="text/javascript">
    
    function showForm() {
        // body...
        document.getElementById('book').style.display='inherit';
    }


     function checkDate() {
            var EnteredDate = document.getElementById("date").value; //for javascript

            //var EnteredDate = $("#txtdate").val(); // For JQuery

            var date = EnteredDate.substring(0, 2);
            var month = EnteredDate.substring(3, 5);
            var year = EnteredDate.substring(6, 10);

            var myDate = new Date(year, month - 1, date);

            var today = new Date();

            if (myDate > today) {
                //alert("Entered date is greater than today's date ");
            }
            else {
                alert(myDate+" "+today+" "+EnteredDate);
                alert("Entered date is less than today's date ");
                document.getElementById('b1').disabled = true;
            }
        }
</script>