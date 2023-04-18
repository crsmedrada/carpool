<?php 
include 'connect.php';
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <!-----<h1>MAY ACCOUNT KA NA PALA EH</h1>---->
    <link rel = "icon" href="logo.png">
</head>
<body> 
<section class="vh-100" style="background-color: #FDE2F3;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Welcome!~</p>

                <div class="table-responsive-sm">
                    <table class="table">
                    <tr>
                        <th>UserType</th>
                        <th>Username</th>
                        <th>Email</th>
                    </tr>
                    
                    <?php 
                   
                    include 'connect.php';
                   
                    $sql = "SELECT * FROM users"; 
                    $results = $conn->query($sql);

                    if ($results->num_rows > 0){
                    
                    }while($row = $results->fetch_assoc()){
                        echo "<tr>
                        <td> ".$row["usertype"]."</td>
                        <td> ".$row["username"]."</td>
                        <td> ".$row["email"]."</td>
                        
                        </tr>";
                    }
                    ?>

                    </table>
                </div>

        

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="logo.png" class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>    
</body>
</html>
