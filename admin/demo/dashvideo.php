 <div id="page-inner"> 
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="card">
                        <div class="card-action">
                           Recently Video:-
                        </div>  
                          <div class="card-content">
                         <div class="table-responsive">
                         <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                        <?php 

                        require_once('../connection.php');
                         $r = 0;




                          $sql1 = "SELECT * FROM videos ORDER BY id desc LIMIT 6";
                          $result1 = mysqli_query($conn, $sql1);
                         

                          
                            
                          while ($row=mysqli_fetch_array($result1,MYSQLI_ASSOC))
                         {
                                 $vurl="../../uploaded/video/";
                                 $video = $vurl.$row["video_path"];
                                 if ($r%3 == 0) {
                                        echo "<tr>";
                                        }       
                          
                            ?>
                             
                                      
                                    <td><center><video width="320" height="240" controls>
                                      <source src="<?php echo $video; ?>" type="video/mp4">
                                      Your browser does not support the video tag.
                                    </video></center></td> 
                            
                        <?php
                          
                          if ($r%3 == 2) {
                                        echo "</tr>";
                                        }   
                                        $r++;
                          }
                        ?>
                        </table>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
