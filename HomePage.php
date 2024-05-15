<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archive Menu</title>
    <link rel="stylesheet" href="HomePage.css">
    <?php include 'login.php'; ?>
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