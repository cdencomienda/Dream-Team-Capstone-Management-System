<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Course</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" /> 
    <title>Class Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=REM&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   

    <script src = "studentcourse.js"></script>    
    
    <link rel="stylesheet" href="StudentCourseStyle.css">
   
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
            
            <script src = "homepage.js"></script>
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
        <button type="button" class="notif"  onclick="studentnotifAuth()">Notification</button>
        <button type="button" class="class"  onclick="studentClass()">Class</button>
        <button type="button" class="schedule"  onclick="StudentSchedule()">Schedule</button>
        <button type="button" class="capstone"  onclick="StudentCapstone()">Capstone Defense</button>
    </div>
    <!-- Ian -->
     
    <div class="StudentClass">
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
                                <button type="button" class="dropdownbtn" onclick="rubric_preview()">Rubric</button>
                            </div>
                        </div>
                        <!-- PanelMember, Lead -->
                        <button type="button" class="createdgroupBTN" onclick="newGroupCreated()">Group name</button>
                        <!-- <script>
                            function newGroupCreated() {
                                var container = document.querySelector('.StudentDefault');
                                container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
                            }
                        </script> -->

                    </div>     
                    <div class="divButton">
                        <!-- <button class="CreateSched" id = "addScheduleBtn">
                        Add Schedule <i class="fa-solid fa-plus"></i>
                        </button> -->
                    </div> 
                </div>
            </div>    
        </div>   

        <div class="StudentDefault" id = "StudentDefault" style = "display: none;" >  
            <div class="dashboard_header">
                <!-- Group Name Box -->
                <div class="groupname_container" onclick = "showDefaultBody()"> 
                    <div class="groupname_container"> 
                        <div class="group_name" id="group_name"> sample  
                    
                    </div>   
                </div>
            </div> 

                <h4>
                    <div class="button-group"> 

                        <button type="button" class=" Submission-Btn" onclick="submissionBtnAuth()"> <i class="fa-solid fa-clipboard"></i> Submissions </button>

                        <!-- files -->
                        <div class = "flsDropdown " data-flsDropdown>
                            <button type="button" class=" Rep-FilesBtn" onclick = "filesbtn()"data-flsDropdown-button> <i class="fa-solid fa-file"></i> Files </button>
                            <div class="filesContainer"> 
                                <div class="documentationCont">
                                    Document Requirement: <br>
                                    <div class="ReqDocumentation">
                                        <div class="attachedDocumentation"onclick="openModal('requirement%20_repository/docu-logs/docu-test1.pdf')"> 
                                        
                                        <img src="menu_assets/file-icon.png" alt="file icon" class="fileIcon">
                                            <div class="Recent-fileName">docu-test1.pdf</div>
                                            
                                        </div>
                                        <div class="divDocuReqLogs"> <br> 
                                            <button class="DocuReqLogs" onclick="toggleDocuReqLogs()"> <i class="fa-solid fa-ellipsis"></i> </button>
                                        </div>
                                    </div>     
                                </div>    
                            </div>
                        </div>     

                        <!-- files popup -->
                        <div class="fileLogsPopup" id="DocuReqrmntLogs">
                                                <h4>Document Requirement Logs</h4>
                                                <!-- Logs will be dynamically added here -->
                                            </div>   

                        <div class="mDropdown" data-flsDropdown>  
                        <button type="button" class="Members-Btn" data-flsDropdown-button onclick="fetchStudents()"  > <i class="fa-solid fa-user-group"></i> Members </button>
                                <!-- Container to display group members -->
                            <div class="GroupmembersContainer" id="groupMembersContainer">   
                            </div>
                    </div> 
                        <div class="pDropdown" data-pDropdown>  
                            <button type="button" class="Panelist-Btn" data-pDropdown-button onclick="fetchpanelist()"  > <i class="fa-solid fa-user-group"></i> Panelist </button> 
                            <div class="PanelistContainer" id="PanelistContainer">
                                Panel1
                            </div>
                        </div>
                </h4>
            </div>

            <div class="defaultBody" id="defaultBody">
        <div class="recentFiles">
            <!-- File posted by another person -->
            <div class="fileMessage left" onclick="openModal1('featuredfiles/DREAM TEAM - Recommendation.pdf')">
                <div class="fileInfo">
                    <img src="menu_assets/file-icon.png" alt="file icon" class="fileIcon">
                    <div class="fileDetails">
                        <strong>DREAM TEAM - Recommendation</strong>
                        <span>26 KB</span>
                    </div>
                </div>
            </div>
            
            <!-- File posted by you -->
            <div class="fileMessage right" onclick="openModal1('featuredfiles/Final Documentation.pdf')">
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
            <span class="closeBtn" onclick="closeModal()">&times;</span>
            <iframe id="fileFrame" src="" frameborder="0"></iframe>
        </div>
    </div>
    
            
            <div class="submissionFrame" style = "display: none;" id="submissionFrame">
                <div class="submissionscontainer">
                <div class= "requirement-list">
                    <div class = "req-nameCont"> 
                        <button class="requirement-name">
                            <h4>FILE KEMELOT IAN</h4>
                        </button>
                    </div>
                </div>
         <style> 

         </style>
                <div class="requirement-details">
    <div class="requirement-title" id="req_title"> <h3> Documentation Requirement for Chapter 1 </h3> </div> <br>
    <div class="requirement-descriptionCont"> Requirement Description: 
        <div class="requirement-descBox" id="req_description">              <span class="closeButton" onclick="closeModal()">&times;</span>
     
            Attach your file of Chapter 1 for Pre-Defense
        </div>        
    </div>
    <div class="reqfile-version" id="reqfile_version"> 
    </div> <br>   
    <!-- idk kung san lalagay ung file attached id -->
    <div class="Attach-Files"> 
        <form id="file-upload" class="requirement-file">
            <div class="atchFiles">   
                <h3>Attach Files</h3> 
                <!-- Replace img tag with the i tag -->
                <!-- <i class="fa-solid fa-plus" id="attach-btn"></i> -->
                <img src="course_assets/plus.png" alt="attached file" id="attach-btn"> 
                <div id="upload-btn" class="upload-container"></div>
                <label for="input-file"></label>
                <input type="file" accept="application/pdf" id="input-file" name="profile_picture">
            </div>
        </form> 
    </div>   
    <div class="Attached-FileCont">
        <!-- attached files go here -->
    </div>        

    <div class="req-submitbtnCont"> 
        <button class="reqbtn" type="button" id= "submit-btn">
            Submit
        </button>
    </div>
