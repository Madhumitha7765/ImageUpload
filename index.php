<html>
<head>
    <title></title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>

    <div class="container">
    <br>
        <h1 class="text-white bg-dark text-center">
        Sign-up Form
        </h1>
        <div class="col-lg-8 m-auto d-block">
        <form action="upload.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                    <label for="user">Username </label>
                    <input class="form-control" type="text" name="username" id="user">
            </div>
            <div class="form-group">
                    <label for="user">Email </label>
                    <input class="form-control" type="email" name="email" id="email">
            </div>
            <div class="form-group">
                    <label for="file1">Image upload-1</label>
                    <input class="form-control" type="file" name="file1" id="file1">
            </div>

            <div class="form-group">
                    <label for="file2">Image upload-2</label>
                    <input class="form-control" type="file" name="file2" id="file2">
            </div>

            <input  type="submit" name="submit" value="Submit" class="btn btn-success">

            <br><br><br><br>

            
           
        </form>
        </div>

    <a href="admin.html">Admin</a>
        
    </div>


</body>
</html>