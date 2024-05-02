<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professor Main Menu</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

    <style>
        
        body{
         background: #CBC4BA;
         overflow-x: hidden;
        overflow: hidden;
        }
        #error-message {
            position: absol ute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 15px;
            background-color: #ffcccc;
            color: #ff0000;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            z-index: 1000;
            display: none;
        }
 
        #error-message.show {
            display: block;
        }
 
        #error-message button {
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #ff0000;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .close {
        /* Add your button styles here */
        background-color: transparent; /* Example background color */
        height: 30px;
        width:  30px;
        border: none;
        padding: 5px;
        border-radius: 5px;
        cursor: pointer;
        margin-left: 350px;
        overflow: hidden; 
        }
        /* CSS for the icon inside the button */
        .close i {
            /* Add your icon styles here */
            color: black; /* Example color */
            font-size: 25px;
            margin:-3px
            /* transition: opacity 0.3s ease; Add transition for background color */
        }
        /* Change background color on hover */
        .close i:hover {
            opacity: 50%; /* Example background color on hover */
            border-radius:25px;
    }
    </style>
    <link rel="stylesheet" href="AdminHomeStyle.css">
    <?php include 'login.php'; ?>
    <?php include 'editProfile.php'; ?>
    
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
                <div class="profile">
                    <img src="menu_assets/prof.jpg" alt="profile-img">
                </div>
                <div class="menu" id ="menuBtn">
                    <h3><?php echo $_SESSION['username']; ?><br/>
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
                        <button class = "close" onclick= "closeEditform()">  <i class="fa-regular fa-circle-xmark"></i> </button>
                    </div>
                    
                    <form id="editProfileForm" action="editProfile.php" method="POST">
                       
                        <div class="profile">
                            <img src="menu_assets/prof.jpg" alt="profile-img">
                        </div>
                        <h5edit><?php echo $_SESSION['username']; ?><br/>
                        <span><?php echo $_SESSION['user_email']; ?></span>
                        </h5edit>
                        <h3> <input type="text" id="profileemailID" class="inputEmail" name="userEmail" placeholder="Input your Email"> </h3>
                        <h3> <input type="text" id="profilenameID" class="inputname" name="newname" placeholder="Input new Name"> </h3>
                        <h3> <input type="text" id="profilepasswordID" class="inputPassword" name="newPassword" placeholder="Input new Password"> </h3>
                        <button type="submit" class="saveEditbtn"> Save Changes </button>
                       
                    </form>
                   
                    <?php if(isset($_SESSION['error_message'])) { ?>
                <div id="error-message" class="show">
 
                    <?php echo $_SESSION['error_message']; ?>
                    <button onclick="clearErrorMessage()">OK</button>
                </div>
            <?php
                unset($_SESSION['error_message']); // Clear the error message after displaying it
            } ?>
 
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
    </div> 
    <div class="wrapper">
        <div class="adminClass">  
        <main class="table" id="customers_table">
            <section class="table__header">
                <h1> User Accounts </h1> 
                <div class="input-group">
                    <input type="search" placeholder="Search Data...">
                    <img src="images/search.png" alt="">
                </div>
                <!-- Popup/Modal Structure -->
                <div id="editDeleteModal" class="modal">
                    <div class="modal-content">
                        <h4>Edit/Delete User</h4>
                        <label for="userId">User ID:</label>
                        <input type="text" id="userId" name="userId"><br>

                        <label for="userType">User Type:</label>
                        <input type="text" id="userType" name="userType"><br>

                        <button id="saveEditBtn">Save Changes</button>
                        <button id="deleteUserBtn">Delete User</button>
                        <button class="close-modal-btn">Close</button>
                    </div>
                </div>
            </section>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th> User ID <span class="icon-arrow">&UpArrow;</span></th>
                            <th> User Type <span class="icon-arrow">&UpArrow;</span></th>
                            <th> User Name <span class="icon-arrow">&UpArrow;</span></th>
                            <th> User Email <span class="icon-arrow">&UpArrow;</span></th>
                        </tr>
                    </thead>
                    <tbody id="user_table_body">
                        <!-- User data will be dynamically appended here -->
                    </tbody>
                </table>
            </section>
        </main> 
        <?php include 'editProfile.php'; ?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="useradmin.js"></script>
                         <!-- <tr>
                        <td> "userID":"20240001 </td>
                        <td> "userType":"Student"</td>
                        <td> "userName":"Austria, Jose" </td>
                        <td> "userEmail":"jaustria@student.apc.edu.ph"</td>
                        </tr> -->
        <script>
            $(document).ready(function(){
    // Function to load users based on search query
    function loadUsers(searchQuery = '') {
        $.ajax({
            url: 'useradmin.php',
            type: 'GET',
            data: {search: searchQuery},
            success: function(response){
                // Parse JSON response
                var users = JSON.parse(response);
                // Clear existing rows
                $('#user_table_body').empty();
                // Append user data to the table
                users.forEach(function(user){
                    var newRow = '<tr>';
                    newRow += '<td>' + user.userID + '</td>';
                    newRow += '<td>' + user.userType + '</td>';
                    newRow += '<td>' + user.userName + '</td>';
                    newRow += '<td>' + user.userEmail + '</td>';
                    newRow += '</tr>';
                    $('#user_table_body').append(newRow);
                });
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText);
            }
        });
    }

    // Initial load of users
    loadUsers();

    // Handles search in users
    const search = document.querySelector('.input-group input');
    search.addEventListener('input', function() {
        loadUsers(search.value);
    });

    // Handle click on edit button
    $('#user_table_body').on('click', '.edit-btn', function() {
        // Retrieve user data from the row
        var rowData = $(this).closest('tr').find('td').map(function(){
            return $(this).text();
        }).get();

        // Populate the modal/popup with user data for editing
        $('#userId').text(rowData[0]); // Display user ID
        $('#userType').val(rowData[1]); // Set user type in input field 

        // Display the modal/popup
        $('#editDeleteModal').show();
    });

    // Handle click on delete button
    $('#user_table_body').on('click', '.delete-btn', function() {
        // Retrieve user ID from the row
        var userId = $(this).closest('tr').find('td:first').text();

        // Confirm deletion with user
        if (confirm("Are you sure you want to delete this user?")) {
            // Perform delete operation using AJAX
            $.ajax({
                url: 'delete&edituser.php',
                type: 'POST',
                data: {userId: userId},
                success: function(response){
                    // Reload users after successful deletion
                    loadUsers(search.value);
                },
                error: function(xhr, status, error) {
                    // Handle errors
                    console.error(xhr.responseText);
                }
            });
        }
    });

    // Handle click on save changes button
    $('#saveEditBtn').click(function(){
        // Retrieve edited user data
        var userId = $('#userId').text();
        var userType = $('#userType').val(); 

        // Perform update operation using AJAX
        $.ajax({
            url: 'delete&edituser.php',
            type: 'POST',
            data: {
                userId: userId,
                userType: userType 
            },
            success: function(response){
                // Reload users after successful edit
                loadUsers(search.value);
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText);
            }
        });
    });

    // Close modal/popup when close button is clicked
    $('.close-modal-btn').click(function(){
        $('#editDeleteModal').hide();
    });
});

        </script>

        </script>
        </div>
    </div>
<script src="adminHome.js"></script>   
</body>
</html>