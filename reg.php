<!DOCTYPE html><html>
    <head>
        <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>Pustakalaya</title>
        <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css?h=0557f5c86fbfddaae572204457dd33e1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css">
        <link rel="stylesheet" href="/assets/css/styles.min.css?h=fe8e9a99f53e6aedd9d217e4188c5627">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="reg.css">
    </head>
    <body id="page-top">
         <?php require 'partials/_nav.php'?>
    <?php

    $conn = mysqli_connect('localhost', 'root', '', 'bkstore');
    if (isset($_POST['submit'])) {

    $bookname = $_POST['bookname'];
    $publication = $_POST['publication'];
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $landmark = $_POST['landmark'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $files = $_FILES['file'];


    $filename = $files['name'];
    $fileerror = $files['error'];
    $filetmp = $files['tmp_name'];

    $fileext = explode('.', $filename);
    $filecheck = strtolower(end($fileext));

    $fileextstored = array('png', 'jpg', 'jpeg');

    if (in_array($filecheck, $fileextstored)) {

        $destinationfile = 'upload/' . $filename;
        move_uploaded_file($filetmp, $destinationfile);

        $q = "INSERT INTO `register` (`bookname`, `publication`, `name`, `phone`, `email`, `landmark`, `state`, `country`, `image`) VALUES ('$bookname', '$publication', '$name', '$number', '$email', '$landmark', '$state', '$country', '$filename')";

        $query = mysqli_query($conn, $q);

        if($query){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                   You have registered a book successfully. View registered books <a href="books.php" class="alert-link">here</a>.
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        }
        else{
            echo "not ins";
        }

       
    }
}
?>

<section id="rpage">
            <div id="demo">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="ss1.jpg" class="d-block w-100" alt="..." height="600px" width="600px">
                      </div>
                      
                      <div class="carousel-item">
                        <img src="ss2.jpg" class="d-block w-100" alt="..."height="600px" width="600px">
                      </div>
                      <div class="carousel-item">
                        <img src="ss3.jpg" class="d-block w-100" alt="..."height="600px" width="600px">
                      </div>
                      
                      <div class="carousel-item">
                        <img src="ss4.jpg" class="d-block w-100" alt="..."height="600px" width="600px">
                      </div>
                     
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
            <div id="page">
                <form action="reg.php" method="post" enctype="multipart/form-data">
                <h1 class="regbook">REGISTER BOOK</h1>
                <div class="form-group">
                    <label for="Bname">Book Name:</label>
                    <input type="text" name="bookname" id="name" placeholder="Enter book name">
                </div>
                <div class="form-group">
                    <label for="publication">Publication:</label>
                    <input type="text" name="publication" id="name" placeholder="Enter Publication name">
                </div>
                <div class="form-group">
                    <label for="name">Your Name:</label>
                    <input type="text" name="name" id="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="name">Phone no:</label>
                    <input type="phone" name="number" id="phone" placeholder="Enter your phone no">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="location landmark">Landmark:</label>
                    <input type="text" name="landmark" id="name" placeholder="Enter your location landmark">
                </div>
                <div class="flex-input">
                <div class="form-group state-n">
                    <label for="state name">State Name:</label>
                    <input type="text" name="state" id="name" placeholder="Enter state name">
                </div>
                <div class="form-group">
                    <label for="country name">Country Name:</label>
                    <input type="text" name="country" id="name" placeholder="Enter country name">
                </div>
            </div>
                        <div class="form-group img-up">
                            <label for="file-ip-1">Upload Image of the book</label>
                            <input type="file" name="file" id="file-ip-1" accept="image/*" placeholder="image">
                        </div>
             <button type="submit" name="submit" class="btn submit">Submit</button>
                      </form>
                    </div>
        </section>
</body>
</html>