<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin User Edit Menu</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" /> 

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
    <div class="wrapper">
        <div class="adminClass">    
        <main class="usertable" id="user_table">
            <section class="table__header">
                <h1> User Accounts </h1> 
                <div class="input-group">
                    <input type="search" placeholder="Search User..." stlye =" background: transparent;">
                    <img src="images/search.png" alt="">
                </div> 
                <!-- Popup/Modal Structure -->
                <div id="editDeleteModal" class="modal" style="display: none;">
                    
                    <div class="modal-content" id="modaluser">
                        <label for="userId">User ID:</label>
                        <input type="text" id="userId" name="userId"><br>
                        
                        <label for="userType">User Type:</label>
                            <select id="userType" name="userType">
                                <option value="Student">Student</option>
                                <option value="Professor">Professor</option>
                                <option value="Program Director">Program Director</option>
                                <option value="Admin">Admin</option>
                            </select><br>
                        <button class = saveeditbtn id="saveEditBtn">Save</button>
                        <button class = deleteuserbtn id="deleteUserBtn">Delete</button>
                        <button class="close-modal-btn">Close</button>
                    </div>  
                </div> 
            </section>
            <section class="table__body">
                <table>
                    <thead>
                        <tr>
                            <th> User ID </th>
                            <th> User Type </th>
                            <th> User Name </th>
                            <th> User Email </th>
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
<script>
    var sessionUserType = '<?php echo $_SESSION['userType']; ?>'; // Get user type from session
</script>
<script>
    $(document).ready(function(){
        // Function to load users based on search query
        function loadUsers(searchQuery = '') {
            $.ajax({
                url: 'useradmin.php',
                type: 'GET',
                data: {search: searchQuery},
                success: function(response){
                    var users = JSON.parse(response);
                    $('#user_table_body').empty();
                    users.forEach(function(user){
                        var newRow = '<tr class="user-row" data-user-id="' + user.userID + '" data-user-type="' + user.userType + '">';
                        newRow += '<td class="user-id">' + user.userID + '</td>';
                        newRow += '<td>' + user.userType + '</td>';
                        newRow += '<td>' + user.firstName + ' ' + user.lastName + '</td>';
                        newRow += '<td>' + user.userEmail + '</td>';
                        newRow += '<td><button class="show-modal-btn">Edit</button></td>';  
                        newRow += '</tr>';
                        $('#user_table_body').append(newRow);
                    });
                },
                error: function(xhr, status, error) {
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

        // Handle click on button to show modal
        $('#user_table_body').on('click', '.show-modal-btn', function(event) {
            event.stopPropagation();
            var userId = $(this).closest('.user-row').data('user-id');
            var userType = $(this).closest('tr').find('td:eq(1)').text().trim();
            var modal = $('#editDeleteModal');

            // Check if the current user has "Program Director" in session and the selected user is a "Program Director" or "Admin"
            if (sessionUserType === 'Program Director' && (userType === 'Program Director' || userType === 'Admin')) {
                alert('You cannot edit the role of a ' + userType + ' as a Program Director.');
                return; // Stop the modal from opening
            }

            // If the user is allowed to edit
            modal.find('#userId').val(userId);
            modal.find('#userType').val(userType);
            modal.find('#userType').data('original-value', userType);
            modal.show();
        });

        // Handle click on save changes button
        $('#saveEditBtn').click(function(){
            var userId = $('#userId').val();
            var userType = $('#userType').val(); 
            var originalUserType = $('#userType').data('original-value');

            // Prevent changing the role if session user is "Program Director" and is editing another "Program Director" or "Admin"
            if (sessionUserType === 'Program Director' && (originalUserType === 'Program Director' || originalUserType === 'Admin')) {
                alert('You cannot change the role of a ' + originalUserType + ' as a Program Director.');
                return;
            }

            // Perform update operation using AJAX
            $.ajax({
                url: 'delete&edituser.php',
                type: 'POST',
                data: {
                    userId: userId,
                    userType: userType 
                },
                success: function(response){
                    loadUsers(search.value);
                    $('#editDeleteModal').hide();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>


        </script>
        </div>
    </div>
<script src="adminHome.js"></script>   
</body>
</html>