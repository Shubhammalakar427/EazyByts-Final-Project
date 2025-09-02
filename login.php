<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body class="bg-secondary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-8 col-lg-6">
                <div class="container bg-white rounded my-2 px-0">
                    <div class="py-1 bg-danger text-white">
                        <h1 style="text-align: center;">Login Form</h1>

                    </div>
                    <form action="login1.php" method="POST">
                        <div class="py-3 mx-5">
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="py-3 mx-5">
                            <input type="email" name="useremail" class="form-control" placeholder="Enter your email" required>
                        </div>
                         <div class="py-3 mx-5">
                            <button name="login" class="form-control btn-danger text-white" value="Login">Login</button>
                        </div>
                        <div class="py-3 mx-5">
                            <a href="signup.html" style="text-decoration: none;"><input type="button" class="form-control btn-info text-white" value="Signup"></a>
                        </div>



                    </form>

                </div>
            </div>
        </div>
    </div>

    
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</html>