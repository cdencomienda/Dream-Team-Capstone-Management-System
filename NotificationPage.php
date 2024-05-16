<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification Menu</title>
    <link rel="stylesheet" href="NotificationPage.css">
    <?php include 'login.php'; ?>
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
    <div id="sectionBtn"></div>
      <button type="button" class="notif"  onclick="studentnotifAuth()">Notification</button>
      <button type="button" class="class"  onclick="studentClass()">Class</button>
      <button type="button" class="schedule"  onclick="StudentSchedule()">Schedule</button>
      <button type="button" class="capstone"  onclick="StudentCapstone()">Capstone Defense</button>
    </div>
  <div class="hero">
    <div class="single-box">
      <div class="box-text">
        <p class="notifi">
          <a href="#" class="name"></a>Ian has joined your group DreamTeam
          <a href="#" class="group"></a>
          <span class="dot"></span>
        </p>
      </div>
    </div>

    <div class="single-box">
      <div class="box-text">
        <p class="notifi">
          <a href="#" class="name"></a>Barit has joined your group DreamTeam
          <a href="#" class="group"></a>
          <span class="dot"></span>
        </p>
      </div>
    </div>
    
    <div class="single-box unseen">
      <div class="box-text">
        <p class="notifi">
          <a href="#" class="name"></a>Carlos has joined your group DreamTeam
          <a href="#" class="group"></a>
          <span class="dot"></span>
        </p>
      </div>
    </div>          
  </div>
<script src="homepage.js"></script>   
</body>