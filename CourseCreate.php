<!DOCTYPE html>
<html lang="en">
<head> 


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <title>Class Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=REM&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

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
        transition opacity 0.3s ease; /* Add transition for background color */
    }
      /* Change background color on hover */
      .close i:hover {
        opacity: 50%; /* Example background color on hover */
        border-radius:25px;

    }

    </style>
    <link rel="stylesheet" href="CourseCreate.css">
    <?php include 'login.php'; ?>
    <?php include 'CourseCreated.php'; ?>
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
                    <img src="menu_assets/prof.png" alt="profile-img">
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
</head>
<body>
    <div class="Lsection">
        <div id="sectionBtn"></div>
        <button type="button" class="notif"  onclick="notifProf()">Notification</button>
        <button type="button" class="class"  onclick="openClassPage()">Class</button>
        <button type="button" class="schedule"  onclick="scheduleProf()">Schedule</button>
        <button type="button" class="capstone"  onclick="capstoneProf()">Capstone Defense</button>
    </div>
 
    <div class="wrapper"><!-- start of wrapper scroll -->
        <div class="class-Dropdown">
            <div class="classListDropdown">                              
                <button class="listClass">  
                    <h4>COURSES AY 2023-2024</h4>
                    <span class="selectedClass"></span> 
                    <div class="coursesListed"></div>                        
                </button>
                <ul class="menuCourses"> 
                    <li class="term" data-term="term1">Term 1</li>
                    <li class="term" data-term="term2">Term 2</li>
                    <li class="term" data-term="term3">Term 3</li>
                </ul>
            </div>    
        <div class="coursesDetails" id="term1">
            <h3 class="termh3">Courses for Term 1</h3>
            <div class="coursesDropdown">
                <div class="dropdownmelon">            
                    <h3 class="courseNameDisplay"> DATAMNGT <button type="button" class="classSet" onclick="dropdownMelon(this)">•••</button></h3>
                    <div class="dropdown-content">
                        <button type="button" class="dropdownbtn" onclick="viewMembers()">View Members</button> 
                        <button type="button" class="dropdownbtn" onclick="setrequirements()">Requirements</button>
                        <button type="button" class="dropdownbtn" onclick="rubric()">Rubric</button>
                    </div>
                </div>
                <button type="button" class="createdgroupBTN" onclick="newGroupCreated()">Group name</button>
            </div>  

            

            <div class="coursesDetails" id="term1">
                <h3 class="termh3">Courses for Term 1</h3>
                <div class="coursesDropdown">
                    <div class="dropdownmelon">            
                        <h3 class="courseNameDisplay"> DATAMNGT <button type="button" class="classSet" onclick="dropdownMelon(this)">•••</button></h3>
                        <div class="dropdown-content">
                            <button type="button" class="dropdownbtn" onclick="viewMembers()">View Members</button> 
                            <button type="button" class="dropdownbtn" onclick="setrequirements()">Requirements</button>
                            <button type="button" class="dropdownbtn" onclick="rubric()">Rubric</button>
                        </div>
                    </div>
                    <button type="button" class="createdgroupBTN" onclick="newGroupCreated()">Group name</button>
                </div>  
            </div>

            <div class="coursesDetails" id="term2">
                <h3 class="termh3">Courses for Term 2</h3>
                <div class="coursesDropdown">
                    <div class="dropdownmelon">            
                        <h3 class="courseNameDisplay"> MIXSIGS <button type="button" class="classSet" onclick="dropdownMelon(this)">•••</button></h3>
                        <div class="dropdown-content">
                            <button type="button" class="dropdownbtn" onclick="viewMembers()">View Members</button>
                            <button type="button" class="dropdownbtn" onclick="setrequirements()">Requirements</button>
                            <button type="button" class="dropdownbtn" onclick="rubric()">Rubric</button>
                        </div>
                    </div>
                    <button type="button" class="createdgroupBTN" onclick="newGroupCreated()">Group name</button>
                </div>
            </div>

            <div class="coursesDetails" id="term3">
                <h3 class="termh3">Courses for Term 3</h3>
                <div class="coursesDropdown">
                    <div class="dropdownmelon">            
                        <h3 class="courseNameDisplay"> ROBPROA <button type="button" class="classSet" onclick="dropdownMelon(this)">•••</button></h3>
                        <div class="dropdown-content">          
                            <button type="button" class="dropdownbtn" onclick="viewMembers()">View Members</button>
                            <button type="button" class="dropdownbtn" onclick="setrequirements()">Requirements</button>
                            <button type="button" class="dropdownbtn" onclick="rubric()">Rubric</button>
                        </div>
                    </div>
                    <button type="button" class="createdgroupBTN" onclick="newGroupCreated()">Group name</button>
                </div>
            </div>
            
        </div>

        <div class="coursesDetails" id="term2">
            <h3 class="termh3">Courses for Term 2</h3>
            <div class="coursesDropdown">
                <div class="dropdownmelon">            
                    <h3 class="courseNameDisplay"> MIXSIGS <button type="button" class="classSet" onclick="dropdownMelon(this)">•••</button></h3>
                    <div class="dropdown-content">
                        <button type="button" class="dropdownbtn" onclick="viewMembers()">View Members</button>
                        <button type="button" class="dropdownbtn" onclick="setrequirements()">Requirements</button>
                        <button type="button" class="dropdownbtn" onclick="rubric()">Rubric</button>
                    </div>
                </div>
                <button type="button" class="createdgroupBTN" onclick="newGroupCreated()">Group name</button>
            </div>
        </div>

        <div class="coursesDetails" id="term3">
            <h3 class="termh3">Courses for Term 3</h3>
            <div class="coursesDropdown">
                <div class="dropdownmelon">            
                    <h3 class="courseNameDisplay"> ROBPROA <button type="button" class="classSet" onclick="dropdownMelon(this)">•••</button></h3>
                    <div class="dropdown-content">          
                        <button type="button" class="dropdownbtn" onclick="viewMembers()">View Members</button>
                        <button type="button" class="dropdownbtn" onclick="setrequirements()">Requirements</button>
                        <button type="button" class="dropdownbtn" onclick="rubric()">Rubric</button>
                    </div>
                </div>
                <button type="button" class="createdgroupBTN" onclick="newGroupCreated()">Group name</button>
            </div>
        </div> 
    </div>

        <div class="adminClass">
        <!-- viewgroup div -->
            <div class="viewgroup" id="viewGRP">
                <div>
                    <button class = "closeViewGroup" onclick= "clsViewGrp()">  <i class="fa-regular fa-circle-xmark"></i> </button>
                </div>
                <h3>Members:</h3>
                <div class="membersContainer">
                    <h4>StudentName</h4>
                    <h4>StudentName</h4>
                    <h4>StudentName</h4>
                    <h4>StudentName</h4>
                    <h4>InstructorName</h4>
                </div>
            </div>

        <!-- Requirement div -->
        <div class="setrequirements">
            <h3>Requirements</h3>
            <form class="Requirements" method="POST" action="addRequirements.php">
                <input type="text" class="inputRequirements" name="requirements" placeholder="Input requirements">
                <h3>Requirements Description</h3>
                <input type="text" class="inputRequirementsDescription" name="requirementsDescription" placeholder="Input Description">
                <div class="createdReq" id="selectedRequire">

                </div>
                <button type="submit" class="addreqbtn" onclick="addreqBTN()">Add +</button>
            </form>
        </div> 

        <!-- Rubric div -->
        <div class="rubriccontainer" style="display: none"> 
        <h3>Rubric</h3>
                <form class="addRubric" method="POST" action="addRubric.php">
                    <div>  
                    </div>
                    <section class="table_selectrubric">
    <table>
        <thead>
            <tr>
                <th class="Rubricid-column">Rubric id</th>
                <th class="Rubricid-column">Rubric Description</th>
            </tr>
        </thead>
        <tbody class="rubricList" id="selectedRubric">
            <tr>
                <td>1</td>
                <td><a href="#" class="rubric-description" onclick="showModal()">DATA MANAGEMENT</a></td>
            </tr>
            <tr>
                <td>2</td>
                <td><a href="#" class="rubric-description" onclick="showModal()">CPE METHODS OF RESEARCH</a></td>
            </tr>
            <tr>
                <td>3</td>
                <td><a href="#" class="rubric-description" onclick="showModal()">CPE DESIGN</a></td>
            </tr>
        </tbody>
    </table>
