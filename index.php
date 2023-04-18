<?php
    include 'connect.php';
    include 'navbar.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
 
    require 'vendor/autoload.php';
 
    if (isset($_POST["register"]))
    {
        $firstname = $_POST["uFirstName"];
        $lastname = $_POST["uLastName"];
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $usertype = $_POST["usertype"];
        $barangay = $_POST["uBarangay"];
        $province = $_POST["uProvince"];
        $city = $_POST["uCity"];
        $zipcode = $_POST["uZipCode"];
        $phone = $_POST["uPhoneNum"];
 
        $mail = new PHPMailer(true);
 
        try {
           
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'edradacaressa@gmail.com';
            $mail->Password = 'czffqedtgslopefp';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('edradacaressa@gmail.com', 'Carpooling Registration');
            $mail->addAddress($email, $firstname);
            $mail->isHTML(true);
 
            $mail->Subject = 'Email verification';
            $mail->Body    = '<p>Click this link to verify your email.<a href = "http://localhost/carpool/home.php">Click Here</a></p>';
 
            $mail->send();
            $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (username, usertype, uFirstName, uLastName, uBarangay, uProvince, uCity, uZipCode, uPhoneNum, email, password) VALUES ('$username','$usertype','$firstname', '$lastname','$barangay','$province','$city','$zipcode','$phone','$email', '$password')";
            mysqli_query($conn, $sql);

            header("Location:login.php");
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
      
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Broom Broom Carpooling</title>
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

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                <form class="mx-1 mx-md-4" method="POST">

                <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name = "usertype" class="form-control" placeholder = "User Type"/>
                    </div>
                  </div>


                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name = "uFirstName" class="form-control" placeholder = "Enter your First Name" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name ="uLastName" class="form-control" placeholder = "Enter your Last Name"/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name ="uBarangay" class="form-control" placeholder = "Barangay"/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name ="uProvince" class="form-control" placeholder = "Province"/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name ="uCity" class="form-control" placeholder = "City"/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name ="uZipCode" class="form-control" placeholder = "Zip Code"/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name ="uPhoneNum" class="form-control" placeholder = "Enter your Contact Number" maxlength="11"/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="email" name="email" class="form-control" placeholder = "Enter your Email" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="text" name="username" class="form-control" placeholder = "Enter your Username" />
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <input type="password" name="password" class="form-control" placeholder = "Enter your Password" required />
                    </div>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <label class="form-check-label" for="form2Example3">
                      I already have an account. <a href="login.php">Login</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <input type="submit" name = "register" class="btn btn-primary btn-lg" value = "Register"></input>
                  </div>

                </form>

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