</div>

<script>
     document.getElementById('input-file').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const attachedFileContainer = document.querySelector('.Attached-FileCont');
            
            // Create a new div element to display the file name and remove button
            const fileDiv = document.createElement('div');
            fileDiv.className = 'attached-file';
            fileDiv.textContent = file.name;
            
            // Create a remove button
            const removeBtn = document.createElement('button');
            removeBtn.className = 'remove-btn';
            removeBtn.textContent = 'Remove';
            removeBtn.addEventListener('click', function() {
                attachedFileContainer.removeChild(fileDiv);
            });

            // Append the remove button to the file div
            fileDiv.appendChild(removeBtn);

            // Append the new div to the attached files container
            attachedFileContainer.appendChild(fileDiv);
        }
    });

    document.getElementById('submit-btn').addEventListener('click', function() {
        const attachedFileContainer = document.querySelector('.Attached-FileCont');
        const defaultBody = document.getElementById('defaultBody');
        const files = attachedFileContainer.querySelectorAll('.attached-file');

        files.forEach(fileDiv => {
            const fileName = fileDiv.textContent.replace('Remove', '').trim();

            // Create a new file message div
            const fileMessageDiv = document.createElement('div');
            fileMessageDiv.className = 'fileMessage right';
            fileMessageDiv.onclick = function() { openModal(`featuredfiles/${fileName}`); };

            // Create the file info div
            const fileInfoDiv = document.createElement('div');
            fileInfoDiv.className = 'fileInfo';

            // Create the file icon img
            const fileIconImg = document.createElement('img');
            fileIconImg.src = 'menu_assets/file-icon.png';
            fileIconImg.alt = 'file icon';
            fileIconImg.className = 'fileIcon';

            // Create the file details div
            const fileDetailsDiv = document.createElement('div');
            fileDetailsDiv.className = 'fileDetails';

            // Create the strong element for the file name
            const strongElement = document.createElement('strong');
            strongElement.textContent = fileName;

            // Create the span element for file size (mock size for example)
            const spanElement = document.createElement('span');
            spanElement.textContent = 'Unknown Size';

            // Append elements to their parents
            fileDetailsDiv.appendChild(strongElement);
            fileDetailsDiv.appendChild(spanElement);
            fileInfoDiv.appendChild(fileIconImg);
            fileInfoDiv.appendChild(fileDetailsDiv);
            fileMessageDiv.appendChild(fileInfoDiv);

            // Append the file message div to the recentFiles div
            defaultBody.querySelector('.recentFiles').appendChild(fileMessageDiv);
        });

        // Clear the attached files container after submission
        attachedFileContainer.innerHTML = '';
    });

    function openModal(filePath) {
        alert(`Opening modal for: ${filePath}`);
        // Implement modal opening logic here
    }
</script>

                    </div>
                </div>
            </div>
        </style>
        <div class="rubriccontainer" style="display: none"> 
                <div class="secondaryRubriccont">
                    <div class="rubric-container">
                            <h1>Written Communication</h1>
                        </div>
                        <table class="table">        
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
                                    
                                    <td>Relevance</td>
                                    <td>The content is comprehensive, well-researched, and highly informative. It demonstrates a deep understanding of the subject matter.</td>
                                    <td>The content is mostly accurate and relevant but may lack some depth or clarity in certain areas. It generally conveys the required information.</td>
                                    <td>The content is partially accurate and relevant but greatly lacks some depth or clarity in certain areas.</td>
                                    <td>The content is partially accurate and relevant but greatly lacks some depth or clarity in certain areas.</td>
                                    <td>The content is partially accurate and relevant but greatly lacks some depth or clarity in certain areas.</td>
                                    <td>The content is partially accurate and relevant but greatly lacks some depth or clarity in certain areas.</td>
                                    <td>The content is partially accurate and relevant but greatly lacks some depth or clarity in certain areas.</td>
                                </tr>
                                <tr>
        
        
                                </tr>
                            </tbody>
                        </table>
                    </div>
            </div>  
    </div>
    <!-- ian end -->    