</section>

<!-- Modal -->
<!-- Modal -->
<div id="rubricModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="rubric-container">
                <h1>Written Communication</h1>
            </div>
            <table>        
                <div class="rubric-header">
    
                <thead >
            
                    <!-- column title -->
                    <tr>
                        <th style = "background-color: #CBC4BA;">Overall<br> Percentage</th>
                        <th style = "background-color: #CBC4BA;">Learning Outcomes</th>
                        <th style = "background-color: #CBC4BA;">Criteria</th>
                        <th style = "background-color: #CBC4BA;">Excellent (100%)</th>
                        <th style = "background-color: #CBC4BA;">Good (80%)</th>
                        <th style = "background-color: #CBC4BA;">Satisfactory (75%)</th>
                        <th style = "background-color: #CBC4BA;">Slight Satisfactory (50%)</th>
                        <th style = "background-color: #CBC4BA;">Disatisfactory (25%)</th>
                    </tr>
                     <!-- column title end -->
                </thead>
                <tbody>
                    <tr>
                        <td>40%</td>
                        <td>Relevance</td>
                        <td>The content is comprehensive, well-researched, and highly informative. It demonstrates a deep understanding of the subject matter.</td>
                        <td>The content is mostly accurate and relevant but may lack some depth or clarity in certain areas. It generally conveys the required information.</td>
                        <td>The content is partially accurate and relevant but greatly lacks some depth or clarity in certain areas.</td>
                    </tr>
                    <tr>
                        <td>60%</td>
                        <td>Neatness</td>
                        <td>The content is comprehensive, well-researched, and highly informative. It demonstrates a deep understanding of the subject matter.</td>
                        <td>The content is mostly accurate and relevant but may lack some depth or clarity in certain areas. It generally conveys the required information.</td>
                        <td>The content is partially accurate and relevant but greatly lacks some depth or clarity in certain areas.</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
                </form>  
        </div>

        <!-- group class div -->
         <div class="GroupContainer">
                    <div class="dashboard_header">
                        <!-- Group Name Box -->
                        <div class="groupname_container"> 
                            <!-- ian mojica  group name -->
                            <div class="group_name" id="group_name"> 
                                sample     
                            </div>   
                        </div>
                        <script> 
                                    
                        </script> 
                    <div class="button-group"> 
                    <button type="button" class=" Submission-Btn" onclick="submissionBtnAuth()"> <i class="fa-solid fa-clipboard"></i> Submissions </button>

                            <div class = "flsDropdown" data-flsDropdown>
                            <button type="button" class=" Rep-FilesBtn" data-flsDropdown-button> <i class="fa-solid fa-file"></i> Files </button>
                            <div class = "filesContainer"> 
                                <div class = "documentationCont">
                                    Document Requirement: <br>
                                    <div class = "ReqDocumentation">
                                        <div class ="attachedDocumentation"> here attached file </div>
                                        <div class = "divDocuReqLogs"> <br> <button class = "DocuReqLogs"> <i class="fa-solid fa-ellipsis"></i> </button>
                                            <div class = "DrequirementLogsCont" id ="DocuReqrmntLogs">
                                                
                                            </div>
                                        </div>
                                    </div>     
                                </div>   
                                <div class = "AdvCont">          
                                    Advisor Recomendation Sheet: 
                                    <div class = "advRecomendation">
                                         <div class = "attachedAdvRecom"> attached file here </div>    
                                        <div class = "divAdvLogs"> <br> <button class = "AdvLogs"> <i class="fa-solid fa-ellipsis"></i> </button>
                                             <div class = "AdvRequirementLogsCont" id ="AdvReqrmntLogs">

                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </div>  
                            <script>
                                    
                            </script>

                        </div>    
                        <div class="mDropdown" data-flsDropdown>  
                        <button type="button" class="Members-Btn" data-flsDropdown-button onclick="fetchGroupMembers()"  > <i class="fa-solid fa-user-group"></i> Members </button>
                                <!-- Container to display group members -->
                                <div class="GroupmembersContainer" id="groupMembersContainer">
                                    member1
                                </div>
                            </div>
                        </div>
                    </h4>
                    </div> 

                    <!-- files -->
                <div class="defaultBody" id="defaultBody">
                    <div class="recentFiles">
                        <!-- File posted by another person -->
                        <div class="fileMessage left" onclick="openModal('featuredfiles/DREAM TEAM - Recommendation.pdf')">
                            <div class="fileInfo">
                                <img src="menu_assets/file-icon.png" alt="file icon" class="fileIcon">
                                <div class="fileDetails">
                                    <strong>DREAM TEAM - Recommendation</strong>
                                    <span>26 KB</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- File posted by you -->
                        <div class="fileMessage right" onclick="openModal('featuredfiles/Final Documentation.pdf')">
                            <div class="fileInfo">
                                <img src="menu_assets/file-icon.png" alt="file icon" class="fileIcon">
                                <div class="fileDetails">
                                    <strong>Final Documentation</strong>
                                    <span>12 KB</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Structure -->
                <div id="fileModal" class="modal">
                    <div class="modalContent">
                        <span class="closeButton" onclick="closeModal()">&times;</span>
                        <iframe id="fileFrame" src="" frameborder="0"></iframe>
                    </div>
                </div>  
                        <!-- submissions -->
                        <div class="submissionFrame" id="submissionFrame">
                    <div class="submissionscontainer">
                    <div class= "requirement-list">
                        <div class = "req-nameCont"> 
                            <div class="requirement-name">
                            
                            </div>
                        </div>
                        
                    </div>
            <style> 
            .submissionFrame {
                    display: none;
                }
            </style>
                <div class= "requirement-details">
                    <div class="requirement-title" id="req_title"> <h3> Documentation requirement </h3> </div> <br>
                    <div class="requirement-due" id="req_due"> <h4> Due : ??/??/???? </h4> </div><br>
                    
                    <div class="requirement-descriptionCont"> Requirement Description: 
                        <div class="requirement-descBox" id="req_description"> 
                            ?????
                        </div>        
                    </div>
                    <div class="reqfile-version" id="reqfile_version"> <h4>Version: ?????</h4> 
                    </div> <br>   
                    <!-- idk kung san lalagay ung file attached id -->
                    <div class="Attach-Files"> 
                            <form id="file-upload" class="requirement-file">
                                <div class="atchFiles">   
                                    <h3>Attach Files   </h3> 
                                    <!-- Replace img tag with the i tag -->
                                    <!-- <i class="fa-solid fa-plus" id="attach-btn"></i> -->
                                    <img src="course_assets/plus.png" alt="attached file" id="attach-btn"> 
                                    <div id="upload-btn" class="upload-container"></div>
                                    <label for="input-file"></label>
                                    <input type="file" accept="pdf" id="input-file" name="profile_picture">
                                </div>
                            </form> 
                        </div>   
                        <div class="Attached-FileCont">
                            <!-- attached files go here -->
                        </div>        

                    <div class="req-submitbtnCont"> 
                        
                        <button class="reqbtn" type="button">
                            submit
                        </button>
                    </div>
                    <script>
                        
                        document.getElementById('input-file').addEventListener('change', function() {
                        var files = this.files; // Get the selected files

                        var fileList = document.createElement('ul'); // Create a list to hold file details
                        for (var i = 0; i < files.length; i++) {
                        // Check if the file is a PDF
                        if (files[i].type === 'application/pdf') {
                            var listItem = document.createElement('li'); // Create list item for each file
                            listItem.style.backgroundColor = '#F8EFE3'; // Set background color
                            listItem.style.borderRadius = '15px';
                            listItem.style.width = '245px';
                            listItem.style.height = '45px';
                                   
                            if (i > 0) {
                                listItem.style.marginTop = '2px'; // Add margin to the top except for the first item
                            } else {
                                listItem.style.marginTop = "5px";
                            }

                            // Create icon element
                            var fileIcon = document.createElement('i');
                            fileIcon.className = 'fa-regular fa-file-pdf'; // Set the class for the icon
                            
                            // Create anchor element
                            var fileLink = document.createElement('a');
                            fileLink.textContent = files[i].name; // Set text content to file name
                            fileLink.href = URL.createObjectURL(files[i]); // Set href to the URL of the file
                            fileLink.download = files[i].name; // Set the download attribute to force download

                            // Append icon and anchor elements to list item
                            listItem.appendChild(fileIcon);
                            listItem.appendChild(fileLink);

                            // Append list item to list
                            fileList.appendChild(listItem);
                        } else {
                            alert("Only PDF files are allowed.");
                        }

                        }
                        var attachedFileCont = document.querySelector('.Attached-FileCont ul');
                        if (!attachedFileCont) {
                        attachedFileCont = document.createElement('ul');
                        attachedFileCont.style.padding = '1px'; // Add padding to the list
                        attachedFileCont.style.listStyleType = 'none'; // Remove default list style
                        document.querySelector('.Attached-FileCont').appendChild(attachedFileCont);
                        }
                        attachedFileCont.appendChild(fileList); // Append file list to Attached-FileCont
                        });    
                        
                            // Get the element with the class "group_name"
                            const groupDiv = document.getElementById('group_name');

                            // Function to decrease opacity by 70%
                            function decreaseOpacity() {
                                groupDiv.style.opacity = '0.80'; // 30% opacity
                            }

                            // Function to reset opacity to default
                            function resetOpacity() {
                                groupDiv.style.opacity = '1'; // 100% opacity
                            }

                            // Add event listeners for mouseover and mouseout
                            groupDiv.addEventListener('mouseover', decreaseOpacity);
                            groupDiv.addEventListener('mouseout', resetOpacity);

                            // Function to handle click event
                            groupDiv.addEventListener('click', function() {
                                // Call the showDefaultBody function
                                showDefaultBody();
                            });
                    </script>
                </div> 
                        </script>

                    <!-- file repo -->
                    <div class="professorFilesR" id="profFilesR">
                        <div class = "sFileContainer">
                        files repository
                        </div>
                    </div>
                </div> 
                <!-- file requirement -->
            
        </div>  

    </div><!-- end of wrapper scroll --> 
     
    <script src="professorhome.js"></script>   
     
