    <?php  
    include("dbconnect.php");  
    $delete_id=$_GET['del'];  
    $delete_query="delete  from users WHERE id='$delete_id'";//delete query  
    $run1=mysqli_query($db,$delete_query);  
    if($run1)  
    {  
    //javascript function to open in the same window   
        echo "<script>window.open('A_View_users.php?deleted=user has been deleted','_self')</script>";  
    }  
    ?>  
    <?php 
    include("dbconnect.php");  
    $delete_id=$_GET['del2'];  
    $delete_query="delete  from products WHERE id='$delete_id'";//delete query  
    $run2=mysqli_query($db,$delete_query);  
    if($run2)  
    {  
    //javascript function to open in the same window   
        echo "<script>window.open('A_View_users.php?deleted=product has been deleted','_self')</script>";  
    }   
    ?>  
    <?php  
    include("dbconnect.php");  
    $delete_id=$_GET['del3'];  
    $delete_query="delete  from blogs WHERE id='$delete_id'";//delete query  
    $run3=mysqli_query($db,$delete_query);  
    if($run3)  
    {  
    //javascript function to open in the same window  
        echo "<script>window.open('A_View_users.php?deleted=product has been deleted','_self')</script>";  

    }
       
      
    ?> 