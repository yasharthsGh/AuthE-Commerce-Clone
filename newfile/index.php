<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazon</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        
    <style>
        * {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            box-sizing: border-box;
        }

        .navbar {
            width: 100vw;
            height: 60px;
            background-color: #0f1111;
            color: white;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-evenly;
        }

        /* BOX-1 */

        .logo1 {
            height: 50px;
            width: 100px;
            background-image: url("amazon_logo.png");
            background-size: cover;
            /* background-color: rebeccapurple; */
        }

        .border:hover {
            border: 1.5px solid white;
            /* padding: 5px; */
        }

        /* Box 2 */

        .nav-address {
            display: flex;
        }

        .info-county-deliever {
            /* border: 2px solid rebeccapurple; */
            /* margin-left:2px ; */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

        }

        .add-icon {
            display: flex;
            align-items: center;
        }

        .add-first {
            color: #cccccc;
            font-size: 0.8rem;
            margin-left: 15px;
        }

        .add-Contry {
            font-size: 1rem;
            margin-left: 3px;
        }


        /* Box 3 */

        .navsearch {
            width: 650px;
            height: 40px;
            border: 2px solid white;
            border-radius: 4px;
            background-color: rgba(247, 201, 35, 0.876);

            display: flex;
            /* justify-content: space-evenly; */

        }

        .navsearch:hover {
            border: 2px solid orange;
        }

        #select-search {
            /* border: 150px solid rgb(237, 231, 242); */
            color: #5a5651cc;
            width: 9%;
            /* border-right: 1px solid #0f1111; */
            border: none;
            background-color: #b9c3c3;
            text-align: center;
            height: 100%;

            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }

        #searchbar {
            height: 100%;
            width: 85%;
            border: none;
        }

        .search-icon {
            width: 6%;
            /* border: 2px solid black; */
            background-color: rgb(228, 183, 18);
            display: flex;
            justify-content: center;
            align-items: center;

            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;

        }

        /* Box 4 */
        .nav-first {
            font-size: 0.8rem;
        }

        .nav-second {
            font-weight: bold;
        }

        #sign-in a {
            text-decoration: none;
            color: white;

        }

        #sign-in a:hover {
            color: rgb(112, 112, 220);
        }

        .nav-cart i {
            font-size: 30px;
        }

        .nav-cart {
            font-weight: bold;
        }


        /* CSS styling of Below panel */

        .down-panel {
            width: 100vw;
            height: 40px;
            background-color: #10110fda;
            color: white;
            display: flex;
            align-items: center;
            font-weight: bold;
            /* justify-content: space-between; */
        }

        .nav-all {
            width: 5%;
            height: 100%;
            /* border: 2px solid rebeccapurple; */
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
            margin-left: 15px;
        }

        .options {
            height: 100%;
            width: 80%;
            /* border: 2px solid rebeccapurple; */
            display: flex;
            justify-content: flex-start;
            align-items: center;
            gap: 40px;
            padding-left: 40px;

        }

        .options span
        {
            padding: 5px;
        }

        .specific-section {
            width: 15%;
            height: 100%;
            /* border: 2px solid rebeccapurple; */
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 25px;
        }

        .specific-section a{
            text-decoration: none;
            color: white;
        }
        /* Hero Section */

        .hero-section {
            width: 100vw;
            background-image: url("hero_image.jpg");
            height: 380px;
            background-size: cover;
            display: flex;
            align-items: end;
            justify-content: center;
        }

        .hero-message {
            width: 90%;
            height: 40px;
            background-color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 0.85rem;
            margin-bottom: 20px;
            /* padding: 15px; */
        }

        .hero-message a {
            text-decoration: none;
            color: #007185;
        }

        .hero-message a:hover {
            text-decoration: underline;
        
        }


        /* Shopping items boxes */

        .shop-section {

            width: 100vw;
            /* border: 2px solid rebeccapurple; */
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            background-color: #e2e7e6;
        }

        .box {
            margin-top: 20px;
            margin-bottom: 8px;
            height: 400px;
            width: 23%;
            /* border: 2px solid red; */
            /* margin: 10px; */
            background-color: white;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            /* gap: 5px; */
            /* align-items: center; */
            padding: 5px 25px;
        }

        .box h2 {
            margin-top: 10px;
            height: 10%;
        }

        .box-img {
            height: 80%;
            width: 100%;
            /* border: 2px solid rebeccapurple; */
        }

        .box-img img {
            height: 100%;
            width: 100%;
        }

        .box p {
            margin-bottom: 10px;
            margin-top: 10px;
        }

        .box a {
            text-decoration: none;
            color: #007185;
        }

        .box a:hover {
            text-decoration: underline;
            
        }


        /* First Footer CSS */

        .first-footer {
            width: 100vw;
            margin-top: 0px;
            height: 50px;
            background-color: #37475a;
            display: flex;
            align-items: center;
            justify-content: center;
        
        }

        .first-footer a {
            text-decoration: none;
            color: white;
            font-size: 0.87rem;
        }

        .first-footer a:hover {
            font-size: 1.1rem;
        }   


        /* Second Footer */

        .footer-Second {
            /* padding-top: 20px; */
            width: 100vw;
            height: 350px;
            display: flex;
            padding: 50px;
            /* align-items: center; */
            justify-content: center;
            gap: 90px;
            background-color: #222f3d;
            color: white;
        }

        .footer-Second a {
            text-decoration: none;
            color: white;
            font-size: 0.8rem;

        }

        .footer-Second a:hover {
            text-decoration: underline;
           
        }

        .footerbox-1 {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .footerbox-2 {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .footerbox-3 {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .footerbox-4 {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

            
        /* Third Footer */
        
        .footer-third
        {
            width: 100vw;
            height: 150px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: #1b2530f4;
            border-top:  0.2px solid rgb(255, 255, 255);
            align-items: center;
            gap: 15px;
            color: white;
        }

        .Logo-language
        {
           
            display: flex;
            gap: 150px;

        }
        .Logo-language img
        {
     
            height: 70px;
        }

        .Logo-language img:hover
        {
            transform: scaleX(1.5);
        
        }

        .Logo-language select
        {
            width: 100px;
            height: 50px;
            text-align: center;
            color: white;
            background-color: transparent;
        }

        .Countries
        {
            font-size: 0.8rem;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;

        }

        .Countries a
        {
            color: white;
            text-decoration: none;
            /* margin: 5px; */
        }

        .Countries a:hover
        {
           
            text-decoration: underline;
          /* margin: 5px; */
        }

 
        /* Fourth Footer */

        .Fourth-footer
        {
            width: 100vw;
            height: 80px;
            background-color: #0f1111;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 5px;
            font-size: 0.78rem;
        }

        .Fourth-footer a
        {
            text-decoration: none;
            color: white;
            margin: 9px;
        }

        .Fourth-footer a:hover
        {
         text-decoration: underline;
        }


   

        
    </style>
</head>

<body>

    <header id="headerID">

        <div class="navbar">

            <div class="logo1 border"> </div>

            <div class="nav-address border">

                <div class="add-icon">
                    <i class="fa-sharp fa-solid fa-location-dot"></i>
                </div>

                <div class="info-county-deliever">
                    <p class="add-first">Deliver To</p>
                    <p class="add-Contry">India</p>
                </div>

            </div>

            <div class="navsearch">
                <select name="" id="select-search">
                    <option value="all">All</option>
                </select>
                <input type="text" name="" id="searchbar" placeholder="Search on Amazon">

                <div class="search-icon">
                    <i class="fa-sharp fa-solid fa-magnifying-glass"></i>
                </div>

            </div>

            <div class="signin border">
                <p class="nav-first">Hellow,<span id="sign-in"><a href="#"> Sign in </a></span></p>
                <p class="nav-second">Account & Lists </p>
            </div>



            <div class="signin border">
                <p class="nav-first">Returns </p>
                <p class="nav-second"> & Orders </p>
            </div>

            <div class="nav-cart border">
                <span class="badge text-bg-secondary"><i class="fa-solid fa-cart-shopping"></i></span>
                Cart

            </div>




        </div>

        <div class="down-panel">

            <div class="nav-all border">
                <i class="fa-solid fa-bars"></i>
                <span >ALL</span>
            </div>

            <div class="options">
                <span class="border">Todays Deals</span>
                <span class="border">Customer Services</span>
                <span class="border">Registry</span>
                <span class="border">Gifts Cards</span>
                <span class="border">Sell</span>
            </div>

            <div class="specific-section border">
                <p ><a href="logout.php">Log Out</a></p>
            </div>

            <div class="specific-section border">
                <p ><a href="accdelet.php">Delete Account</a></p>
            </div>

            <div class="specific-section border">
                <p ><a href="resetpass.php">Reset Password</a></p>
            </div>

        </div>

    </header>

    <div class="hero-section">

        <div class="hero-message">
            <p>You are on amazon.com. You can also shop on Amazon India for millions of products with fast local
                delivery. <a href="#">Click here to go to amazon.in</a></p>
        </div>

    </div>

    <div class="shop-section">

        <div class="box">
            <h2>Clothes</h2>
            <div class="box-img">
                <img src="box1_image.jpg" alt="">
            </div>
            <p><a href="#">See More</a></p>
        </div>

        <div class="box">
            <h2>Health and Care</h2>
            <div class="box-img">
                <img src="box2_image.jpg" alt="">
            </div>
            <p><a href="#">See More</a></p>
        </div>

        <div class="box">
            <h2>Furniture</h2>
            <div class="box-img">
                <img src="box3_image.jpg" alt="">
            </div>
            <p><a href="#">See More</a></p>
        </div>

        <div class="box">
            <h2>Smart Phones</h2>
            <div class="box-img">
                <img src="box4_image.jpg" alt="">
            </div>
            <p><a href="#">See More</a></p>
        </div>


        <div class="box">
            <h2>Cosmatics</h2>
            <div class="box-img">
                <img src="box5_image.jpg" alt="">
            </div>
            <p><a href="#">See More</a></p>
        </div>

        <div class="box">
            <h2>Pet Care</h2>
            <div class="box-img">
                <img src="box6_image.jpg" alt="">
            </div>
            <p><a href="#">See More</a></p>
        </div>

        <div class="box">
            <h2>New Toys</h2>
            <div class="box-img">
                <img src="box7_image.jpg" alt="">
            </div>
            <p><a href="#">See More</a></p>
        </div>

        <div class="box">
            <h2>Fashion</h2>
            <div class="box-img">
                <img src="box8_image.jpg" alt="">
            </div>
            <p><a href="#">See More</a></p>
        </div>

    </div>

    <footer>

        <div class="first-footer">
           <a href="#headerID"> Back to Top </a> 
        </div>

        <div class="footer-Second">

            <div class="footerbox-1">
                <h3>Get to Know Us</h3>
                <a href="#">About Us</a>
                <a href="#">Careers</a>
                <a href="#">Press Releases</a>
                <a href="#">Amazon Science</a>
            </div>

            <div class="footerbox-2">
                <h3> Connect with Us</h3>
                <a href="#">Facebook</a>
                <a href="#">Twitter</a>
                <a href="#">Instagram</a>

            </div>

            <div class="footerbox-3">
                <h3> Make Money with Us</h3>
                <a href="#">Sell on Amazon</a>
                <a href="#">Sell under Amazon Accelerator</a>
                <a href="#">Protect and Build Your Brand</a>
                <a href="#">Amazon Global Selling</a>
                <a href="#">Become an Affiliate</a>
                <a href="#">Fulfilment by Amazon</a>
                <a href="#">Advertise Your Products</a>
                <a href="#">Amazon Pay on Merchants</a>

            </div>

            <div class="footerbox-4">
                <h3>Let Us Help You</h3>
                <a href="">COVID-19 and Amazon</a>
                <a href="">Your Account</a>
                <a href="">Returns Centre</a>
                <a href="">100% Purchase Protection</a>
                <a href="">Amazon App Download</a>
                <a href="">Help</a>
            </div>

        </div>

        <div class="footer-third">
          
            <div class="Logo-language">
                <img src="amazon_logo.png" alt="">
                <select name="Language" id="Language-seledt">
                    <option value="English" selected>English</option>
                    <option value="Marathi">Marathi</option>
                    <option value="Hindi">Hindi</option>
                </select>
            </div>
           
            <div class="Countries">
                <a href="#">Australia</a>
                <a href="#">Brazil</a>
                <a href="#">Canada</a>
                <a href="#">China</a>
                <a href="#">France</a>
                <a href="#">Germany</a>
                <a href="#">Italy</a>
                <a href="#">Japan</a>
                <a href="#">Mexico</a>
                <a href="#">Netherlands</a>
                <a href="#">Poland</a>
                <a href="#">Singapore</a>
                <a href="#">Spain</a>
                <a href="#">Turkey</a>
                <a href="#">United Arab Emirates</a>
                <a href="#">United Kingdom</a>
                <a href="#">United States</a>
            </div>

        </div>

        <div class="Fourth-footer">
            <p>
            <a href="#">Condition of Use and Sales</a>
            <a href="#">Privacy Notice</a>
            <a href="#">Interest-Based Ads</a>
           </p>
            <p> &copy; 1996-2023 Amazon.com, INC.or its affiliates</p>
        </div>



    </footer>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>


</html>