</body>
</html> 


<script>

document.addEventListener("DOMContentLoaded", function() {
    fetch('fetchProfessorSession.php')
        .then(response => response.json())
        .then(data => {
            if (data.match) {
                console.log("Session user matches the database.");
                console.log("Account ID:", data.account_id);
            } else {
                console.log("Session user does not match the database.");
                // Handle the case where there is no match
            }
        })
        .catch(error => console.error('Error:', error));
});


function fetchAcademicYears() {
    fetch('fetchAcademicYears.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.error) {
                console.error(data.error);
            } else {
                console.log('Fetched academic years:', data);
                const container = document.querySelector('.class-Dropdown');

                data.reverse().forEach(yearStr => {
                    const year = parseInt(yearStr, 10);
                    const displayName = `${year}-${year + 1}`;

                    const classListDropdown = document.createElement('div');
                    classListDropdown.className = 'classListDropdown';

                    const button = document.createElement('button');
                    button.className = 'listClass';
                    button.innerHTML = `<h4>COURSES AY ${displayName}</h4>
                                        <span class="selectedClass"></span>
                                        <div class="coursesListed"></div>`;

                    const ul = document.createElement('ul');
                    ul.className = 'menuCourses';
                    ul.style.display = 'none';

                    ['Term 1', 'Term 2', 'Term 3'].forEach((term, index) => {
                        const li = document.createElement('li');
                        li.className = 'term';
                        li.dataset.term = (index + 1).toString();
                        li.textContent = term;

                        ul.appendChild(li);
                    });

                    button.addEventListener('click', () => {
                        ul.style.display = ul.style.display === 'none' ? 'block' : 'none';
                        console.log(`Button for AY ${displayName} clicked`);
                        acy_Stored(year);
                        acy_idStored(year);
                    });

                    ul.addEventListener('click', (event) => {
                        const selectedTerm = event.target.dataset.term;

                        if (selectedTerm) {
                            console.log(`Selected term: ${selectedTerm}`);
                            storeSelectedTerm(selectedTerm);
                            fetchCourses(button.parentNode); // Pass the container to fetchCourses
                            groups();

                            let coursesDropdown = button.parentNode.querySelector('.coursesDropdown');
                            if (coursesDropdown) {
                                coursesDropdown.style.display = coursesDropdown.style.display === 'none' ? 'block' : 'none';
                            } else {
                                coursesDropdown = document.createElement('div');
                                coursesDropdown.className = 'coursesDropdown';
                                button.parentNode.appendChild(coursesDropdown);
                            }
                        }
                    });

                    classListDropdown.appendChild(button);
                    classListDropdown.appendChild(ul);
                    container.appendChild(classListDropdown);
                });
            }
        })
        .catch(error => console.error('Error fetching academic years:', error));
}

