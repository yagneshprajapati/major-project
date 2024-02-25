<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ShopFlix - Your Online Shopping Destination</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Add your custom CSS file if you have one -->
    <style>
        /* Add your custom styles here */
        body {
            padding-top: 56px; /* Adjust the padding based on the navbar height */
        }

        /* Mega Menu Styles */
        .mega-menu {
            position: absolute !important;
            width: 100% !important;
            visibility: visible !important;
            opacity: 1 !important;
            display: none;
            margin-top: 0;
            border: none;
            box-shadow: none;
            border-radius: 0;
            left: 0;
            z-index: 1000;
            background-color: #fff; /* Background color for the dropdown menu */
            padding: 20px; /* Padding for the dropdown menu */
            transition: all 0.3s ease; /* Smooth transition effect */
        }

        .mega-menu a {
            color: #333;
            display: block;
            padding: 5px 0;
            transition: color 0.3s ease; /* Smooth transition effect for link color */
        }

        .mega-menu a:hover {
            color: #007bff; /* Hover color for links */
        }

        .nav-item:hover .mega-menu {
            display: block;
        }

        /* Show more categories link */
        .show-more-link {
            color: #007bff;
            text-decoration: none;
            cursor: pointer;
        }

        /* Increase font size for better readability */
        .navbar-nav .nav-link {
            font-size: 18px;
        }

        /* Optional: Add more styles based on your design preferences */
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">ShopFlix</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Flight Booking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Report an Issue</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Book a Demo</a>
                </li>
                <li class="nav-item dropdown mega-menu-container">
                    <a class="nav-link dropdown-toggle" href="#" id="megaMenuDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu mega-menu" aria-labelledby="megaMenuDropdown">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <h5>Electronics</h5>
                                    <a href="#" class="dropdown-item">Smartphones</a>
                                    <a href="#" class="dropdown-item">Laptops</a>
                                    <a href="#" class="dropdown-item">Cameras</a>
                                    <a href="#" class="dropdown-item">Headphones</a>
                                    <a href="#" class="dropdown-item">Accessories</a>
                                    <a href="#" class="dropdown-item d-none">More Categories...</a>
                                </div>
                                <div class="col">
                                    <h5>Clothing</h5>
                                    <a href="#" class="dropdown-item">Men's Fashion</a>
                                    <a href="#" class="dropdown-item">Women's Fashion</a>
                                </div>
                                <div class="col">
                                    <h5>Home & Furniture</h5>
                                    <a href="#" class="dropdown-item">Living Room</a>
                                    <a href="#" class="dropdown-item">Bedroom</a>
                                    <a href="#" class="dropdown-item">Kitchen</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
            </form>
            <ul class="navbar-nav ml-2">
                <li class="nav-item">
                    <a class="nav-link" href="#">Cart <i class="fas fa-shopping-cart"></i>
                        <span class="badge badge-danger">3</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Account
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">My Profile</a>
                        <a class="dropdown-item" href="#">Orders</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Your content goes here -->

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Font Awesome for the shopping cart icon -->
    <script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>

</body>

</html
