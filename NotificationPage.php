<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notification Menu</title>
    <link rel="stylesheet" href="NotificationPage.css">
    <?php include 'login.php'; ?>
    <div class="header">
      <div class="wrap">
          <button type="button" class="logobtn"  onclick="archive()"></button> 
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
                <div class="menu">
                    <h3><?php echo $_SESSION['username']; ?><br/>
                        <span><?php echo $_SESSION['user_email']; ?></span>
                    </h3>
                    <button type="button" class="editprofileBtn">Edit Profile</button>
                    <button type="button" class="logoutBtn" onclick="logOUT()">Logout</button>
                </div>
            </div>
        </div>
  </div>
</div>
</head>
<body>
  <div class="Lsection">
    <div id="sectionBtn"></div>
      <button type="button" class="notif"  onclick="notifAuth()">Notification</button>
      <button type="button" class="class"  onclick="studentClass()">Class</button>
      <button type="button" class="schedule"  onclick="Schedule()">Schedule</button>
      <button type="button" class="capstone"  onclick="Capstone()">Capstone Defense</button>
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