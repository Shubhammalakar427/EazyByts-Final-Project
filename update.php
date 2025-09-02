<?php
 include("config.php");
 error_reporting(0);
 $id= $_GET['id'];
 $query="select * from events where id='$id'";
 $run=mysqli_query($conn,$query);
 $total=mysqli_num_rows($run);
 $result=mysqli_fetch_array($run);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Contant</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <h2 class="text-primery text-center">Update Post</h2>
    <div class="row">
       
        
        <div class="col-sm-8">
           
            <form action="#" method="post" enctype="multipart/form-data">
                
                <div class="form-group mt-1">
                    
                    <label class="text-info">Post Title:</label>
                    <input name="title" type="text" class="form-control" value="<?php echo $result['title']; ?>"/>
                </div>


                <div class="form-group mt-1">
                    <label class="text-info">Date:</label>
                    <input name="date" type="date" class="form-control" value="<?php  echo $result['date']; ?>" />
                </div>

                <div class="form-group mt-1">
                    <label class="text-info">Location:</label>
                    <input name="location" type="text" class="form-control" value="<?php  echo $result['location']; ?>" />
                </div>

                <input name="update" type="submit" value="Update Post" class="form-control btn btn-primary"/>
                
            </form>
        </div>
        <div class="col-sm-3"></div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>

<?php
include("config.php");

if($_POST['update'])
{
    $title=$_POST['title'];
    $date=$_POST['date'];
    $location=$_POST['location'];
    
    $update="UPDATE events set title='$title',date='$date',location='$location' WHERE id='$id'";
    $run=mysqli_query($conn,$update);
    if($run)
    {
        echo "<script>alert ('Post updated')</script>";
        echo "<script>window.open('dashboard.php','_self')</script>";


    }else{
        echo "Error Update";
    }
}
?>

