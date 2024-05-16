<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archive Menu</title>
    <link rel="stylesheet" href="HomePage.css">
     
    <!-- link ng fontawsme -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" /> 

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
                    <img src="menu_assets/users-icon.png" alt="profile-img">
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
                            <img src="menu_assets/users-icon.png" alt="profile-img">
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

    <main class="table" id="customers_table">
      <section class="table__header">
          <h1>Archive Capstone Projects</h1>
          <div class="input-group">
              <input type="search" placeholder="Search Data...">
              <img src="images/search.png" alt="">
          </div>
          <div class="export__file">
              <label for="export-file" class="export__file-btn" title="Export File"></label>
              <input type="checkbox" id="export-file">
              <div class="export__file-options">
                  <label>Export As &nbsp; &#10140;</label>
                  <label for="export-file" id="toPDF">PDF <img src="images/pdf.png" alt=""></label>
              </div>
          </div>
      </section>
      <section class="table__body">
          <table>
              <thead>
                  <tr>
                      <th> Id <span class="icon-arrow">&UpArrow;</span></th>
                      <th> Group <span class="icon-arrow">&UpArrow;</span></th>
                      <th> Date <span class="icon-arrow">&UpArrow;</span></th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td> 1 </td>
                      <td> Dream Team</td>
                      <td> 17 December, 2023 </td>
                  </tr>
                <tr>
                      <td> 2 </td>
                      <td> Table Acad</td>
                      <td> 13 March, 2024 </td>
                  </tr>
                  <tr>
                    <td> 3 </td>
                    <td> TaNum</td>
                    <td> 19 March, 2024 </td>
                </tr>
                <tr>
                    <td> 4 </td>
                    <td> TeamPack</td>
                    <td> 13 March, 2024 </td>
                </tr>
                <tr>
                    <td> 5 </td>
                    <td> XAcademy</td>
                    <td> 23 March, 2024 </td>
                </tr>
                <tr>
                    <td> 6 </td>
                    <td> Aira Team</td>
                    <td> 13 March, 2024 </td>
                </tr>
                <tr>
                    <td> 7 </td>
                    <td> SillyBuddies</td>
                    <td> 23 March, 2024 </td>
                </tr>
                <tr>
                    <td> 8 </td>
                    <td> Hogart ni albert</td>
                    <td> 30 March, 2024 </td>
                </tr>
                 </tbody>
          </table>
      </section>
  </main>
  <script src="archive.js"></script>
<script src="homepage.js"></script>   

<script>
        function studentClass(){
            window.location.assign("StudentCourse.php");
        }
    </script>

</body>
</html>