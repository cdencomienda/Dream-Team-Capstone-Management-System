<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Course</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
     integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src = "studentcourse.js"></script>    
    <link rel="stylesheet" href="StudentCourseStyle.css">
    <?php include 'login.php'; ?>
    <div class="header">
        <div class="wrap">
            <button type="button" class="logobtn" onclick="archive()"></button> 
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
    <div class="hero">
    <div class="Lsection">
        <div id="sectionBtn"></div>
        <button type="button" class="notif"  onclick="notifAuth()">Notification</button>
        <button type="button" class="class"  onclick="studentClass1()">Class</button>
        <button type="button" class="schedule"  onclick="StudentSchedule()">Schedule</button>
        <button type="button" class="capstone"  onclick="Capstone()">Capstone Defense</button>
    </div>
    <div class="StudentClass">
        <div class="course_created" grid>
            <!-- <div class="S_courseInfo">
                
            </div> -->
            <!-- Container for student's courses -->
            <div class = "studentCourseDropdown" id="studentCoursesDropdown">
                    <h3>My Courses</h3>
                    <div id="coursesList"></div> <!-- This will be populated with the list of courses -->
                </div>
            <div class="dropdown">
            </div>
        </div>
        <div class="StudentDefault">
            <div class="dashboard_header">

                    <!-- Group Name Box               -->

                <div class="groupname_container"> 
                    <div class="group_name" id="group_name"> 
                        <h3> 
                            <p class="group_name"> Test Group Name </p>    
                        </h3>       
                    </div>   
                </div>
                <script> 
                    // Get the element with the class "group_name"
                    const groupDiv = document.getElementById('group_name');

                    // Function to decrease opacity by 70%
                    function decreaseOpacity() {
                        groupDiv.style.opacity = '0.85'; // 30% opacity
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

                <h4>
                    <div class="button-group"> 
                    <button type="button" class=" Submission-Btn" onclick="submissionBtnAuth()"> <i class="fa-solid fa-clipboard"></i> Submissions </button>

                            <div class = "flsDropdown">
                            <button type="button" class=" Rep-FilesBtn" onclick="r_filesBtnAuth()"> <i class="fa-solid fa-file"></i> Files </button>
                            <div class = "filesContainer"> 
                                <div class = "documentationCont">
                                    Document Requirement: <br>
                                    <div class = "ReqDocumentation">
                                    </div>     
                                </div>   
                                <div class = "AdvCont">
                                    Advisor Recomendation Sheet: <br>
                                    <div class = "advRecomendation">
                                    </div>
                                </div> 
                            </div>          
                        </div>    
                        <div class="mDropdown">  
                        <button type="button" class="Members-Btn" onclick="fetchGroupMembers()"> <i class="fa-solid fa-user-group"></i> Members </button>
                                <!-- Container to display group members -->
                                <div class="GroupmembersContainer" id="groupMembersContainer"></div>
                            </div>
                        </div>
                    </h4>
                </div>
            <div class="defaultBody" id="defaultBody">
                <div class="recentFiles" >
                    'featured files here'
                </div >
            </div>
            <div class="submissionFrame" id="submissionFrame">
                <div class="submissionscontainer">
                <div class= "requirement-list">
                    <div class = "req-nameCont"> 
                        <div class="requirement-name">
                        this requirement
                        </div>
                    </div>
                    
                </div>
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
                    </script>    
                </div>
            
        </div>
    </div>
    
        <style>
        .submissionFrame {
            display: none;
        }

        </style>
    </div>
</body>
</html>