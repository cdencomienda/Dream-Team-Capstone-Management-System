<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professor Main Menu</title>
    <link rel="stylesheet" href="professorStyle.css">
    
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" /> 

    <style>
         
         
         body{
          background: #CBC4BA;
          overflow-x: hidden;
         overflow: hidden;
         }
         #error-message {
             position: absolute;
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
        background-color: transparent; 
         
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
         transition opacity 0.3s ease; /* Add transition for background color */
     }
       /* Change background color on hover */
       .close i:hover {
         opacity: 50%; /* Example background color on hover */
         border-radius:25px;
 
     }
 
     </style>
    <?php include 'login.php'; ?>


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
                    <tr data-file="archived_files/dreamteamfinaltest.pdf">
                        <td>1</td>
                        <td>Dream Team</td>
                        <td>17 December, 2023</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>

    <!-- Modal -->
    <div id="pdfModal" class="modal">
        <div class="modal-content">
            <span class="closeM">&times;</span>
            <iframe id="pdf-frame" width="100%" height="600px"></iframe>
        </div>
    </div>

    <script src="archive.js"></script>
    <script src="professorhome.js"></script>

    
</body>
</html> 