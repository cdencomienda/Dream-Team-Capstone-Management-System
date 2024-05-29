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
                        <div class="recentFiles" >
                            'featured files here'
                        </div >
                    </div>
                    
                    <!-- submissions -->
                    <div class="submissionFrame" id="submissionFrame">
                        <div class="submissionscontainer">
                            <div class= "requirement-list">
                                <div class = "req-nameCont"> 
                                    <div class="requirement-name">
                                    
                                    </div>
                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                    // Function to fetch requirements information for the logged-in student's group
                                    function fetchRequirementsInfo() {
                                        fetch('fetchRequirements.php')
                                            .then(response => response.json())
                                            .then(requirements => {
                                                const reqNameContainer = document.querySelector('.req-nameCont');
                                                
                                                // Clear existing content
                                                reqNameContainer.innerHTML = '';
            
                                                // Populate the container with the group's requirements
                                                requirements.forEach(requirement => {
                                                    const div = document.createElement('div');
                                                    div.className = 'requirement-name';
                                                    div.textContent = requirement;
                                                    reqNameContainer.appendChild(div);
                                                });
                                            })
                                            .catch(error => {
                                                console.error('Error fetching requirements information:', error);
                                            });
                                    }
            
                                    // Fetch requirements information when the page loads
                                    fetchRequirementsInfo();
                                });
                                </script>
                                </div>
                                
                            </div>
                        </div>
                        <script> 
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
                            <tbody class="rubricList" id="selectedRubric">
                            <!-- Your student list rows will be dynamically populated here -->
                            </tbody>
                        </table>
                    </section>
                </form> 
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
                // Assuming data is an array of academic years
                console.log('Fetched academic years:', data);
                const container = document.querySelector('.class-Dropdown');

                data.forEach(yearStr => {
                    // Parse year as an integer
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
                    ul.style.display = 'none'; // Initially hide the ul

                    ['Term 1', 'Term 2', 'Term 3'].forEach((term, index) => {
                        const li = document.createElement('li');
                        li.className = 'term';
                        li.dataset.term = (index + 1).toString(); // Set the dataset value as 1, 2, 3
                        li.textContent = term;

                        ul.appendChild(li);
                    });

                    button.addEventListener('click', () => {
                        // Toggle the display of the ul element
                        ul.style.display = ul.style.display === 'none' ? 'block' : 'none';
                        // Record the clicked year
                        console.log(`Button for AY ${displayName} clicked`);
                        acy_Stored(year);
                        acy_idStored(year);
                    });

                    // Event listener for terms
                    ul.addEventListener('click', (event) => {
                    const selectedTerm = event.target.dataset.term; // Get the dataset value

                    if (selectedTerm) {
                        console.log(`Selected term: ${selectedTerm}`);

                        // Store the selected term in the session
                        storeSelectedTerm(selectedTerm);
                        courses();
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

// Call fetchAcademicYears when your page is ready
document.addEventListener('DOMContentLoaded', fetchAcademicYears);



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

function courses() {

}












</script>