<?php
include 'basis.php';
// $todo->add();
//   if (isset($_POST["submit"])){
//     header('location:create.php');
//   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="./source/style.css">
</head>
<body >
<nav class="navbar navbar-dark bg-dark navbar-expand-sm">
  <a class="navbar-brand" href="#">
    <img src="./source/logo.png" width="60" height="60" alt="logo">
    YOUR TASK-TODO
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-4" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar-list-4">
    <ul class="navbar-nav">
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="./source/logo2.png" width="50" height="50" class="rounded-circle"> CRUD *
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="create.php"><i class="fa fa-plus" style="font-size:30px"></i>  Create</a>
          <a class="dropdown-item" href="trash.php"><i class="fa fa-trash" style="font-size:30px;"></i> Trash</a>
        </div>
      </li> 
      <li class = "home m-2" id = "home"><a class="nav-link" href="index.php">Home</a></li>  
    </ul>
  </div>
  <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
    <div class="header_search">
      <div class="header_search_content">
        <div class="header_search_form_container">
          <form class="header_search_form clearfix"> 
            <div class="custom_dropdown" style="display: none;">
            </div> 
              
          </form>
        </div>
      </div>
    </div>
  </div>
</nav>




<div class="container m-5 w-50 rounded mx-auto bg-light shadow">
  <!-- App title section -->
  <div class="row m-1 p-2">
      <div class="col">
          <div class="p-1 h1 text-primary text-center mx-auto display-inline-block">
              <i class="fa fa-check bg-primary text-white rounded p-3"></i>
              <u> TO DO--LIST </u>
              
          </div>
      </div>
  </div>



  <!-- TO-DO section -->

  <div class="row m-1 p-3">
      <div class="col col-11 mx-auto">
          <div class="row bg-white rounded shadow-sm p-2 add-todo-wrapper align-items-center justify-content-center">
         
          <div class="col">  <form name="add" method="POST">
            <input class="form-control form-control-lg border-0 add-todo-input bg-transparent rounded" type="text" placeholder="Add new task..." name = "inputList">
            </div> 
          <div class="col-auto px-0 mx-0 mr-2">
            <button type="submit" name = "create" class="btn btn-light"><i class="fa fa-plus" style="font-size:15px; color:blue"></i></button>
          </div> </form>
      </div>  
  </div>
</div> 
</div>



<!-- This is for the table -->
  <div class="container">
    <div class="table-responsive">
      <div class="table-wrapper">
        <div class="table-title">
          <div class="row">
            <div class="col-sm-6">
              <h2><b>To-Do-List</b></h2>
            </div>
            <div class="col-sm-6">
              <a href="trash.php" class="btn btn-danger"><i class="fa fa-trash" style="font-size:30px; margin-right:15px;"></i> <span style = "font-size: 20px;">Trash</span></a>
            </div>
          </div>
        </div>
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>List</th>
              <th><th>
              <th>Activity</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $conn = new mysqli ("localhost", "root", "", "to-do-list");
            $result = $conn->query("SELECT * FROM list");
            while ($getData = $result->fetch_assoc()):
          ?>
            <tr>
              <td><input type="checkbox" id = "checkbox" name = "checkbox" class = "checkbox"></td>
              <td><?php echo $getData['list-to-do']?></td>
              <td><a type = "submit" name = "edit" href = "" data-toggle="modal" data-target="#updateModal<?php echo $getData['id'] ?>"><i class='fa fa-edit' style='font-size:20px;color:blue'></i></a></td>
              <td><a type = "submit" name = "delete" href = "index.php?id_delete=<?php echo $getData['id'] ?>"><i class='fa fa-trash-o' style='font-size:20px;color:red'></i></a></td>
            </tr> 
            
            

          <!-- Edit Modal HTML -->
              <div id="updateModal<?php echo $getData['id'] ?>" class="modal fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method = "POST">
                      <div class="modal-header">
                        <h4 class="modal-title">Edit Task</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <form action="basis.php" method="POST">
                          <label>Update List</label>
                          <input type="hidden" name="id" value="<?php echo $getData['id'] ?>">
                          <input type="text" name= "task" class="form-control" value="<?php echo $getData['list-to-do'] ?>">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <input type="button" class="btn btn-danger" name = "edit" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" name="update" value="update">
                      </div>
                    </form>
                  </div>
                </div>
              </div>

          <?php
          endwhile;
          ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>





    <script>

    $('.checkbox').change(function(){
      if($(this).prop("checked") == true){
        $(this).parent().parent().css("text-decoration","line-through");
      }
      else if($(this).prop("checked") == false){
      $(this).parent().parent().css("text-decoration","none");
      }
    });

    </script>
    
</body>
</html>
