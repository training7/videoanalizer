
 <div id="page-inner"> 
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="card">
                        <div class="card-action">
                             User Details
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                   <div class="col-sm-10">

        </div>
    </div>

                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>City</th>
                                            <th>Gender</th>
                                            <th>Mobile Number</th>
                                            <th>Registration Time</th>
                                            <th>Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        $sql = "SELECT * from users";
                                        $result = mysqli_query($conn, $sql);
                                       // $r=mysqli_fetch_row($result);

                                        
                                        if ($result -> num_rows >0) {
                                            while ($row = $result -> fetch_assoc() ) {
                                                    $_SESSION['uid']=$row["id"];
                                                    $_SESSION['st']=$row["status"];
                                                   $_SESSION['ff']=$row["username"];
                                                    if($_SESSION['st']==1){
                                                        $status="Activated";
                                                    }
                                                    else{
                                                       $status="Dectivated";

                                                    }?>

                                                <tr><td>
                                               <?php echo $row["username"]; ?></td>
                                                <td><?php echo $row["first_name"]; ?></td>
                                                <td><?php echo $row["last_name"]; ?></td>
                                                <td><?php echo $row["email"]; ?></td>
                                                <td><?php echo $row["city"]; ?></td>
                                                <td><?php echo $row["gender"]; ?></td>
                                                <td><?php echo $row["m_number"];?></td>
                                                <td><?php echo $row["create_datetime"]; ?></td>
                                                <td><?php echo $status; ?> 
                                                </td>
                                                    <?php
                                            }
                                        }
                                        
                                 ?>
                                    </tbody>
                                    
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>