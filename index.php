<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<style>
    body{
        background-image: url(img/bg1.jpg);
        background-size:cover;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }
    .card{
        width: 80%;
        background-color: #00ffd94a;
    }
    .headline h3,h2{
        margin-bottom: 50px;
        text-align: center;
        text-transform: uppercase;
        color:#fff;
    }
    .card-one{
        background-image: linear-gradient(to right, #8e2de2, #4a00e0);
    }
    .card-two{
        background-image: linear-gradient(to right, #00b09b, #96c93d);

    }
    .card-three{
        background-image: linear-gradient(to right, #ff512f, #f09819);

    }
</style>
<body>
<div class="card">
  <div class="card-body">
    <div class="container">
        <div class="row">
           <div class="headline">
           <h3>Student management System</h3>
           <h2 class="text-center">Login As</h2>
           </div>
        </div>
        <div class="row mt-3">
        <div class="col-md-4">
            <div class="card">
            <div class="card-body card-one">
                <h5 class="card-title text-center text-light">Administrator</h5>
                <p class="card-text text-center text-light">To Maintain all thing login as admin here</p>
                <a href="adminlogin.php" class="btn btn-primary w-100">Click Here</a>
            </div>
            </div>
            </div>

            <div class="col-md-4">
            <div class="card">
            <div class="card-body card-two">
                <h5 class="card-title text-center text-light">Faculty</h5>
                <p class="card-text text-center text-light">To take attendence please login as faculty</p>
                <a href="facultylogin.php" class="btn btn-primary w-100">Click Here</a>
            </div>
            </div>
            </div>

            <div class="col-md-4">
            <div class="card">
            <div class="card-body card-three">
                <h5 class="card-title text-center text-light">Student</h5>
                <p class="card-text text-center text-light">For view result please login as student</p>
                <a href="studentlogin.php" class="btn btn-primary w-100">Click Here</a>
            </div>
            </div>
            </div>
        </div>
    </div>
    
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>