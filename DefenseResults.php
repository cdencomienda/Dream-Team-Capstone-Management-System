<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Defemse Result</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <?php include 'login.php'; ?>
    <?php include 'editProfile.php'; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="AdminHomeStyle.css">
    
    <div class="header">
        <div class="wrap">
            <button type="button" class="logobtn"  onclick="openArchive()"></button>
            </div>
        <div class="search">
            <input type="text" class="searchTerm" placeholder="Search for Capstone Projects?">
            <button type="submit" class="searchButton">
            <span>&#128269;</span>
            </button>
        </div>
 
        <div class="container">
            <div class="action">
                <div class="profile" id="profilePic">
                    <img src="menu_assets/prof.png" alt="profile-img">
                </div>
                <div class="menu" id="menuBtn">
                    <h3><?php echo $_SESSION['fName'] . ' ' . $_SESSION['lname']; ?><br/>
                        <span><?php echo $_SESSION['user_email']; ?></span>
                    </h3>
                    <button type="button" class="editprofileBtn" id="editProfileBtn">Edit Profile</button>
                    <button type="button" class="logoutBtn" onclick="logOUT()">Logout</button>
                </div>
            </div>
            <!-- editprofile --> 
            <div id="editProfileOverlay" class="editoverlay">
                <div class="dropdown-profile">
                    <div>
                        <button class="close" onclick="closeEditform()"><i class="fa-regular fa-circle-xmark"></i></button>
                    </div>
                    <form id="editProfileForm" action="editProfile.php" method="POST">
                        <div class="profile">
                            <img src="menu_assets/prof.png" alt="profile-img">
                        </div>
                        <h5edit><?php echo $_SESSION['fName'] . ' ' . $_SESSION['lname']; ?><br/>
                        <span><?php echo $_SESSION['user_email']; ?></span>
                        </h5edit>
                        <h3><input type="text" id="profileemailID" class="inputEmail" name="userEmail" placeholder="Input your Email"></h3>
                        <h3><input type="text" id="profileFnameID" class="inputname" name="newFname" placeholder="Input new First Name"></h3>
                        <h3><input type="text" id="profileLnameID" class="inputname" name="newLname" placeholder="Input new Last Name"></h3>
                        <h3><input type="text" id="profilepasswordID" class="inputPassword" name="newPassword" placeholder="Input new Password"></h3>
                        <button type="submit" class="saveEditbtn">Save Changes</button>
                    </form>
                    <?php if(isset($_SESSION['error_message'])) { ?>
                    <div id="error-message" class="show">
                        <?php echo $_SESSION['error_message']; ?>
                        <button onclick="clearErrorMessage()">OK</button>
                    </div>
                    <?php unset($_SESSION['error_message']); } ?>
                </div>
            </div>
        </div>
 
    <script>
        window.onload = function() {
            var urlParams = new URLSearchParams(window.location.search);
 
            if (urlParams.has('showOverlay')) {
                document.getElementById('editProfileOverlay').style.display = 'block';
            }
            window.onclick = function(event) {
                if (event.target == overlay) {
                    overlay.style.display = 'none';
                }
            }

            // Add event listener to the close button
            var closeButton = document.querySelector('.close');
            closeButton.addEventListener('click', closeEditform);
        }

        // Define closeEditform function
        function closeEditform() {
            document.getElementById('editProfileOverlay').style.display = 'none';
            document.getElementById('menuBtn').style.display = 'none';
            location.reload();
        }
    </script>
            <script>
            function clearErrorMessage() {
                var errorMessage = document.getElementById("error-message");
                errorMessage.classList.remove("show");
            }
            </script>
                </div>
            </div>
        </div>
    </div>
