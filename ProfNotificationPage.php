<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>title>Notification Menu</title>
    <link rel="stylesheet" href="CourseCreate.css">
    <?php include 'login.php'; ?>
    <?php include 'editProfile.php'; ?> 
     
    <!-- link ng fontawsme -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" /> 

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
             }

     </script>
         <script>
         function clearErrorMessage() {
             var errorMessage = document.getElementById("error-message");
             errorMessage.classList.remove("show");
         }
         </script>
      <!-- emerson gudito end -->
             </div>
         </div>
     </div>
 </div>
</head>

<body>
  <div class="Lsection">
    <div id="sectionBtn"></div>
      <button type="button" class="notif"  onclick="notifProf()">Notification</button>
      <button type="button" class="class"  onclick="openClassPage()">Class</button>
      <button type="button" class="schedule"  onclick="scheduleProf()">Schedule</button>
      <button type="button" class="capstone"  onclick="capstoneProf()">Capstone Defense</button>
      <button type="button" class="advisory"  onclick="advisoryProf()">Advisory</button>
    </div>
  <div class="hero">
    <div class="single-box">
      <div class="box-text">
        <p class="notifi">
          <a href="#" class="name"></a>Ian has beed added to group DreamTeam
          <a href="#" class="group"></a>
          <span class="dot"></span>
        </p>
      </div>
    </div>

    <div class="single-box">
      <div class="box-text">
        <p class="notifi">
          <a href="#" class="name"></a>Barit has beed added to group DreamTeam
          <a href="#" class="group"></a>
          <span class="dot"></span>
        </p>
      </div>
    </div>
    
    <div class="single-box unseen">
      <div class="box-text">
        <p class="notifi">
          <a href="#" class="name"></a>Carlos has submitted a file [file]
          <a href="#" class="group"></a>
          <span class="dot"></span>
        </p>
      </div>
    </div>          
  </div>
<script src="professorhome.js"></script>   
</body>