</body>
</html>




<script> 


function fetchAcademicYears() {
    const classDropdown = document.querySelector('.class-Dropdown');
    classDropdown.innerHTML = '<h3>My Courses</h3>'; // Clear previous content

    fetch('studentYears.php')
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
                console.log('Fetched academic years:', data); // Log fetched data

                // Map and parse academic_years to yearBtn
                const academicYears = data.map(item => {
                    return {
                        yearBtn: parseInt(item.academic_years[0], 10) || 0, // Parse first element of academic_years array to integer
                        acy_id: item.acy_id
                    };
                });

                // Sort the academic years in descending order based on yearBtn
                academicYears.sort((a, b) => b.yearBtn - a.yearBtn);

                console.log('Sorted academic years:', academicYears);

                const container = document.querySelector('.class-Dropdown');

                academicYears.forEach(academicYear => {
                    const year = academicYear.yearBtn;
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
                        acy_Stored(year); // Store acy_id instead of year
                        acy_idStored(year); // Store acy_id instead of year
                    });

                    ul.addEventListener('click', (event) => {
                        const selectedTerm = event.target.dataset.term;

                        if (selectedTerm) {
                            console.log(`Selected term: ${selectedTerm}`);
                            storeSelectedTerm(selectedTerm); // Assuming this function handles storing the selected term
                            fetchCourses(button.parentNode, year, selectedTerm); // Pass the year and selectedTerm to fetchCourses
                            groups(); // Assuming this function handles some other functionality
                            
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

function dropdownMelon(button) {
    const targetId = button.dataset.target;
    const dropdownContent = document.getElementById(targetId);
    if (dropdownContent) {
        dropdownContent.style.display = dropdownContent.style.display === 'none' ? 'block' : 'none';
    }
}

function fetchCourses(container, year, selectedTerm) {
    let coursesDropdown = container.querySelector('.coursesDropdown');

    if (!coursesDropdown) {
        coursesDropdown = document.createElement('div');
        coursesDropdown.className = 'coursesDropdown';
        container.appendChild(coursesDropdown);
    } else {
        coursesDropdown.innerHTML = '';
    }

    fetch('fetchCourseStudents.php')
        .then(response => response.json())
        .then(coursesData => {
            if (coursesData.error) {
                console.error('Error fetching courses:', coursesData.error);
                return; // Exit early if there's an error
            }

            console.log('Courses:', coursesData);

            fetch('fetchGroupsStudents.php')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(groupsData => {
                    if (groupsData.error) {
                        console.error('Error fetching groups:', groupsData.error);
                        return; // Exit early if there's an error
                    }

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

                        const actions = ['Rubric'];
                        actions.forEach(action => {
                            const actionButton = document.createElement('button');
                            actionButton.type = 'button';
                            actionButton.className = 'dropdownbtn';
                            actionButton.textContent = action;
                            actionButton.onclick = () => handleAction(action, course.course_id);
                            dropdownContent.appendChild(actionButton);
                        });

                        courseTitle.textContent = `${course.course_code} - ${course.section} `;
                        courseTitle.appendChild(button);

                        courseElement.appendChild(courseTitle);
                        courseElement.appendChild(dropdownContent);
                        coursesDropdown.appendChild(courseElement);

                        button.addEventListener('click', function() {
                            dropdownMelon(this);
                            console.log('Clicked Course ID:', course.course_id);
                            saveCourseID(course.course_id);
                            
                        });

                        console.log('Course ID:', course.course_id);

                        if (groupsData[course.course_id]) {
                            groupsData[course.course_id].forEach(group_name => {
                                const groupButton = document.createElement('button');
                                groupButton.type = 'button';
                                groupButton.classList.add('createdgroupBTN');
                                groupButton.onclick = function() {
                                    newGroupCreated(course.course_id, group_name);
                                    console.log('AY:', year, 'Term:', selectedTerm, 'Course ID:', course.course_id, 'Course Section:', course.section, 'Course Code:', course.course_code, 'Group Name:', group_name);
                                    const directoryPath = `AY ${year}-${year + 1} > Term ${selectedTerm} > ${course.course_code} - ${course.section} > ${group_name}`;
                                    setDirectory(directoryPath);
                                };
                                groupButton.textContent = group_name;
                                courseElement.appendChild(groupButton);
                            });
                        }
                    });
                })
                .catch(error => console.error('Error fetching groups data:', error));
        })
        .catch(error => console.error('Error fetching courses:', error));
}


function setDirectory(path) {
    console.log('this is the button directory: ', path);

    const fileDirectory = path;
    console.log('this is the actual directory: ', fileDirectory);

    // Prepare the directory steps
    const directorySteps = fileDirectory.split(' > ').join('/');

    // Check the directory using fetch API
    fetch('profSetDirectory.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ directory: directorySteps })
    })
    .then(response => response.json())
    .then(data => {
        if (data.exists) {
            console.log('Directory exists: ', data.path);
        } else {
            console.log('Directory does not exist: ', data.path);
        }
    })
    .catch(error => {
        console.error('Error:', error);
    });
}



    function newGroupCreated(course_id, group_name) {
        var container = document.querySelector('.StudentDefault');
        container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
        console.log(course_id, group_name);
        fetchGroupData(course_id, group_name);
        fetchStudentGroups();
        fetchPanelGroups();
        requirementName();
        fetchGroupID();
        reqName();
        clear();
        fileFeed();

        

    // Prepare the data to be sent in the request body
    const formData = new FormData();
    formData.append('course_id', course_id);
    formData.append('group_name', group_name);

    // Send an AJAX request using fetch
    fetch('fetchGroupName.php', {
        method: 'POST',
        body: formData,
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text();
    })
    .then(result => console.log(result))
    .catch(error => console.error('Error:', error));
}


function fetchGroupData(course_id, group_name) {
    // Clear the existing content in the group_name element
    document.getElementById('group_name').textContent = '';

    fetch('fetchGroupName.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            'course_id': course_id,
            'group_name': group_name
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Create a new h3 element for displaying the group name
            const groupHeader = document.createElement('h3');
            groupHeader.textContent = data.group_name;

            // Clear any existing content in the group_name element
            const groupContainer = document.getElementById('group_name');
            groupContainer.innerHTML = '';
            
            // Append the h3 element to the group_name element
            groupContainer.appendChild(groupHeader);

            console.log('Group Name:', data.group_name);
            console.log('Student Group ID:', data.student_group_id);

            // Store data in session using JavaScript (if needed)
            sessionStorage.setItem('student_group_id', data.student_group_id);
        } else {
            console.error('Error:', data.message);
        }
    })
    .catch(error => console.error('Fetch error:', error));
}

