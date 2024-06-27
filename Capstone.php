<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capstone Defense</title>
    <link rel="stylesheet" href="Capstone.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <?php include 'login.php'; ?>
        <?php include 'CourseCreated.php'; ?>
        <?php include 'editProfile.php'; ?>
        
        <div class="header">
            <div class="wrap">
                <button type="button" class="logobtn"  onclick="Studentarchive()"></button>
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
                        <img src="menu_assets/users-icon.png" alt="profile-img">
                    </div>
                    <div class="menu" id ="menuBtn">
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
                            <button class = "close" onclick= "closeEditform()">  <i class="fa-regular fa-circle-xmark"></i> </button>
                        </div>
                        
                        <form id="editProfileForm" action="editProfile.php" method="POST">
                            <div class="profile">
                                <img src="menu_assets/prof.png" alt="profile-img">
                            </div>
                            <h5edit><?php echo $_SESSION['fName'] . ' ' . $_SESSION['lname']; ?><br/>
                            <span><?php echo $_SESSION['user_email']; ?></span>
                            </h5edit>
                            <h3> <input type="text" id="profileemailID" class="inputEmail" name="userEmail" placeholder="Input your Email"> </h3>
                            <h3> <input type="text" id="profileFnameID" class="inputname" name="newFname" placeholder="Input new First Name"> </h3>
                            <h3> <input type="text" id="profileLnameID" class="inputname" name="newLname" placeholder="Input new Last Name"> </h3>
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
    </div> 
</head>
<body>

    <div class="Lsection">
        <button type="button" class="notif" onclick="notifProf()">Notification</button>
        <button type="button" class="class" onclick="openClassPage()">Class</button>
        <button type="button" class="schedule" onclick="scheduleProf()">Schedule</button>
        <button type="button" class="capstone" onclick="capstoneProf()">Capstone Defense</button>
    </div>
    <div class="MainScheduleCont">
            <div class= "Schedule" id="scheduleContainer">
            
                    <div class ="DefenseScheduleCont">
                        <div class ="SchedTitle">
                            <h5>Capstone Management System</h5>
                        </div>
                    <div class="SchedDetails">
                        Time: 04:21<br>
                        Date: 2024-06-15<br>
                        Group-Name: Dream Team<br>
                    </div>
                    <div class="DocumentStatus">
                        Status: Pending
                     </div>
                </div>
                
            
            <div class="divButton">
                <!-- <button class="CreateSched" id = "addScheduleBtn">
                   Add Schedule <i class="fa-solid fa-plus"></i>
                </button> -->
            </div>
        </div>

    </div>
    <div class = "defense-main" style = "display: none">
        <div class="Defense-Page" >      
            <div class="rubric-container">
                <div class="rubric-header">
                    <h1>Written Communication</h1>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th class="description-column">Description</th>
                            <th class="grade-Desc">score description</th>
                            <th class="grades-column">Grades</th>          
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="criteria">
                            <td class="description">
                                <strong>B1. Executive Summary</strong><br>
                                The project summary includes: a clear, coherent, easily readable & accurate paragraph; consists of complete sentences free from grammatical and factual errors and biases; and includes the right amount of detail.
                            </td>
                            <td class="grade_description">
                                askdjbajdb<br>
                            </td>
                            <td class="score-column">
                                <select>
                                    <option value="7">7</option>
                                    <option value="6">6</option>
                                    <option value="5">5</option>
                                    <option value="4">4</option>
                                    <option value="3">3</option>
                                    <option value="2">2</option>
                                    <option value="1">1</option>
                                    <option value="0">0</option>
                                </select>
                            </td>
                        
                        </tr>
                        <tr class="criteria">
                            <td class="description">
                                <strong>B1. Executive Summary</strong><br>
                                The project summary includes: a clear, coherent, easily readable & accurate paragraph; consists of complete sentences free from grammatical and factual errors and biases; and includes the right amount of detail.
                            </td>
                            <td class="grade_description">
                                askdjbajdb<br>
                            </td>
                            <td class="score-column">
                                <select>
                                    <option value="7">7</option>
                                    <option value="6">6</option>
                                    <option value="5">5</option>
                                    <option value="4">4</option>
                                    <option value="3">3</option>
                                    <option value="2">2</option>
                                    <option value="1">1</option>
                                    <option value="0">0</option>
                                </select>
                            </td>
                        
                        </tr><tr class="criteria">
                            <td class="description">
                                <strong>B1. Executive Summary</strong><br>
                                The project summary includes: a clear, coherent, easily readable & accurate paragraph; consists of complete sentences free from grammatical and factual errors and biases; and includes the right amount of detail.
                            </td>
                            <td class="grade_description">
                                askdjbajdb<br>
                            </td>
                            <td class="score-column">
                                <select>
                                    <option value="7">7</option>
                                    <option value="6">6</option>
                                    <option value="5">5</option>
                                    <option value="4">4</option>
                                    <option value="3">3</option>
                                    <option value="2">2</option>
                                    <option value="1">1</option>
                                    <option value="0">0</option>
                                </select>
                            </td>
                        
                        </tr><tr class="criteria">
                            <td class="description">
                                <strong>B1. Executive Summary</strong><br>
                                The project summary includes: a clear, coherent, easily readable & accurate paragraph; consists of complete sentences free from grammatical and factual errors and biases; and includes the right amount of detail.
                            </td>
                            <td class="grade_description">
                                askdjbajdb<br>
                            </td>
                            <td class="score-column">
                                <select>
                                    <option value="7">7</option>
                                    <option value="6">6</option>
                                    <option value="5">5</option>
                                    <option value="4">4</option>
                                    <option value="3">3</option>
                                    <option value="2">2</option>
                                    <option value="1">1</option>
                                    <option value="0">0</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>   
            </div>
        </div>
        <div class="cDiv">
            <div class="CommentsDiv">
                <div class="comments-section" id="commentsSection">
                    <div class="panel-comments">
                        <h3>Panel 1 Comments:</h3>
                        <textarea class="comments-input"></textarea>
                        <button class="send-button"><i class="fa-solid fa-trash-can"></i></button>
                    </div>
                </div>
            </div>
            <div class="addCommBtn">
                <button class="addComment" onclick="addComment()"><i class="fa-solid fa-plus"></i> Add Comments</button>
                <button class="sendComment"><i class="fa-solid fa-paper-plane"></i> Send</button>
            </div>
        </div>
    </div>    
</div> 
<script src="Capstone.js"></script>
</body>
</html>