// // Call fetchAcademicYears when your page is ready
// document.addEventListener('DOMContentLoaded', fetchAcademicYears);






function acy_Stored(year){
    console.log('current:' + year);

    acYear = year; 

    console.log('stored acYear: ' + acYear);

    fetch('storeYear.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'acYear=' + encodeURIComponent(acYear),
    })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text(); // Get the raw response text
        })
        .then(responseText => {
            console.log('Raw Response:', responseText); // Log the raw response
            return JSON.parse(responseText); // Parse the response as JSON if needed
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
}

function acy_idStored(acy_id) {
    fetch('storeacy_id.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'acYear=' + encodeURIComponent(acy_id),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json(); // Parse the response as JSON
    })
    .then(data => {
        console.log('Received acy_id:', data.acy_id); // Log the received acy_id
        // Use the received acy_id as needed
        return data.acy_id; // Return acy_id for further use if needed
    })
    .catch(error => {
        console.error('There was a problem with the fetch operation:', error);
    });
}

function storeSelectedTerm(selectedTerm) {
    const termValue = parseInt(selectedTerm); // Parse the selectedTerm as an integer

    fetch('storeSelectedTerm.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            selectedTerm: termValue // Send the integer value
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log('Response from storeSelectedTerm:', data);
        if (data.status === 'success') {
            // Handle success message if needed
            console.log('Selected term stored successfully:', termValue);
        } else {
            // Handle error message if needed
            console.error('Error storing selected term:', data.message);
        }
    })
    .catch(error => {
        console.error('Error storing selected term:', error);
    });
}