document.addEventListener('DOMContentLoaded', function() {
    // Assuming showDefaultBody() is defined somewhere
    function showDefaultBody() {
        // Function implementation here
        document.getElementById("defaultBody").style.display = "block";
        document.getElementById("submissionFrame").style.display = "none";
        console.log('showDefaultBody clicked');
    }

    // Find the element and attach the event listener
    var groupnameContainer = document.querySelector('.groupname_container');
    if (groupnameContainer) {
        groupnameContainer.addEventListener('click', showDefaultBody);
    } else {
        console.error('Element with class "groupname_container" not found.');
    }
});



function fetchStudentGroups() {
    fetch('fetchStudentGroups.php')
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error(data.error); // Output any error message
            } else {
                const groupMembersContainer = document.querySelector('.GroupmembersContainer');
                
                // Clear the container first
                groupMembersContainer.innerHTML = '';

                // Output adviser's name or "No Adviser"
                const adviserElement = document.createElement('h4');
                adviserElement.textContent = data.adviser ? "Adviser - " + data.adviser : "No Adviser";
                adviserElement.style.textAlign = 'left';
                groupMembersContainer.appendChild(adviserElement);

                // Process the array of students
                if (data.students && data.students.length > 0) {
                    data.students.forEach(student => {
                        const studentElement = document.createElement('h4');
                        studentElement.textContent = student;
                        studentElement.style.textAlign = 'left';
                        groupMembersContainer.appendChild(studentElement);
                    });
                } else {
                    console.log("No students found.");
                }
            }
        })
        .catch(error => console.error('Error:', error));
}





function fetchPanelGroups() {
    const PanelistContainer = document.querySelector('.PanelistContainer');
    PanelistContainer.innerHTML = ''; // Clear existing content

    fetch('fetchPanelGroups.php')
        .then(response => response.json())
        .then(data => {
            // Check for error message
            if (data.error) {
                const errorElement = document.createElement('h4');
                errorElement.textContent = data.error;
                errorElement.style.textAlign = 'left';
                PanelistContainer.appendChild(errorElement);
            } else {
                // Iterate through panelists data
                data.forEach(panelist => {
                    const panelistName = `${panelist.firstName} ${panelist.lastName}`;
                    const panelistRole = panelist.panelRole;
                    
                    // Create an h4 element for each panelist
                    const panelistElement = document.createElement('h4');
                    panelistElement.textContent = `${panelistRole} - ${panelistName}`;
                    panelistElement.style.textAlign = 'left'; // Align text to the left

                    // Append the h4 element to PanelistContainer
                    PanelistContainer.appendChild(panelistElement);
                });
            }
        })
        .catch(error => {
            console.error('Error fetching panelist data:', error);
        });
}


// //files