</head>
<body>  
    <div class="Lsection">
        <div id="sectionBtn"></div>
        <button type="button" class="notif"  onclick="notifAuth()">Notification</button>
        <button type="button" class="class"  onclick="openClassPage()">Class</button>
        <button type="button" class="schedule"  onclick="Schedule()">Schedule</button>
        <button type="button" class="capstone"  onclick="Capstone()">Capstone Defense</button>
        <button type="button" class="Users"  onclick="Users()">Users</button>
        <button type="button" class="Defense-Reports"  onclick="DefenseR()">Defense Results</button>
        <button type="button" class="advisory"  onclick="advisoryProf()">Advisory</button>
        </div> 
    </div>
     <!-- bar graph code  -->
     <div class="classlist">
        <div class="Tablecontainer">
            <div class="tableHeader">
                <h1>Defense Results</h1>
            </div>
            <table>
                <thead>
                    <tr> 
                        <th class="courseName-column">Course Name</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="criteria">
                        <!-- <td class="courseCode">
                            <strong>DATAMGT</strong><br>
                        </td> -->
                        <td class="courseName">
                            <a href="javascript:void(0);" onclick="showStats('DATAMGT-stats')">DATA MANAGEMENT</a><br>
                        </td>
                    </tr>
                    <tr class="criteria">
                        <!-- <td class="courseCode">
                            <strong>SOFTDES</strong><br>
                        </td> -->
                        <td class="courseName">
                            <a href="javascript:void(0);" onclick="showStats('SOFTDES-stats')">Software Design</a><br>
                        </td>
                    </tr>
                    <tr class="criteria">
                        <!-- <td class="courseCode">
                            <strong>CPEMETS</strong><br>
                        </td> -->
                        <td class="courseName">
                            <a href="javascript:void(0);" onclick="showStats('CPEMETS-stats')">CPE Methods of Research</a><br>
                        </td>
                    </tr>
                    <tr class="criteria">
                        <!-- <td class="courseCode">
                            <strong>CPEDES1</strong><br>
                        </td> -->
                        <td class="courseName">
                            <a href="javascript:void(0);" onclick="showStats('CPEDES1-stats')">CPE Design 1</a><br>
                        </td>
                    </tr>
                    <tr class="criteria">
                        <!-- <td class="courseCode">
                            <strong>CPEDES2</strong><br>
                        </td> -->
                        <td class="courseName">
                            <a href="javascript:void(0);" onclick="showStats('CPEDES2-stats')">CPE Design 2</a><br>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div id="stats-modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <label for="academic-year">Select Academic Year:</label>
        <select id="academic-year" onchange="updateStatsAndChart()">
            <option value="2024-2025">2024-2025</option>
            <option value="2023-2024">2023-2024</option>
            <option value="2022-2023">2022-2023</option>
        </select>

        <!-- Statistics containers for DATAMGT and SOFTDES -->
        <div id="DATAMGT-stats" class="stats-container">
            <h2>Final Defense Report DATA MANAGEMENT</h2>
            <table>
                <tr>
                    <th>FINAL VERDICT</th>
                    <th>Percentage</th>
                </tr>
                <tr>
                    <td>PASS</td>
                    <td id="datamgt-pass">15%</td>
                </tr>
                <tr>
                    <td>CONDITIONAL PASS</td>
                    <td id="datamgt-conditional-pass">55%</td>
                </tr>
                <tr>
                    <td>REPEAT</td>
                    <td id="datamgt-repeat">20%</td>
                </tr>
                <tr>
                    <td>Passing Rate</td>
                    <td id="datamgt-passing-rate">70%</td>
                </tr>
            </table>
        </div>
        
        <div id="SOFTDES-stats" class="stats-container">
            <h2>Final Defense Report SOFTWARE DESIGN</h2>
            <table>
                <tr>
                    <th>FINAL VERDICT</th>
                    <th>Percentage</th>
                </tr>
                <tr>
                    <td>PASS</td>
                    <td id="softdes-pass">25%</td>
                </tr>
                <tr>
                    <td>CONDITIONAL PASS</td>
                    <td id="softdes-conditional-pass">50%</td>
                </tr>
                <tr>
                    <td>REPEAT</td>
                    <td id="softdes-repeat">25%</td>
                </tr>
                <tr>
                    <td><h2>Passing Rate</h2></td>
                    <td id="softdes-passing-rate"><h2>75%<h2></td>
                </tr>
            </table>
        </div>

        <!-- Canvas for Bar Chart -->
        <canvas id="myBarChart" style="width: 600px; height: 170px; margin-top: 20px;"></canvas>

    </div>
