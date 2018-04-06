<script>

$("#div2").click(function(){
    $("#div1").hide();
    $("#hello").show();
});
$(".hi").click(function(){
    $("#div1").show();
});

  /*//$("#avaibility").load('checkusername.php').show();
  $("#uname").keyup(function () {
  var uname = $("#uname").val();
  
  $.post('checkusername.php', {username : uname }, function(result){
    $("#avaibility").html(result);
  });

});*/


 $('.subb').click(function() {
        var r = confirm("Are you sure want to Update Value of user?");
        if (r == true) {
        var uid = $("#uid").val();
        var uname = $("#uname").val();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
       
        var city = $("#city").val();
        var add = $("#add").val();
        var num = $("#num").val();
        $.ajax({
                url: 'updateuser.php',
                method: 'POST',
                data: {ID : uid, username : uname, first_name : fname, last_name : lname, email : email, city : city, address : add, m_number : num }, 
                success: function(result){
            $('#div5').html(result);
            
        }});
      }
      else{
        return false;
      }
     
    });
   $('.subb1').click(function() {
    var status = $("#status").val();
    if (status == 1) {
      var x = 'Deactivate';
    }
    else{
      var x = 'Activate';
    }
    var a = confirm("Are you sure want to"+" " + x + " " + " of user?");
        if (a == true) {
        var uid = $("#uid").val();
        var uname = $("#uname").val();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
      
        var city = $("#city").val();
        var add = $("#add").val();
        var num = $("#num").val();
       // var status = $("#status").val();
        $.ajax({
                url: 'changestatus.php',
                method: 'POST',
                data: {ID : uid, username : uname, first_name : fname, last_name : lname, email : email, city : city, address : add, m_number : num, status : status }, 
                success: function(data){
            $('#normal').text(data);
            location.reload();
        }});
     }
     else{
      return false;
     }
    });
   
</script>
<style>
  #div2{
  float: right;
 
}
ul.a {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
input.txtfield{
	width: auto;
	margin: 0 0 0;
	padding: 0;
}

</style>
<?php

require_once('../connection.php');

if (isset($_POST['username'])) {
  
  $hi=$_POST['username'];
}

?>
<div id="page-inner"> 
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="card">
                        <div class="card-action">
                             User Details <button id="div2">Close</button>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                   <div class="col-sm-10">

        </div>
    </div>

    <?php 
                                        $sql = "SELECT * from users WHERE username= '{$hi}'";
                                        $result = mysqli_query($conn, $sql);
                                       // $r=mysqli_fetch_row($result);

                                        
                                        if ($result -> num_rows >0) {
                                            while ($row = $result -> fetch_assoc() ) {
                                                    $_SESSION['uid']=$row["id"];
                                                    $_SESSION['st']=$row["status"];
                                                    $ps=trim($row['password']);
                                                    $pass=md5($ps);
                                                   
                                                    if($_SESSION['st']==1){
                                                        $status="Activated";
                                                    }
                                                    else{
                                                       $status="Dectivated";

                                                    }?>

                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                  <form action="updateuser.php" method="post">  
                                    <thead>
                                     <tr>   <input type="hidden" name="uid" id="uid" value="<?php echo $row['id']; ?>">
                                     <input type="hidden" name="status" id="status" value="<?php echo $row['status']; ?>">
                                            <th>User Name:</th><td> <input type="text" name="uname" id="uname" class="txtfield" autocomplete="off" value="<?php echo $row["username"]; ?>" required><div id="avaibility"></div></td>
                                      </tr>
                                      <tr>
                                            <th>First Name:</th><td><input type="text" name="fname" id="fname" class="txtfield" autocomplete="off" value="<?php echo $row["first_name"]; ?>" required></td>
                                      </tr>
                                      <tr>      
                                            <th>Last Name:</th><td> <input type="text" name="lname" id="lname" class="txtfield" autocomplete="off" value="<?php echo $row["last_name"]; ?>" required></td>
                                      </tr>
                                      <tr>      
                                            <th>Email:</th><td><input type="email" name="email" id="email" class="txtfield" autocomplete="off" value="<?php echo $row["email"]; ?>" required></td>
                                      </tr>
                                      
                                      <tr>      
                                            <th>City:</th> <td><input type="text" name="city" id="city" class="txtfield" autocomplete="off" value="<?php echo $row["city"]; ?>" required></td>
                                      </tr>
                                      <tr>
                                      	<th>Address</th><td><input type="text" name="add" id="add" class="txtfield" autocomplete="off" value="<?php echo $row["address"]; ?>" required></td>
                                      </tr>
                                      <tr>      
                                            <th>Gender:</th> <td><?php echo $row["gender"]; ?></td>
                                      </tr>
                                      <tr>      
                                            <th>Mobile Number:</th><td>  <input type="number" name="num" id="num" class="txtfield" tabindex="11" value="<?php echo $row["m_number"];?>" required></td>
                                      </tr>
                                      <tr>      
                                            <th>Registration Time:</th> <td><?php echo $row["create_datetime"]; ?></td>
                                      </tr>
                                      <tr>      
                                            <th>Status:</th><td><div  id="normal"><?php echo $status; ?></div> </td>
                                      </tr>
                                        
                                      <tr>
                                        <th>Change Status</th><td><input type="submit" name="update" value="Change" class="subb1"></td>
                                      </tr>
                                    <tr>
                                        <td colspan="2"><center>
                                            <input type="submit" name="update1" value="Update" class="subb"></center>
                                        <!--<div id="div5"></div>-->
                                        </td>
                                      </tr>
                                    </thead>

                                    <?php
                                    }
                                  }
                                  ?>
                                </table>
                                </div>
                                <div class="card-action">
                             Videos:~ 
                        
                       </div>
                       <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                           
<?php 

 $r = 0;

 $uid = $_SESSION['uid'];


  $sql1 = "SELECT * FROM videos WHERE user_id='{$uid}'";
  $result1 = mysqli_query($conn, $sql1);
 

  
    
  while ($row=mysqli_fetch_array($result1,MYSQLI_ASSOC))
 {
         $vurl="../../uploaded/video/";
         $video = $vurl.$row["video_path"];
         if ($r%3 == 0) {
                echo "<tr>";
                }       
  
    ?>
     
              
            <td><center><video width="250px" height="250px" controls>
              <source src="<?php echo $video; ?>" type="video/mp4">
              Your browser does not support the video tag.
            </video></center></td> 
    
<?php
  
  if ($r%3 == 2) {
                echo "</tr>";
                }   
                $r++;
  }
?></table>

                                </div>

                                </div>
                                </div>
                                </div>
                               