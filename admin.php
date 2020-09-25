

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

<div class="main-div">
    <h1 class="text-center text-white bg-dark">List of entries</h1>
    
          <div class="center-div">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover text-center">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Upload1</th>
                        <th>Upload2</th>
                   </tr>
                </thead>
                <tbody>
                <?php

                    $username= "root";
                    $password = "";
                    $server = 'localhost';
                    $db = 'displayupload';

                    $con = mysqli_connect($server,$username,$password,$db);
                    

                   $selectquery = " select * from imgupload ";

                    $query = mysqli_query($con,$selectquery);

                 

                    while($res = mysqli_fetch_array($query)){
                        
                        ?>
                        <tr>
                        <td><?php echo $res['id'];?></td>
                        <td><?php echo $res['username'];?></td>
                        <td><?php echo $res['email'];?></td>
                        <td><img src=" <?php echo $res['image'] ?>" height="200px" width="200px"></td>
                        <td><img src=" <?php echo $res['image2'] ?>" height="200px" width="200px"></td>
                        </tr>
                    <?php
                    }

                    ?>
                

                </tbody>    
            </table>
        </div>
    </div>
<div>
</body>
</html>