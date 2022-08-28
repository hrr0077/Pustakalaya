<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Untitled</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Projects-Grid.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="books.css">
</head>

<body>
    <?php require 'partials/_nav.php'?>
    
   
    <div class="container">
      <br>
          <h1 class="text-center text-white bg-dark">Registered Book Details</h1>
          <br>
          <div class="table-responsive">
              <table class="table table-bordered table-striped table-hover text-center">

              <thead class="bg-dark text-white">
                  <th>Sno</th>
                  <th>Book Name</th>
                  <th>Publication</th>
                  <th>Owner Name</th>
                  <th>Contact Number</th>
                  <th>Email</th>
                  <th>Landmark</th>
                  <th>State</th>
                  <th>Country</th>
                  <th>Image</th>
              </thead>

              <tbody>
                  <?php

                  $conn = mysqli_connect('localhost', 'root', '', 'bkstore');
              

                       $displayquery = " SELECT * FROM   register ";
                       $querydisplay = mysqli_query($conn, $displayquery);

                    if(mysqli_num_rows($querydisplay)>0){
                      foreach($querydisplay as $row)
                      {
                        ?>
                         <tr>
                          <td><?php echo $row['sno']; ?></td>
                          <td><?php echo $row['bookname']; ?></td>
                          <td><?php echo $row['publication']; ?></td>
                          <td><?php echo $row['name']; ?></td>
                          <td><?php echo $row['phone']; ?></td>
                          <td><?php echo $row['email']; ?></td>
                          <td><?php echo $row['landmark']; ?></td>
                          <td><?php echo $row['state']; ?></td>
                          <td><?php echo $row['country']; ?></td>
                          <td><img src="<?php echo 'upload/'.$row['image']; ?>" height="100px" width="100px" alt="image"></td>

                         </tr>


                        <?php
                      }
                    }

                       ?>
              </tbody>

              </table>
          </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>