</div>


<script>
    // Initialize the chart
    const ctx = document.getElementById('myBarChart').getContext('2d');
    let myBarChart; // Variable to hold the chart instance

    // Initial data for the chart
    const initialData = {
        labels: ['PASS', 'CONDITIONAL PASS', 'REPEAT'],
        datasets: [{
            label: 'Values',
            data: [15, 55, 30], // Initial data for 2024-2025
            backgroundColor: [
                'rgba(75, 192, 192, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(75, 192, 192, 1)',
                'rgba(255, 205, 86, 1)',
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        }]
    };

    // Chart configuration
    const config = {
        type: 'bar',
        data: initialData,
        options: {
            indexAxis: 'y',
            scales: {
                x: {
                    beginAtZero: true
                }
            }
        }
    };

    // Create the chart instance
    myBarChart = new Chart(ctx, config);

    function updateStatsAndChart() {
    const selectedYear = document.getElementById('academic-year').value;

    // Update statistics for DATAMGT
    if (selectedYear === "2024-2025") {
        document.getElementById("datamgt-pass").textContent = "15%";
        document.getElementById("datamgt-conditional-pass").textContent = "55%";
        document.getElementById("datamgt-repeat").textContent = "30%";
        const passPercentage = 15;
        const conditionalPassPercentage = 55;
        const repeatPercentage = 20;
        const totalPassingPercentage = passPercentage + conditionalPassPercentage;
        document.getElementById("datamgt-passing-rate").textContent = totalPassingPercentage + "%";

        // Update chart data
        myBarChart.data.datasets[0].data = [passPercentage, conditionalPassPercentage, repeatPercentage];
        myBarChart.update();
    } else if (selectedYear === "2023-2024") {
        // Update statistics for 2023-2024
        // Ensure these values match what is displayed in your HTML table
        document.getElementById("datamgt-pass").textContent = "20%";
        document.getElementById("datamgt-conditional-pass").textContent = "50%";
        document.getElementById("datamgt-repeat").textContent = "30%";
        const passPercentage = 20;
        const conditionalPassPercentage = 50;
        const repeatPercentage = 30;
        const totalPassingPercentage = passPercentage + conditionalPassPercentage;
        document.getElementById("datamgt-passing-rate").textContent = totalPassingPercentage + "%";

        // Update chart data
        myBarChart.data.datasets[0].data = [passPercentage, conditionalPassPercentage, repeatPercentage];
        myBarChart.update();
    }
    // Repeat the same process for SOFTDES

    if (selectedYear === "2024-2025") {
        document.getElementById("softdes-pass").textContent = "25%";
        document.getElementById("softdes-conditional-pass").textContent = "50%";
        document.getElementById("softdes-repeat").textContent = "25%";
        const passPercentage = 25;
        const conditionalPassPercentage = 50;
        const repeatPercentage = 25;
        const totalPassingPercentage = passPercentage + conditionalPassPercentage;
        document.getElementById("softdes-passing-rate").textContent = totalPassingPercentage + "%";

        // Update chart data
        myBarChart.data.datasets[0].data = [passPercentage, conditionalPassPercentage, repeatPercentage];
        myBarChart.update();
    } else if (selectedYear === "2023-2024") {
        // Update statistics for 2023-2024
        // Ensure these values match what is displayed in your HTML table
        document.getElementById("softdes-pass").textContent = "30%";
        document.getElementById("softdes-conditional-pass").textContent = "45%";
        document.getElementById("softdes-repeat").textContent = "25%";
        const passPercentage = 30;
        const conditionalPassPercentage = 45;
        const repeatPercentage = 25;
        const totalPassingPercentage = passPercentage + conditionalPassPercentage;
        document.getElementById("softdes-passing-rate").textContent = totalPassingPercentage + "%";

        // Update chart data
        myBarChart.data.datasets[0].data = [passPercentage, conditionalPassPercentage, repeatPercentage];
        myBarChart.update();
    }
}

</script>


<script src="adminHome.js"></script>
</body>
</html>