function requirementName() {
    const filesContainer = document.querySelector('.filesContainer');
    filesContainer.innerHTML = ''; // Clear existing content

    fetch('requirementName.php')
        .then(response => response.json())
        .then(data => {

            if (data.length === 0) {
                // If no data is fetched, display a message
                const noFilesMessage = document.createElement('h4');
                noFilesMessage.textContent = 'No files uploaded';
                noFilesMessage.style.display = 'flex';
                noFilesMessage.style.justifyContent = 'center';
                noFilesMessage.style.marginTop = '130px';
                noFilesMessage.classList.add('noFilesMessage');
                filesContainer.appendChild(noFilesMessage);
            } else {
            console.log('Received reqName data:', data);
            data.forEach(reqName => {
                // Create a documentationCont element
                const documentationCont = document.createElement('div');
                documentationCont.classList.add('documentationCont');

                // Create Document Requirement text
                const docRequirement = document.createElement('div');
                docRequirement.textContent = reqName.reqName; // Access reqName property
                documentationCont.appendChild(docRequirement);

                // Create ReqDocumentation container
                const reqDocumentation = document.createElement('div');
                reqDocumentation.classList.add('ReqDocumentation');

                // Create attachedDocumentation div
                const attachedDocumentation = document.createElement('div');
                attachedDocumentation.classList.add('attachedDocumentation');
                attachedDocumentation.setAttribute('onclick', `openModal('${encodeURIComponent(reqName.filePath)}')`);
                attachedDocumentation.onclick = function() {
                        console.log('Open modal for reqName:', reqName.reqName, 'path', reqName.filePath);
                        openModal(reqName.filePath);
                    };

                // Create file icon
                const fileIcon = document.createElement('img');
                fileIcon.src = 'menu_assets/file-icon.png';
                fileIcon.alt = 'file icon';
                fileIcon.classList.add('fileIcon');
                attachedDocumentation.appendChild(fileIcon);

                // Create Recent-fileName div
                const recentFileName = document.createElement('div');
                recentFileName.textContent = reqName.fileName;
                recentFileName.classList.add('Recent-fileName');
                attachedDocumentation.appendChild(recentFileName);

                reqDocumentation.appendChild(attachedDocumentation);

                // Create divDocuReqLogs div
                const divDocuReqLogs = document.createElement('div');
                divDocuReqLogs.classList.add('divDocuReqLogs');

                // Create toggle button with icon
                const toggleButton = document.createElement('button');
                toggleButton.classList.add('DocuReqLogs');
                toggleButton.innerHTML = '<i class="fa-solid fa-ellipsis"></i>';

                // Add onclick event to toggle logs
                toggleButton.onclick = function() {
                    console.log('Clicked toggleButton for reqName:', reqName);
                    // Implement toggleDocuReqLogs, clickedRequirement, and popUpLog as needed
                    toggleDocuReqLogs(reqName); // Pass reqName or related data as needed
                    clickedRequirement(reqName.reqName);
                    popUpLog(reqName.reqName);
                };

                divDocuReqLogs.appendChild(toggleButton);

                reqDocumentation.appendChild(divDocuReqLogs);

                documentationCont.appendChild(reqDocumentation);

                // Append documentationCont to filesContainer
                filesContainer.appendChild(documentationCont);
            });
        }
        })
        .catch(error => console.error('Error fetching reqName data:', error));
}



function clickedRequirement(reqName) {
    // Fetch API request
    fetch('sessionReqName.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ reqName: reqName }), // Use reqName parameter passed to function
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Failed to save reqName to session');
        }
        console.log('reqName saved to session successfully');
    })
    .catch(error => console.error('Error saving reqName to session:', error));
}


function popUpLog(reqName) {
    const logContainer = document.querySelector('.fileLogsPopup'); // Select the container
    logContainer.innerHTML = '';

    // Create an <h4> element
    const heading = document.createElement('h3');
    heading.textContent = reqName;

    // Append the <h4> element to the logContainer
    logContainer.appendChild(heading);

    fetch('popupFile.php')
        .then(response => response.json())
        .then(data => {
            if (data.filePaths && data.filePaths.length > 0) {
                data.filePaths.forEach((filePath, index) => {
                    console.log(filePath);

                    // Extract the file name from the file path
                    const fileName = filePath.split('/').pop();

                    // Create a new log item div
                    const logItem = document.createElement('div');
                    logItem.className = 'logItem';
                    logItem.id = `logItem${index + 1}`;
                    logItem.setAttribute('onclick', `openModal('${filePath}')`);
                    logItem.onclick = function() {
                        console.log('Open modal for reqName:', reqName, 'path', filePath);
                        openModal(filePath);
                    };

                    // Create and append the file icon image
                    const img = document.createElement('img');
                    img.src = 'https://via.placeholder.com/24';
                    img.alt = 'file icon';
                    logItem.appendChild(img);

                    // Create and append the file name div
                    const fileNameDiv = document.createElement('div');
                    fileNameDiv.className = 'fileName';
                    fileNameDiv.textContent = fileName;
                    logItem.appendChild(fileNameDiv);

                    // Append the log item to the container
                    logContainer.appendChild(logItem);
                });
            } else {
                // If no files are uploaded or found
                const noFilesMessage = document.createElement('div');
                noFilesMessage.textContent = 'No Files Uploaded';
                logContainer.appendChild(noFilesMessage);
            }
        })
        .catch(error => console.error('Fetch error: ', error));
}



