<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airport Management System</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <?php include('./include/navbar.php'); ?>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="mt-5">
                    <h2>Airport Management System</h2>

                    <?php
                    // Database connection
                    include("/wamp64/www/shopflix/Admin/connection.php");

                    // Insert airport
                    if (isset($_POST['submit'])) {
                        $airportName = $_POST['airportName'];
                        $airportCode = $_POST['airportCode'];
                        $state = $_POST['state'];
                        $city = $_POST['city'];
                        $location = $_POST['location'];

                        $sql = "INSERT INTO airport (AirportName, AirportCode, State, City, Location) VALUES ('$airportName', '$airportCode', '$state', '$city', '$location')";
                        mysqli_query($conn, $sql);
                    }

                    // Delete airport
                    if (isset($_GET['delete'])) {
                        $airportID = $_GET['delete'];
                        $sql = "DELETE FROM airport WHERE AirportID=$airportID";
                        mysqli_query($conn, $sql);
                    }
                    ?>

                    <form method="post" action="">
                        <div class="form-group">
                            <label for="state">State:</label>
                            <select class="form-control" id="state" name="state" required onchange="populateCities(this.value)">
                                <option value="">Select State</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Maharastra">Maharastra</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="UttarPradesh">UttarPradesh</option>
                                <option value="West Bengal">West Bengal</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Karnataka">Karnataka</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">City:</label>
                            <select class="form-control" id="city" name="city" required onchange="populateAirportFields(this.value)">
                                <option value="">Select City</option>
                            </select>
                        </div>
                        <div class="form-group" id="airportNameField" style="display:none;">
                            <label for="airportName">Airport Name:</label>
                            <select class="form-control" id="airportName" name="airportName" required>
                                <option value="">Select Airport Name</option>
                            </select>
                        </div>
                        <div class="form-group" id="airportCodeField" style="display:none;">
                            <label for="airportCode">Airport Code:</label>
                            <select class="form-control" id="airportCode" name="airportCode" required>
                                <option value="">Select Airport Code</option>
                                <!-- Airport codes will be populated dynamically based on the selected city -->
                            </select>
                        </div>
                        <div class="form-group" id="locationField" style="display:none;">
                            <label for="location">Location:</label>
                            <select class="form-control" id="location" name="location" required>
                                <option value="">Select Location</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Add Airport</button>
                    </form>

                    <h2 class="mt-5">Airports</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Airport Name</th>
                                <th>Airport Code</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Location</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result = mysqli_query($conn, "SELECT * FROM airport");
                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['AirportName'] . "</td>";
                                    echo "<td>" . $row['AirportCode'] . "</td>";
                                    echo "<td>" . $row['State'] . "</td>";
                                    echo "<td>" . $row['City'] . "</td>";
                                    echo "<td>" . $row['Location'] . "</td>";
                                    echo "<td><a href='?delete=" . $row['AirportID'] . "' class='btn btn-danger'>Delete</a></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "Error: " . mysqli_error($conn);
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function populateCities(selectedState) {
            var cities = [];
            switch (selectedState) {
                case "Gujarat":
                    cities = ["---Select City---","Ahmedabad", "Surat", "Vadodara"];
                    break;
                case "Maharastra":
                    cities = ["---Select City---","Mumbai", "Pune", "Nagpur"];
                    break;
                case "Rajasthan":
                    cities = ["---Select City---","Jaipur", "Udaipur"];
                    break;
                case "UttarPradesh":
                    cities = ["---Select City---","Lucknow", "Kanpur", "Varanasi"];
                    break;
                case "West Bengal":
                    cities = ["---Select City---","Kolkata", "Durgapur", "Siliguri"];
                    break;
                case "Madhya Pradesh":
                    cities = ["---Select City---","Bhopal", "Indore"];
                    break;
                case "Punjab":
                    cities = ["---Select City---","Amritsar", "Chandigarh"];
                    break;
                case "Tamil Nadu":
                    cities = ["---Select City---","Chennai", "Coimbatore"];
                    break;
                case "Karnataka":
                    cities = ["--Select City---","Bengaluru", "Mangalore", "Mysore"];
                    break;
                    // Add cases for other states as needed
                default:
                    cities = [];
            }
            var cityDropdown = document.getElementById("city");
            cityDropdown.innerHTML = ""; // Clear previous options
            cities.forEach(function(city) {
                var option = document.createElement("option");
                option.text = city;
                option.value = city;
                cityDropdown.add(option);
            });
        }

        function populateAirportFields(selectedCity) {
            var airportNames = [];
            var airportCodes = [];
            var locations = [];

            // Assuming these arrays are fetched from your database based on the selected city
            switch (selectedCity) {
                case "Ahmedabad":
                    airportNames = ["Sardar Vallabhbhai Patel International Airport"];
                    airportCodes = ["AMD"];
                    locations = ["Hansol, Ahmedabad, Gujarat 380003"];
                    break;
                case "Surat":
                    airportNames = ["Surat Airport"];
                    airportCodes = ["STV"];
                    locations = ["Surat - Dumas Rd, Gaviyer, Surat, Gujarat 395007"];
                    break;
                case "Vadodara":
                    airportNames = ["Vadodara Airport"];
                    airportCodes = ["BDQ"];
                    locations = ["Civil Aerodrome, Harni Rd, Vadodara, Gujarat 390022"];
                    break;
                case "Mumbai":
                    airportNames = ["Chhatrapati Shivaji Maharaj International Airport"];
                    airportCodes = ["BOM"];
                    locations = ["Mumbai, Maharashtra 400099"];
                    break;
                case "Pune":
                    airportNames = ["Pune International Airport"];
                    airportCodes = ["PNQ"];
                    locations = ["New Airport Rd, Pune International Airport Area, Lohegaon, Pune, Maharashtra 411032"];
                    break;
                case "Nagpur":
                    airportNames = ["Dr Babasaheb Ambedkar International Airport"];
                    airportCodes = ["NAG"];
                    locations = ["Sonegaon, Nagpur, Maharashtra 440005"];
                    break;
                case "Jaipur":
                    airportNames = ["Jaipur International Airport"];
                    airportCodes = ["JAI"];
                    locations = ["Airport Rd, Sanganer, Jaipur, Rajasthan"];
                    break;
                case "Udaipur":
                    airportNames = ["Maharana Pratap Airport"];
                    airportCodes = ["UDR"];
                    locations = ["NH 76, Dabok, Rajasthan 313022"];
                    break;
                case "Lucknow":
                    airportNames = ["Chaudhary Charan Singh International Airport"];
                    airportCodes = ["LKO"];
                    locations = ["Amausi, Lucknow, Uttar Pradesh"];
                    break;
                case "Kanpur":
                    airportNames = ["Chakeri Airport"];
                    airportCodes = ["Airforce Lane, Kanpur Cantonment, Kanpur, Uttar Pradesh "];
                    locations = ["KNU"];
                    break;
                case "Varanasi":
                    airportNames = ["Lal Bahadur Shastri International Airport"];
                    airportCodes = ["VNS"];
                    locations = ["Varanasi, Babatpur, Uttar Pradesh"];
                    break;
                case "Kolkata":
                    airportNames = ["Netaji Subhash Chandra Bose International Airport"];
                    airportCodes = ["CCU"];
                    locations = ["Jessore Rd, Dum Dum, Kolkata, West Bengal"];
                    break;
                case "Durgapur":
                    airportNames = ["Kazi Nazrul Islam Airport"];
                    airportCodes = ["RDP"];
                    locations = ["Service Cluster Block Building, Block-Andal, Airport Approach Rd, Durgapur, West Bengal "];
                    break;
                case "Siliguri":
                    airportNames = ["Bagdogra International Airport"];
                    airportCodes = ["IXB"];
                    locations = ["M8PG+25X, Distt. Darjeeling Siliguri, Bagdogra, West Bengal "];
                    break;

                case "Amristar":
                    airportNames = ["Sri Guru Ram Dass Jee International Airport"];
                    airportCodes = ["ATQ"];
                    locations = ["Ajnala Rd, opp. Hotel Blue Radison, Raja Sansi, Punjab"];
                    break;
                case "Chandigarh":
                    airportNames = ["Shaheed Bhagat Singh International Airport"];
                    airportCodes = ["IXC"];
                    locations = [" Shaheed Bhagat Singh International Airport, Chandigarh International Airport Limited, Mohali"];
                    break;
                case "Chennai":
                    airportNames = ["Chennai International Airport"];
                    airportCodes = ["MAA"];
                    locations = ["Airport Rd, Meenambakkam, Chennai, Tamil Nadu"];
                    break;
                case "Coimbatore":
                    airportNames = ["Coimbatore International Airport"];
                    airportCodes = ["CJB"];
                    locations = ["Airport Road, Peelamedu - Pudur Main Rd, Coimbatore, Tamil Nadu "];
                    break;
                case "Bengaluru":
                    airportNames = ["Kempegowda International Airport,"];
                    airportCodes = ["BLR"];
                    locations = ["KIAL Rd, Devanahalli, Bengaluru, Karnataka 560300"];
                    break;
                case "Mangalore":
                    airportNames = ["Mangaluru International Airport"];
                    airportCodes = ["IXE"];
                    locations = ["Bajpe Main Rd, Kenjar HC, Mangaluru, Karnataka"];
                    break;
                case "Mysore":
                    airportNames = ["Mysuru Airport"];
                    airportCodes = ["MYQ"];
                    locations = ["Kozhikode-Mysore-Kollegal Hwy, Mysuru, Karnataka"];
                    break;

                    // Add cases for other cities as needed
                default:
                    airportNames = [];
                    airportCodes = [];
                    locations = [];
            }

            var airportNameDropdown = document.getElementById("airportName");
            airportNameDropdown.innerHTML = ""; // Clear previous options
            var airportCodeDropdown = document.getElementById("airportCode");
            airportCodeDropdown.innerHTML = ""; // Clear previous options
            var locationDropdown = document.getElementById("location");
            locationDropdown.innerHTML = ""; // Clear previous options

            airportNames.forEach(function(airportName, index) {
                var nameOption = document.createElement("option");
                nameOption.text = airportName;
                nameOption.value = airportName; // Corrected to display airport name
                airportNameDropdown.add(nameOption);

                var codeOption = document.createElement("option");
                codeOption.text = airportCodes[index];
                codeOption.value = airportCodes[index];
                airportCodeDropdown.add(codeOption);

                var locationOption = document.createElement("option");
                locationOption.text = locations[index];
                locationOption.value = locations[index];
                locationDropdown.add(locationOption);
            });

            // Show the fields
            document.getElementById("airportNameField").style.display = "block";
            document.getElementById("airportCodeField").style.display = "block";
            document.getElementById("locationField").style.display = "block";
        }
    </script>

</body>

</html>
