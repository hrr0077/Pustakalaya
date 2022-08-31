

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

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['search'])) {

include 'partials/_dbconnect.php';
        $filtervalues = $_GET['search'];
        $query = "SELECT * FROM register WHERE CONCAT(`bookname`, `publication`, `name`, `phone`, `email`, `landmark`, `state`, `country`, `image`) LIKE '%$filtervalues%'";
        $query_run = mysqli_query($conn, $query);
        if(mysqli_num_rows($query_run)>0){
          foreach($query_run as $items){
              ?>
                <tr>
                          <td><?php echo $items['sno']; ?></td>
                          <td><?php echo $items['bookname']; ?></td>
                          <td><?php echo $items['publication']; ?></td>
                          <td><?php echo $items['name']; ?></td>
                          <td><?php echo $items['phone']; ?></td>
                          <td><?php echo $items['email']; ?></td>
                          <td><?php echo $items['landmark']; ?></td>
                          <td><?php echo $items['state']; ?></td>
                          <td><?php echo $items['country']; ?></td>
                          <td><img src="<?php echo 'upload/' . $items['image']; ?>" height="100px" width="100px" alt="image"></td>

                         </tr>

              <?php
          }
        }
        else{
            ?>
<tr>
    <td colspan="10">No records found</td>
</tr>
            <?php
        }
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