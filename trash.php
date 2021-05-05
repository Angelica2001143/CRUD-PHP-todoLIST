<?php
include 'basis.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRASH</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="./source/style.css">
</head>

<style>
.table-wrapper {
    padding: 30px;	
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
    width: 700px;
    margin: 30px auto;
    background: pink;
}
.table-title {
    padding-bottom: 30px;
    margin: 0 0 10px;
}
.table-title h2 {
    margin: 6px 0 0;
    font-size: 22px;
}
.table-title .add-new {
    float: right;
    height: 50px;
    font-weight: bold;
    font-size: 15px;
    text-shadow: none;
    min-width: 100px;
    border-radius: 50px;
    line-height: 15px;
}

table.table tr th:first-child {
    width: 160px;
}

#action{
    margin-left:500px;
}


</style>
<body>
<nav class="navbar navbar-dark bg-dark navbar-expand-sm">
  <a class="navbar-brand" href="#">
    <img src="source/logo.png" width="60" height="60" alt="logo">
    YOUR TASK-TODO
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar-list-4">
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="source/logo2.png" width="50" height="50" class="rounded-circle"> CRUD *
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="create.php"><i class="fa fa-plus" style="font-size:30px"></i>  Create</a>
        </div>
      </li> 
      <li class = "home m-2" id = "home"><a class="nav-link" href="index.php">Home</a></li>  
    </ul>
  </div>
 
</nav>


<div class="container-lg">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Removed Data </h2></div>
                    <br>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-primary add-new"><a href = "create.php" style="text-decoration:none; color:white;"><i class="fa fa-plus"></i> Add New Task</a></button>
                    </div>
                </div>
            </div>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th class = "w-75">List</th>
                        <th colspan ="2" >---Activity---</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $conn = new mysqli ("localhost", "root", "", "to-do-list");
                        $result = $conn->query("SELECT * FROM trash");
                        while ($getData = $result->fetch_assoc()):
                    ?>
                        <tr>
                       
                        <td><?php echo $getData['list-to-do']?></td>
                        <td ><a type = "submit" name = "restore" href = "trash.php?restore=<?php echo $getData['id'] ?>"> Restore<i class='fa fa-window-restore' style='font-size:20px;color:blue'></i></a></td>
                        <td><a type = "submit" name = "delete" href = "trash.php?deleteTask=<?php echo $getData['id'] ?>">DELETE<i class='fa fa-trash-o' style='font-size:20px;color:red'></i></a></td>
                        </tr>         
                    <?php
                    endwhile;
                    ?>     
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>