function dropdownMelon(button) {
    const targetId = button.dataset.target;
    const dropdownContent = document.getElementById(targetId);
    if (dropdownContent) {
        dropdownContent.style.display = dropdownContent.style.display === 'none' ? 'block' : 'none';
    }
}


function fetchCourses(container) {
    // Check if coursesDropdown already exists in the container
    let coursesDropdown = container.querySelector('.coursesDropdown');

    // If coursesDropdown doesn't exist, create it
    if (!coursesDropdown) {
        coursesDropdown = document.createElement('div');
        coursesDropdown.className = 'coursesDropdown';
        container.appendChild(coursesDropdown);
    } else {
        // Clear previous content in coursesDropdown
        coursesDropdown.innerHTML = '';
    }

    fetch('fetchCourses.php')
        .then(response => response.json())
        .then(coursesData => {
            if (coursesData.error) {
                console.error('Error:', coursesData.error);
            } else {
                console.log('Courses:', coursesData);

                fetch('FetchGroups.php')
                    .then(response => response.json())
                    .then(groupsData => {
                        if (groupsData.error) {
                            console.error('Error:', groupsData.error);
                        } else {
                            console.log('Groups:', groupsData);

                            coursesData.forEach(course => {
                                const courseElement = document.createElement('div');
                                courseElement.className = 'course';

                                const courseTitle = document.createElement('h3');
                                courseTitle.className = 'courseNameDisplay';

                                const button = document.createElement('button');
                                button.type = 'button';
                                button.classList.add('classSet');
                                button.textContent = '•••';
                                button.dataset.target = 'dropdown-' + course.course_id;

                                const dropdownContent = document.createElement('div');
                                dropdownContent.classList.add('dropdown-content');
                                dropdownContent.id = 'dropdown-' + course.course_id;
                                dropdownContent.style.display = 'none';

                                // Refactor to use handleAction function
                                const actions = ['View Members', 'Requirements', 'Rubric'];
                                actions.forEach(action => {
                                    const actionButton = document.createElement('button');
                                    actionButton.type = 'button';
                                    actionButton.className = 'dropdownbtn';
                                    actionButton.textContent = action;
                                    actionButton.onclick = () => handleAction(action, course.course_id);
                                    dropdownContent.appendChild(actionButton);
                                });

                                courseTitle.textContent = `${course.course_code} - ${course.section} `;
                                courseTitle.appendChild(button); // Add the button inside h3

                                courseElement.appendChild(courseTitle);
                                courseElement.appendChild(dropdownContent);
                                coursesDropdown.appendChild(courseElement);

                                button.addEventListener('click', function() {
                                    dropdownMelon(this);
                                    // Log the course_id to the console when the button is clicked
                                    console.log('Clicked Course ID:', course.course_id);
                                    saveCourseID(course.course_id);
                                    fetchGroupID();
                                });

                                // Log the course_id to the console
                                console.log('Course ID:', course.course_id);

                                // Create and append buttons based on group data for each course
                                if (groupsData[course.course_id]) {
                                    groupsData[course.course_id].forEach(group_name => {
                                        const groupButton = document.createElement('button');
                                        groupButton.type = 'button';
                                        groupButton.classList.add('createdgroupBTN');
                                        groupButton.textContent = group_name;
                                        courseElement.appendChild(groupButton);
                                    });
                                }
                            });
                        }
                    })
                    .catch(error => console.error('Error fetching groups data:', error));
            }
        })
        .catch(error => console.error('Fetch error:', error));
}



