<?php 
    include_once("data-connection.php");
    $createConnection = setUpConnection();

    if(isset($_POST['btnSubmit'])){
        $Stitle=$_POST['txttitle'];
        $category=$_POST['categories'];
        $Slocation=$_POST['txtlocation'];
        $minSalary=$_POST['txtminsalary'];
        $maxSalary=$_POST['txtmaxsalary'];
        $postDescription=$_POST['txtdescription'];
        
        $displayCategoryPic = "SELECT categorypics.id, categorytitle, pics FROM categorypics inner join tblposting on categorypics.categorytitle=tblposting.category";

        $categorypic=$createConnection->query($displayCategoryPic) or die($createConnection->error);
        $row1=$categorypic->fetch_assoc();
        
        while($row1=mysql_fetch_array($categorypic)){
            echo'<img src="data:image/jpeg;base64,'.base64_encode($row1['pics']).'" height="100" width="100"/>;'
        }

        $insertData="INSERT INTO `tblposting`(`title`, `category`, `location`, `minSalary`, `maxSalary`, `description`) VALUES ('$Stitle', '$category', '$Slocation', '$minSalary', '$maxSalary', '$postDescription')";

        $createConnection->query($insertData) or die($createConnection->error);
        echo header("Location: Main.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css-js/custom.css">
    <link rel="stylesheet" type="text/css" href="css-js/add-service.css">
    <script src="https://kit.fontawesome.com/6ddf20ea5f.js" crossorigin="anonymous"></script>
    <title>Add Services</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light p-md-1 sticky-top bgcolor">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <svg class="logo" id="Component_1_1" data-name="Component 1 – 1" xmlns="http://www.w3.org/2000/svg" width="131" height="80" viewBox="0 0 131 80">
                    <path id="Exclusion_1" data-name="Exclusion 1" d="M-2100.456-34a42.275,42.275,0,0,1-18.362-4.128,41.769,41.769,0,0,1-7.735-4.791,41.027,41.027,0,0,1-6.431-6.282h39.307a4,4,0,0,0,4-4,4,4,0,0,0-4-4h-44.411a39.036,39.036,0,0,1-1.655-4h35.288a4,4,0,0,0,4-4,4,4,0,0,0-4-4h-37.16a39.157,39.157,0,0,1-.287-4H-2186a4,4,0,0,1-4-4,4,4,0,0,1,4-4h44.759a38.988,38.988,0,0,0-.67,7.2c0,.268,0,.536.008.8h23.352a4,4,0,0,0,4-4,4,4,0,0,0-4-4h-22.691a38.745,38.745,0,0,1,.977-4h32.492a4,4,0,0,0,4-4,4,4,0,0,0-4-4h-29.06a40.86,40.86,0,0,1,14.947-15.049A42.526,42.526,0,0,1-2100.456-114a42.494,42.494,0,0,1,16.137,3.143,41.433,41.433,0,0,1,13.177,8.573,39.823,39.823,0,0,1,8.884,12.715A38.548,38.548,0,0,1-2059-74a38.547,38.547,0,0,1-3.258,15.57,39.822,39.822,0,0,1-8.884,12.714,41.433,41.433,0,0,1-13.177,8.572A42.5,42.5,0,0,1-2100.456-34Zm-32.528-15.2h-19.022a4,4,0,0,1-4-4,4.005,4.005,0,0,1,4-4h13.918a39.845,39.845,0,0,0,5.1,8Zm-6.759-12h-27.187a4.005,4.005,0,0,1-4-4,4,4,0,0,1,4-4h25.314a38.7,38.7,0,0,0,1.872,8Zm-.521-24h-34.958a4,4,0,0,1-4-4,4,4,0,0,1,4-4h38.39a39.09,39.09,0,0,0-3.432,8Z" transform="translate(2190 114)" fill="#4f2982"/>
                </svg>
            </a> 
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="Feed.php">Feed</a>
                </li>
                <li class="nav-item">
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="Aboutsignedin.html">About Us</a>
                </li>
            </ul>
            <form class="d-flex">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
                        <i style="margin-top:20px;" class="fa-solid fa-bell"></i>
					</li>
                    <li class="nav-item dropdown">
                        <a class="nav-link  text-dark" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img class="nav-default-img "src="Images/default.png">
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="Main.php">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="index.html">Log Out</a></li>
                        </ul>
                    </li>
				</ul>
			</form>
            </div>
        </div>
    </nav>
    <div class="grid-freelancer-add-info">
        <div class="box-1 ">
            <form action="" method="post">
                <div class="row">
                    <h3 style="font-weight:bold;">Post Job</h3>
                    <br><br>
                    <div class="col">
                        Service Title
                        <div class=" form mb-3 ">
                            <input type="text" name="txttitle" id="search" placeholder="Title" class="inputsignup form-control">
                        </div>
                    </div>
                    <div class="col">
                        Categories
                        <div class="input-group mb-3">
                            <select name ="categories" class="inputsignup form-select" id="inputGroupSelect01">
                              <option selected>Choose...</option>
                              <option value="Painting">Painting</option>
                              <option value="Plumbing">Plumbing</option>
                              <option value="Carpenting">Carpenting</option>
                              <option value="Electronics">Electronics</option>
                            </select>
                          </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        Service Location
                        <div class=" form mb-3 ">
                            <input type="text" name="txtlocation" id="search" placeholder="Location" class="inputsignup loc form-control">
                        </div>
                    </div>
                    <div class="col">
                        Minimum Salary
                        <div class=" form mb-3 ">
                            <input type="text" name="txtminsalary" id="search" placeholder="₱" class="inputsignup min form-control">
                        </div>
                    </div>
                    <div class="col">
                        Maximum Salary
                        <div class=" form mb-3 ">
                            <input type="text" name="txtmaxsalary" id="search" placeholder="₱" class="inputsignup max form-control"> 
                        </div>
                    </div>
                </div>
                Description
                <div class=" form mb-3 ">
                    <textarea class="inputsignup form-control" name="txtdescription" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            <br>
            <div class="group">
                <button type="button" onclick="location.href='Main.php';" class="btncancel btn btn-outline-success">Cancel</a>
                <button type="submit" onclick="location.href='Main.php';" name="btnSubmit" class="btnsave btn btn-outline-success">Save</a>
            </div>
        </form>
        </div>  

    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><<br>
    <div class="footer-basic">
        <footer>
            <div class="social"><a href="#"><i class="fa-brands fa-twitch"></i></i></a><a href="#"><i class="fa-brands fa-instagram"></i></a><a href="#"><i class="fa-brands fa-twitter"></i></a><a href="#"><i class="fa-brands fa-facebook-f"></i></a></div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Home</a></li>
                <li class="list-inline-item"><a href="#">Services</a></li>
                <li class="list-inline-item"><a href="#">About</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
            </ul>
            <p class="copyright">JOBSPEED © 2022</p>
        </footer>
    </div>
</body>
</html>