function fileFeed() {
    const defaultBody = document.querySelector('.defaultBody'); // Select the container
    defaultBody.innerHTML = ''; // Clear previous content if any

    fetch('fileFeed.php', {
        method: 'GET' // Assuming your PHP script uses GET method
    })
    .then(response => response.json()) // Parse the JSON response
    .then(data => {
        // Log the fetched data to the console
        console.log('Fetched data:', data);

        // Iterate over each item in the fetched data
        data.forEach(item => {
            // Create elements for each file message
            const recentFilesDiv = document.createElement('div');
            recentFilesDiv.classList.add('recentFiles'); // Add class 'recentFiles'

            const fileMessage = document.createElement('div');
            fileMessage.classList.add('fileMessage', 'left');
            fileMessage.setAttribute('onclick', `openModal('${item.filePath}')`);
            fileMessage.onclick = function() {
                console.log('Open modal for reqName:', item.reqName, 'path', item.filePath);
                openModal(item.filePath);
            };

            // Create sender element
            const sender = document.createElement('div');
            sender.classList.add('sender');
            sender.textContent = item.firstName + ' ' + item.lastName; // Concatenate first name and last name

            // Create fileInfo container
            const fileInfoDiv = document.createElement('div');
            fileInfoDiv.classList.add('fileInfo');

            // Create fileIcon element
            const fileIconImg = document.createElement('img');
            fileIconImg.src = 'menu_assets/file-icon.png'; // Sample file icon
            fileIconImg.alt = 'file icon';
            fileIconImg.classList.add('fileIcon');

            const fileDetailsDiv = document.createElement('div');
            fileDetailsDiv.classList.add('fileDetails');

            const fileNameStrong = document.createElement('strong');
            fileNameStrong.textContent = item.fileName + ' - V' + item.version + '.pdf';

            fileDetailsDiv.appendChild(fileNameStrong);
            fileInfoDiv.appendChild(fileIconImg); // Append file icon to fileInfoDiv
            fileInfoDiv.appendChild(fileDetailsDiv); // Append file details to fileInfoDiv
            fileMessage.appendChild(sender);
            fileMessage.appendChild(fileInfoDiv); // Append fileInfoDiv to fileMessage
            recentFilesDiv.appendChild(fileMessage); // Append fileMessage to recentFilesDiv
            defaultBody.appendChild(recentFilesDiv); // Append recentFilesDiv to defaultBody
        });

    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });
}


// //files


function groups() {
    fetch('fetchGroupsStudent.php')
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

            console.log('this is the course group ids:', courseGroupIDs); // This will contain the array of courseGroupIDs

            // You can perform further operations with the courseGroupIDs here
        } else {
            console.error('Data received is not in the expected format:', data);
        }
    })
    .catch(error => console.error('Error fetching data:', error));
}