function groups() {
    fetch('FetchGroups.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Data:', data); // Debug statement to check data structure
            // Check if the data contains an error
            if (data.error) {
                console.error('Error in data:', data.error);
            } else {
                // Assuming data is an array of group names
                data.forEach(group_name => {
                    console.log(group_name);
                    // Do whatever you need with the group_name here
                });
            }
        })
        .catch(error => console.error('Error fetching data:', error));
}

function fetchGroupID() {
    fetch('groupRequirement.php')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        // Check if data.courseGroupID is an array
        if (Array.isArray(data.courseGroupID)) {
            // Re-index the array numerically
            const courseGroupIDs = data.courseGroupID;

            console.log(courseGroupIDs); // This will contain the array of courseGroupIDs

            // You can perform further operations with the courseGroupIDs here
        } else {
            console.error('Data received is not in the expected format:', data);
        }
    })
    .catch(error => console.error('Error fetching data:', error));
}





function reqName() {
    const createdReq = document.querySelector('.createdReq');
    createdReq.innerHTML = ''; // Clear previous content

    fetch('test.php') // Replace 'path_to_your_php_file.php' with your actual PHP file path
        .then(response => response.json())
        .then(data => {
            // Check if data contains reqNames array
            if (data.reqNames && Array.isArray(data.reqNames)) {
                // Loop through the reqNames array and append each item to createdReq
                data.reqNames.forEach(reqName => {
                    const reqElement = document.createElement('div');
                    reqElement.textContent = reqName;
                    createdReq.appendChild(reqElement);
                });
            } else {
                console.error('Invalid data format or missing reqNames array');
            }
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}










function handleAction(action, course_id) {
    console.log('Clicked:', course_id);
    switch (action) {
        case 'View Members':
            viewMembers(course_id);
            fetchStudents(course_id); // Call fetchStudentIDs when 'View Members' is clicked
            break;
        case 'Requirements':
            setrequirements(course_id);
            reqName();
            break;
        case 'Rubric':
            rubric();
            break;
    }
}



function saveCourseID(courseID) {
    fetch('fetchCourseID.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ course_id: courseID })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('Course ID saved in session:', data.course_id);
        } else {
            console.error('Failed to save course ID in session:', data.error);
        }
    })
    .catch(error => console.error('Fetch error:', error));
}

function fetchStudents() {
    const membersContainer = document.querySelector('.membersContainer');
    membersContainer.innerHTML = ''; // Clear previous content

    fetch('fetchStudents.php')
    .then(response => response.json())
    .then(data => {
        console.log(data); // Log the received JSON data
        // Process the data as needed
        data.forEach(student => {
            const memberHeading = document.createElement('h4');
            memberHeading.textContent = `${student.firstName} ${student.lastName}`;
            membersContainer.appendChild(memberHeading);
        });
    })
    .catch(error => console.error('Fetch error:', error));
}














document.addEventListener('DOMContentLoaded', fetchAcademicYears);















</script>

<!-- mmssmnmn -->