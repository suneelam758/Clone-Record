<?php
include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Clone</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
    body{
        background-color: papayawhip;
        font-family: Arial, Helvetica, sans-serif;
    }
    .a:hover{
    box-shadow: 20px 10px 5px 2px grey;
    transition: 0.5s;
    
   }
</style>
</head>
<body>
    <div class="container mt-4">
        <center>
        <form method="post" action="index.php">
            <h3>Search Employee </h3>
            <lable for="search"></lable>
            <input type="search" name="name" id="name" value="<?php if(isset($_POST['search'])){$name=$_POST['name'];echo $name ;}?>" placeholder="Enter Name">
            <input type="submit" name="search" value="search" class="a btn-danger">
        </form>
        </center>
    </div> 

    <?php
        if(isset($_POST['search'])){
            ?>
            <div class="container mt-4">
    <form method="POST" action="clone.php">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>  
    <?php
        $name=$_POST['name'];
        $que="SELECT * FROM employeemaster WHERE `FirstName` like '%$name%';";
        $result=mysqli_query($conn,$que);    
        $sno=0;
            while($row=mysqli_fetch_assoc($result)){
    ?>
            <tbody>
                <tr> 
                    <td><?php echo $sno=$sno+1; ?></td>
                    <td><?php echo $row["FirstName"];?></td>
                    <td>
                    <button type="button"  class="a btn-dark" onclick=" cloneid(`<?php echo $row['Id']; ?>`)" data-toggle="modal" data-target="#Modal">Clone</button>
                    <input type="hidden"name="id" value="<?php echo $row["Id"]; ?>">
            <?php
                }
            ?>                    
            <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalTitle">Clone Employee</h5>
                            <button type="button" class="close btn-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <p> Are you sure you want to clone employee?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="id" name="Id" value="">
                        <button type="submit" name="submit" value="submit"  class="btn-success">Yes</button>
                       
                    </div>
                </div>
                </div>
            </div>
                </td> 
                </tr>  
            </tbody>   
        </table> 
    </div>   
    <?php
        }      
    ?> 
</body>
<script>
    function cloneid(id){
        document.getElementById('id').value=id;
    }
</script>
</html>