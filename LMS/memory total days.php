if($res1)   {
     echo ' success';
  }
     else
   {
         echo 'no';
      }



      <?php
                $sql1="SELECT SUM(total_days) FROM leave_details WHERE Status=1 AND Empid='".$_SESSION['empid']."'";
                $res1=mysqli_query($con,$sql1); 

                    // if($res1)
                    // {
                ?> 



<br /><b>Notice</b>:  Undefined index: tot_leaves in <b>C:\xampp\htdocs\5-1-2023\Leave_Application.php</b> on line <b>218</b><br />


<?php
                    $sql1="SELECT totleaves('".$_SESSION['empid']."')";
                    $tot_leavesQ=mysqli_query($con,$sql1); 
                    
                ?>







<label style="margin-right:85px;">Leaves Taken In Current Year</label>
                <input type="text" name="totleaves" value="<?php echo $TOT=mysqli_query($con,"SELECT totleaves('".$_SESSION['empid']."')");?>" disabled>

                <br /><b>Notice</b>:  Array to string conversion in <b>C:\xampp\htdocs\5-1-2023\Leave_Application.php</b> on line <b>224</b><br />Array


                <?php                
                $TOT=mysqli_query($con,"SELECT totleaves('".$_SESSION['empid']."')")
                ?>
                <label style="margin-right:85px;">Leaves Taken In Current Year</label>
                <input type="text" name="totleaves" value="<?php echo $TOT;?>" disabled>




<?php
                if(isset($_GET['totleaves']))
               {
                  $sql1="SELECT SUM(total_days) FROM leave_details WHERE Status = 1 AND Empid='".$_SESSION['empid']."'";
                     $res1=mysqli_query($con,$sql1); 
                  $_SESSION['tot_leaves']=$res1;
               }

?>