function reqName() {
    const createdReq = document.querySelector('.req-nameCont');
    createdReq.innerHTML = ''; // Clear previous content

    fetch('createdRequirement.php')
        .then(response => response.json())
        .then(data => {
            // Check if data contains reqNames array
            if (data.reqNames && Array.isArray(data.reqNames)) {
                // Loop through the reqNames array and append each item to createdReq
                data.reqNames.forEach(reqName => {
                    const reqElement = document.createElement('div');
                    reqElement.classList.add('requirement-name');

                    // Adding onclick event handler
                    reqElement.onclick = function() {
                        console.log('Requirement name clicked:', reqName);
                        // Additional logic for click event can be added here
                        reqDesc(reqName);
                        clear();
                    };

                    const reqNameElement = document.createElement('h4');
                    reqNameElement.textContent = reqName; // Assuming each requirement has a 'name' property

                    reqElement.appendChild(reqNameElement);
                    createdReq.appendChild(reqElement);

                    console.log('These are the reqName::', reqName);
                });
            } else {
                console.error('Invalid data format or missing reqNames array');
            }
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}

function reqDesc(name) {
    console.log('this the the reqName for Desc: ', name);

    // Construct the data to send
    const formData = new FormData();
    formData.append('name', name);

    // Fetch request
    fetch('reqDescStudents.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json()) // Parse response as JSON
    .then(data => {
        // Handle JSON response
        console.log('Response from PHP:', data);
        if (data.reqDescription) {
            console.log('reqDescription:', data.reqDescription);
            
            // Create elements and append them
            createElements(name, data.reqDescription);
        } else {
            console.error('Error:', data.error);
        }
    })
    .catch(error => {
        console.error('Fetch error:', error);
    });
}

function createElements(name, reqDescription) {
    // Define requirementsContainer first
    const requirementsContainer = document.querySelector('.requirement-details');

    // Create elements
    const titleElement = document.createElement('div');
    titleElement.classList.add('requirement-title');
    titleElement.id = 'req_title';
    const titleHeader = document.createElement('h1');
    titleHeader.textContent = ` ${name}`;
    titleElement.appendChild(titleHeader);

    const descriptionContElement = document.createElement('div');
    descriptionContElement.classList.add('requirement-descriptionCont');
    descriptionContElement.innerHTML = `Requirement Description: <div class="requirement-descBox" id="req_description">${reqDescription}</div>`;

    const versionElement = document.createElement('div');
    versionElement.id = 'reqfile_version';
    versionElement.classList.add('reqfile-version');

    const fileContainer = document.createElement('div');
    fileContainer.classList.add('Attach-Files');

    const formElement = document.createElement('form');
    formElement.id = 'file-upload';
    formElement.classList.add('requirement-file');
    formElement.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission
        console.log('Form submitted!'); // Placeholder for form submission action
        // Additional processing logic can go here
    });

    const attachFilesElement = document.createElement('div');
    attachFilesElement.classList.add('atchFiles');
    attachFilesElement.innerHTML = `<h3>Attach Files</h3>
                                    <img src="course_assets/plus.png" alt="attached file" id="attach-btn">`;

    const uploadBtnContainer = document.createElement('div');
    uploadBtnContainer.id = 'upload-btn';
    uploadBtnContainer.classList.add('upload-container');

    const inputFileLabel = document.createElement('label');
    inputFileLabel.htmlFor = 'input-file';

    const inputFile = document.createElement('input');
    inputFile.type = 'file';
    inputFile.accept = 'application/pdf';
    inputFile.id = 'input-file';
    inputFile.name = 'profile_picture';

    inputFile.addEventListener('change', function(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function(event) {
            const fileContent = event.target.result;

            // File container
            const fileContainer = document.createElement('div');
            fileContainer.classList.add('attached-file');
            fileContainer.classList.add('flex');

            // File name
            const fileName = document.createElement('span');
            fileName.textContent = file.name;

            // Remove button
            const removeBtn = document.createElement('button');
            removeBtn.className = 'remove-btn';
            removeBtn.textContent = 'Remove';
            removeBtn.addEventListener('click', function() {
                fileContainer.parentNode.removeChild(fileContainer);
                inputFile.value = ''; // Clear the file input after removal
            });

            // Append elements to fileContainer
            fileContainer.appendChild(fileName);
            fileContainer.appendChild(removeBtn);

            // Append file container to Attached-FileCont
            const attachedFileCont = document.querySelector('.Attached-FileCont');
            if (attachedFileCont) {
                attachedFileCont.appendChild(fileContainer);
            } else {
                console.error('Error: Container element .Attached-FileCont not found.');
            }
        };

        if (file) {
            reader.readAsDataURL(file);
        }
    });

    const attachedFileCont = document.createElement('div');
    attachedFileCont.classList.add('Attached-FileCont');

    const submitBtn = document.createElement('button');
    submitBtn.classList.add('reqbtn');
    submitBtn.type = 'submit'; // Change button type to submit
    submitBtn.id = 'submit-btn';
    submitBtn.textContent = 'Submit';

    // Append elements
    uploadBtnContainer.appendChild(inputFileLabel);
    uploadBtnContainer.appendChild(inputFile);

    attachFilesElement.appendChild(uploadBtnContainer);

    formElement.appendChild(attachFilesElement);
    formElement.appendChild(submitBtn); // Append submit button to form

    fileContainer.appendChild(formElement);
    requirementsContainer.appendChild(titleElement);
    requirementsContainer.appendChild(descriptionContElement);
    requirementsContainer.appendChild(versionElement);
    requirementsContainer.appendChild(fileContainer); 
    requirementsContainer.appendChild(attachedFileCont);

    // No need for a separate submit button container now

    // Append form to requirementsContainer
    requirementsContainer.appendChild(formElement);
}


function submitFile() {
    console.log('Submitting files:');

    // Select the container where files are attached
    const attachedFileCont = document.querySelector('.Attached-FileCont');

    // Initialize an array to store file names
    const fileNames = [];

    // Iterate over each attached file container
    const attachedFiles = attachedFileCont.querySelectorAll('.attached-file');
    attachedFiles.forEach(fileContainer => {
        // Get the file name
        const fileName = fileContainer.querySelector('span').textContent;
        fileNames.push(fileName); // Store each file name in the array
        console.log(fileName);
        // You can process or send each file here as needed
    });

    // Example of using the file names array
    fileNames.forEach(name => {
        // Do something with each file name
        console.log(`Processing file: ${name}`);
    });

    // Perform additional submission logic here
}















function clear(){
    const cont = document.querySelector('.requirement-details');
    cont.innerHTML = '';

}












function fetchRubric() {
    const rubricContainer = document.querySelector('.secondaryRubriccont');
    rubricContainer.innerHTML = ''; // Clear previous content

    // const rubric = document.querySelector('.table');
    // rubric.innerHTML = ''; // Clear previous content

    fetch('fetchDisplayRubric.php')
        .then(response => response.json())
        .then(data => {
            // Assuming data is an array of results
            console.log('Fetched Data:', data); // Log the entire data fetched from the server

            data.forEach(result => {
                // Display only the results here
                console.log("Rubric ID: " + result.rubrics_id);
                console.log("Rubric Name: " + result.rubric_name);
                console.log("Level Details: ");
                result.level_details.forEach(detail => {
                    console.log("- " + detail);
                });
                console.log("Level Percentages: ");
                console.log(result.level_percentage); // Log the array of level percentages directly
                console.log("Criteria: ");
                result.criteria.forEach((criteria, index) => {
                    console.log("Index: " + index);
                    console.log("Criteria Name: " + criteria.criteria_name);
                    console.log("Criteria Details:");
                    console.log("(" + criteria.criteria_details.length + ") [" + criteria.criteria_details.map(detail => "'" + detail + "'").join(', ') + "]");

                    // Display the criteria details array based on the fetched data
                    const criteriaDetailsArray = criteria.criteria_details;
                    console.log(criteriaDetailsArray); // Log the criteria details array separately
                    // Log the rubric percentage
                    console.log("Rubric Percentage: " + criteria.rubric_percentage);
                });

                // Create a new h1 element to display the rubric name
                const rubricNameH1 = document.createElement('h1');
                rubricNameH1.textContent = result.rubric_name;
                rubricContainer.appendChild(rubricNameH1);

                // Create the table below the rubric name
                const table = document.createElement('table');
                const thead = document.createElement('thead');
                const tr = document.createElement('tr');

                // Table headers based on fetched data
                const headers = [
                    "Overall Percentage",
                    "Learning Outcomes",
                    "Criteria",
                    ...result.level_details.map((detail, index) => `${detail} (${result.level_percentage[index]}%)`)
                ];

                headers.forEach(headerText => {
                    const th = document.createElement('th');
                    th.innerHTML = headerText;
                    tr.appendChild(th);
                });

                thead.appendChild(tr);
                table.appendChild(thead);

                // Create table body to display criteria details
                const tbody = document.createElement('tbody');
                result.criteria.forEach((criteria, index) => {
                    const tr = document.createElement('tr');

                    // Create a cell for rubric percentage
                    const percentageTd = document.createElement('td');
                    percentageTd.innerHTML = criteria.rubric_percentage;
                    tr.appendChild(percentageTd);

                    // Create a cell for criteria name
                    const nameTd = document.createElement('td');
                    nameTd.innerHTML = criteria.criteria_name.join(', ');
                    tr.appendChild(nameTd);

                    // Create cells for each criteria detail
                    criteria.criteria_details.forEach((detail, i) => {
                        const detailTd = document.createElement('td');
                        detailTd.innerHTML = detail;
                        tr.appendChild(detailTd);

                        // Duplicate the first detail (index 0)
                        if (i === 0) {
                            const duplicateDetailTd = document.createElement('td');
                            duplicateDetailTd.innerHTML = detail;
                            tr.appendChild(duplicateDetailTd);
                        }
                    });

                    // Append the row to tbody
                    tbody.appendChild(tr);
                });

                table.appendChild(tbody);
                rubricContainer.appendChild(table);
            });
        })
        .catch(error => console.error('Error fetching data:', error));
}


function clearForm() {
        document.getElementById('selectedPanelist').reset();
    }


function handleAction(action, course_id) {
    console.log('Clicked:', course_id);
    switch (action) {
        case 'Rubric':
            rubric_preview();
            fetchRubric();
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

// function fetchStudents() {
//     const membersContainer = document.querySelector('.GroupmembersContainer');
//     membersContainer.innerHTML = ''; // Clear previous content

//     fetch('fetchStudents.php')
//     .then(response => response.json())
//     .then(data => {
//         console.log(data); // Log the received JSON data
//         // Process the data as needed
//         data.forEach(student => {
//             const memberHeading = document.createElement('h5');
//             memberHeading.textContent = `${student.firstName} ${student.lastName}`;
//             membersContainer.appendChild(memberHeading);
//         });
//     })
//     .catch(error => console.error('Fetch error:', error));
// }





function coursesData() {
    fetch('repositoryDirectory.php') // Replace with your PHP script URL
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log(data); // Output fetched JSON data to console (for demonstration)
            // Process the fetched data here
            processData(data);
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}

function processData(data) {
    // Check if the data is an object with status and message properties
    if (data && data.status && data.message) {
        // Check for success status or handle errors
        if (data.status === "success") {
            console.log(data.message); // Log success message
        } else {
            console.error('Error:', data.message); // Log error message
        }
    } else {
        console.error('Error: Data is not in expected format.');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    coursesData();
});






document.addEventListener('DOMContentLoaded', fetchAcademicYears);

 
</script>





<!--  -->

