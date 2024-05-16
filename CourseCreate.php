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
                    <img src="menu_assets/babay.png" alt="profile-img">
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
                            <img src="menu_assets/babay.png" alt="profile-img">
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
    </div>
 
<!-- courseCreation     -->
 
    <div class="wrapper">
        <div class="professorClass">
            <div class="courseCreation" grid>
            <button type="button" class="createAButton" onclick="toggleCourseCreation()">Create a Course</button>
            <form method="post" action="CourseCreated.php" method="POST">
                <div class="containerCreatecourse">
                    <h2>Create Course</h2>
                    <div>
                        <h3>Course Name:</h3>
                        <input type="text" id="coursenameID" class="inputTerm" name="courseName" placeholder="Input Course name" required>
                        <h3>Course Code:</h3>
                        <input type="text" id="courseCode" class="inputTerm" name="courseCode" placeholder="Input Course Code" required>
                        <div id="courseCodeSuggestions"></div>
                       
                        <h3> Section:
                            <input type="text" id="sectionID" class="inputSection" name="Section" placeholder="Input Section" required>  
                        </h3>
                        <h3> AY:
                            <input type="text" id="yearID" class="inputAY" name="AcadYear" placeholder=" Input Academic Year" required>  
                        </h3>
                        <h3> Term:    
                            <input type="number" id="termID" class="Term" name="Term" placeholder="Term" min="1" max="3" required>
                        </h3>
                        <h3> Unit:
                            <input type="number" id="unitID" class="inputUnits" name="CourseUnit" placeholder="Unit/s" min="1" max="4" required>
                        </h3>
                    </div>  
                    <button type="submit" id="ccbutton" class="createcourseButton">Create Course</button>
                </div>
            </form>
                <!-- Error message display -->
                <?php if(isset($_SESSION['error_message'])) { ?>
                <div id="error-message" class="show">
                    <?php echo $_SESSION['error_message']; ?>
                    <button onclick="clearErrorMessage()">OK</button>
                </div>
                    <?php
                    unset($_SESSION['error_message']); // Clear the error message after displaying it
                    } ?>
            <script>
                function clearErrorMessage() {
                var errorMessage = document.getElementById("error-message");
                errorMessage.classList.remove("show");
                }
            </script>
            </div>

<!-- Course Display Dropdown --> 
        <!-- WAG DELETE PLS -->
            <!-- <div id="coursesDropdown">
                <div class="dropdownmelon">            
                    <h3 id="courseNameDisplay">Courses Created <button type="button" class="classSet" onclick="dropdownMelon()">•••</button></h3>
                    <div class="dropdown-content" id="courseActions">
                        <button type="button" class="dropdownbtn" onclick="creategroup()">Create Group</button>          
                        <button type="button" class="dropdownbtn" onclick="viewMembers()">View Members</button>
                        <button type="button" class="dropdownbtn" onclick="addMembers()">Add Members</button>
                        <button type="button" class="dropdownbtn" onclick="setrequirements()">Requirements</button>
                        <button type="button" class="dropdownbtn" onclick="rubric()">Rubric</button>
                    </div>
                </div>
                <button type="button" class="createdgroupBTN" onclick="newGroupCreated()">Group name</button>
            </div> -->
 
<!-- Script to handle AJAX request for live search -->
            <div id="coursesDropdown"></div>
        </div>
<script>

document.addEventListener('DOMContentLoaded', function() {
    fetchCourses();
});
   
   function fetchCourses() {
    fetch('LiveSearchCourseCreated.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(courses => {
            const coursesDropdown = document.getElementById('coursesDropdown');

            courses.forEach(course => {
                const dropdown = document.createElement('div');
                dropdown.classList.add('dropdown');

                const courseContainer = document.createElement('div');
                courseContainer.classList.add('course-container');

                const h3 = document.createElement('h3');
                h3.textContent = course.courseName;

                const button = document.createElement('button');
                button.type = 'button';
                button.classList.add('classSet');
                button.textContent = '•••';
                button.dataset.target = 'dropdown-' + course.courseID;

                const dropdownContent = document.createElement('div');
                dropdownContent.classList.add('dropdown-content');
                dropdownContent.id = 'dropdown-' + course.courseID;
                dropdownContent.style.display = 'none';

                const actions = ['Create Group', 'View Members', 'Add Members', 'Requirements', 'Rubric'];
                actions.forEach(action => {
                    const btn = document.createElement('button');
                    btn.type = 'button';
                    btn.classList.add('dropdownbtn');
                    btn.textContent = action;
                    btn.onclick = () => handleAction(action, course.courseID);
                    dropdownContent.appendChild(btn);
                });

                courseContainer.appendChild(h3);
                courseContainer.appendChild(button);
                dropdown.appendChild(courseContainer);
                dropdown.appendChild(dropdownContent);
                coursesDropdown.appendChild(dropdown);

                // Fetch and append groups for the current course
                fetchGroups(course.courseID, newGroupButton => {
                    const groupContainer = document.createElement('div');
                    groupContainer.classList.add('group-container');
                    groupContainer.appendChild(newGroupButton);
                    dropdown.appendChild(groupContainer); // Append the group container inside the dropdown
                });

                // Log the course ID here after it's assigned
                console.log('Fetched course ID:', course.courseID);
            });

            // Log the course IDs when all courses are fetched
            console.log('Fetched all course IDs:', courses.map(course => course.courseID));
        })
        .catch(error => console.error('Error fetching courses:', error));
}
 
function fetchGroups(courseID, callback) {
    fetch('FetchGroups.php?courseID=' + courseID) // Include courseID in the URL
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Parse the response as JSON
        })
        .then(data => {
            console.log('Parsed Groups:', data); // Log the parsed data
            const addedGroups = {}; // Object to store added group IDs for this course

            // Iterate over courseIDs in the data object
            for (const course in data) {
                data[course].forEach(groupName => { // Iterate over group names
                    // Check if the groupID has already been added for this course
                    if (!(groupName in addedGroups)) {
                        const newGroupButton = document.createElement('button');
                        newGroupButton.type = 'button';
                        newGroupButton.classList.add('createdgroupBTN');
                        newGroupButton.textContent = groupName; // Display the groupName
                        newGroupButton.dataset.courseId = courseID; // Store the courseID as a data attribute

                        newGroupButton.onclick = () => {
                        console.log('Clicked group:', groupName); // Log the clicked group name
                        newGroupCreated(courseID); // Call the newGroupCreated function with courseID
                        storeGroupName(groupName);
                    };


                        if (callback && typeof callback === 'function') {
                            callback(newGroupButton); // Call the callback function with the newGroupButton
                        }

                        addedGroups[groupName] = true; // Add the groupName to the addedGroups object

                        // Log the groupName here after it's assigned
                        console.log('Created createdgroupBTN for group Name:', groupName);

                        // Log the courseID
                        console.log('Course ID in fetchGroups:', courseID);
                    }
                });
            }
        })
        .catch(error => console.error('Error fetching groups:', error));
}

function storeGroupName(groupName){

        group = groupName;
        console.log('groupName to be stored: ', group);

        fetch('storeGroupName.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'group=' + encodeURIComponent(group),
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

function getCourseMember() {
    const studentList = document.querySelector('.studentList');
    studentList.innerHTML = ''; // Clear previous content

    const selectedStudentsInput = document.getElementById('selectedStudents');
    let selectedStudents = []; // Array to track selected students

    // Fetch student data from the server using the stored courseID
    fetch('courseMember.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Parse the response as JSON
        })
        .then(students => {
            console.log('Fetched students:', students); // Log the fetched students for debugging

            // Check if any students were fetched
            if (students.length > 0) {
                let studentNames = []; // Array to store student names for autocomplete

                students.forEach(studentName => {
                    if (studentName) {
                        const studentRow = document.createElement('tr');
                        const studentNameCell = document.createElement('td');
                        studentNameCell.textContent = studentName.trim(); // Trim the student name
                        studentRow.appendChild(studentNameCell);
                        studentList.appendChild(studentRow);

                        studentNames.push(studentName.trim()); // Add the student name to the array
                    } else {
                        console.warn('Invalid student data:', studentName); // Log invalid student data
                    }
                });

                // Initialize autocomplete
                $('#selectedStudents').autocomplete({
                    source: function(request, response) {
                        // Split the input by commas
                        const term = request.term.split(/,\s*/).pop();
                        // Filter the student names based on the last segment
                        response($.ui.autocomplete.filter(studentNames, term));
                    },
                    focus: function() {
                        // Prevent the value from being inserted on focus
                        return false;
                    },
                    select: function(event, ui) {
                        let terms = this.value.split(/,\s*/);
                        // Remove the current input
                        terms.pop();
                        // Add the selected item
                        terms.push(ui.item.value);
                        // Add placeholder to get the comma-and-space at the end
                        terms.push('');
                        this.value = terms.join(', ');
                        return false;
                    }
                });

                // Function to update the selected students input
                function updateSelectedStudents() {
                    selectedStudentsInput.value = selectedStudents.join(', ');
                }

            } else {
                const noStudentsRow = document.createElement('tr');
                const noStudentsCell = document.createElement('td');
                noStudentsCell.textContent = 'All Students are in a Group.';
                noStudentsRow.appendChild(noStudentsCell);
                studentList.appendChild(noStudentsRow);
            }
        })
        .catch(error => console.error('Error fetching students:', error));
}

let professorNames = [];

function getProfessors() {
    fetch('getProfessors.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(professors => {
            professorNames = professors.map(prof => prof.userName.trim());

            // Apply autocomplete to all relevant inputs
            $(".panelAdvisorOptions").autocomplete({
                source: professorNames,
                select: function(event, ui) {
                    // Remove the selected name from the array
                    professorNames = professorNames.filter(name => name !== ui.item.value);

                    // Update the autocomplete source for all relevant inputs
                    $(".panelAdvisorOptions").autocomplete("option", "source", professorNames);
                }
            });
        })
        .catch(error => console.error('Error fetching professors:', error));
}

// Call getProfessors to initialize the autocomplete
$(document).ready(function() {
    getProfessors();
});


// Event delegation to handle dropdown toggle
document.addEventListener('click', event => {
    const classSetButtons = document.querySelectorAll('.classSet');
    classSetButtons.forEach(button => {
        const target = document.getElementById(button.dataset.target);
        if (target && target.style.display !== 'none' && button !== event.target) {
            target.style.display = 'none'; // Close the active dropdown
        }
    });

    if (event.target.classList.contains('classSet')) {
        const target = document.getElementById(event.target.dataset.target);
        if (target) {
            target.style.display = target.style.display === 'none' ? 'block' : 'none';
        }
    }
});

// Function to fetch and display student IDs and corresponding usernames for a specific course ID
function fetchStudentIDs(courseID) {
    const membersContainer = document.querySelector('.membersContainer');
    membersContainer.innerHTML = ''; // Clear previous content

    fetch('fetchStudentIDs.php?courseID=' + courseID)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text(); // Get the raw response text
        })
        .then(responseText => {
            console.log('Raw Response:', responseText); // Log the raw response
            return JSON.parse(responseText); // Parse the response as JSON
        })
        .then(data => {
            const students = data.students;

            students.forEach(student => {
                const memberDiv = document.createElement('div');
                memberDiv.textContent = `${student.userName}`;
                membersContainer.appendChild(memberDiv);
            });
        })
        .catch(error => console.error('Error fetching student IDs:', error));

        
} 

function storeCourseID(courseID) {

    console.log(courseID);

    varCourse = courseID;

    console.log(varCourse);

    fetch('storeCourseID.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'varCourse=' + encodeURIComponent(varCourse),
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

// Function to initialize autocomplete for the input field
function initAutocomplete() {
    const selectedStudentsInput = $('#userName');

    selectedStudentsInput.autocomplete({
        source: function(request, response) {
            // Filter the fetched students based on user input
            const term = request.term.toLowerCase();
            const filteredStudents = students.filter(student =>
                student.userType === 'Student' && student.userName.toLowerCase().includes(term)
            );
            response(filteredStudents.map(student => student.userName.trim()));
        },
        minLength: 2, // Minimum characters to trigger autocomplete
        select: function(event, ui) {
            // Handle selection of autocomplete suggestion
            selectedStudentsInput.val(ui.item.value);
            return false;
        }
    });
}

// Call initAutocomplete after fetching students and storing them in the 'students' variable
let students = []; // Array to store fetched students

function getStudents() {
    const studentContainer = document.querySelector('.studentContainer');
    const selectedStudentsInput = document.getElementById('userName');
    let selectedStudents = []; // Array to track selected students

    // Fetch student data from the server
    fetch('userTypeStudent.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Parse the response as JSON
        })
        .then(students => {
            console.log('Fetched students:', students); // Log the fetched students for debugging

            // Clear previous content in studentContainer
            studentContainer.innerHTML = '';

            // Create HTML elements for each student and append them to studentContainer
            students.forEach(student => {
                if (student && student.userType === 'Student' && student.userName) {
                    const studentRow = document.createElement('tr');
                    const studentNameCell = document.createElement('td');
                    studentNameCell.textContent = student.userName.trim(); // Trim the userName if it's defined
                    studentRow.appendChild(studentNameCell);
                    studentContainer.appendChild(studentRow);
                    
                } else {
                    console.warn('Invalid student data:', student); // Log invalid student data
                }
            });

            let studentNames = students.map(student => student.userName.trim());

            // Initialize autocomplete for multiple inputs
            $('.inputNameMember').autocomplete({
                source: function(request, response) {
                    const term = request.term.split(/,\s*/).pop();
                    response($.ui.autocomplete.filter(studentNames, term));
                },
                focus: function() {
                    return false;
                },
                select: function(event, ui) {
                    let terms = this.value.split(/,\s*/);
                    terms.pop();
                    terms.push(ui.item.value);
                    terms.push('');
                    this.value = terms.join(', ');
                    updateSelectedStudents(); // Update the selected students array
                    return false;
                }
            });

            // Function to update the selected students input
            function updateSelectedStudents() {
                selectedStudentsInput.value = $('.inputNameMember').val();
            }
        })
        .catch(error => console.error('Error fetching students:', error));
}

document.querySelector('.addcheckbox').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission
    const courseID = varCourse; // Assuming varCourse contains the courseID
    storeCourseID(courseID); // Call storeCourseID to store the courseID in the session
    this.submit(); // Now submit the form
});

document.querySelector('.selectcontainer').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission
    const courseID = varCourse; // Assuming varCourse contains the courseID
    storeCourseID(courseID); // Call storeCourseID to store the courseID in the session
    this.submit(); // Now submit the form
});

function fetchRubricNames() {
    fetch('fetchRubricName.php')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Parse the response as JSON
        })
        .then(data => {
            console.log('Fetched Rubric Names:', data); // Debugging: Check if data is as expected
            
            // Clear the existing content in rubricList
            $('#selectedRubric').empty();

            // Append each rubric name to the rubricList table
            data.forEach(rubric => {
                $('#selectedRubric').append('<tr><td>' + rubric.trim() + '</td></tr>');
            });

            $("#courserubric").autocomplete({
                source: data.map(rubric => rubric.trim()),
                select: function(event, ui) {
                    $(this).val(ui.item.value);
                    return false; // Prevent the form from submitting on selection
                }
            });
        })
        .catch(error => {
            console.error('Error fetching rubric names:', error);
        });
}

// Call fetchRubricNames to initialize the autocomplete
$(document).ready(function() {
    fetchRubricNames();
});

// Update the handleAction function to call fetchStudentIDs for 'View Members' action
function handleAction(action, courseID) {
    console.log('Clicked:', courseID);
    switch (action) {
        case 'Create Group':
            creategroup(courseID);
            storeCourseID(courseID);
            getCourseMember();
            getProfessors();

            break;
        case 'View Members':
            viewMembers(courseID);
            fetchStudentIDs(courseID); // Call fetchStudentIDs when 'View Members' is clicked
            break;
        case 'Add Members':
            addMembers(courseID);
            storeCourseID(courseID);
            getStudents();
            
            break;
        case 'Requirements':
            setrequirements(courseID);
            storeCourseID(courseID);

            break;
        case 'Rubric':
            rubric(courseID);
            fetchRubricNames();
            storeCourseID(courseID);
            break;
        default:
            break;
    }
} 

// Call the function to fetch courses when the page loads or as needed
fetchCourses();
fetchStudentIDs(courseID);

</script>  

            <div class="containerMenu">
<!-- group created -->
                <div class="GroupContainer">
                    <div class="dashboard_header">
                        <div class="groupname_container"> 
                            <div class="group_name" id="group_name">     
                            </div>   
                                </div>
                                <script> 
                                    
                                </script> 
                            <h4>
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



<!-- add members -->
                <div class="addmember">
                   <form class="addcheckbox" method="POST" action="addCourseMember.php">
                        <div>
                            <main class="addmembertable" id="addmember_table">
                                <section class="table__header">
                                    <label for="userName">User Name:</label>
                                    <input type="text" class="inputNameMember" id="userName" name="studentNames" placeholder="User name">
                                </section>
                                <section class="table_Addmember">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>User Name</th>
                                            </tr>
                                        </thead>
                                        <tbody class="studentContainer" id="addUser_body">
                                            <tr onclick="updateUserName(this)">
                                                <td>Austria, Jose</td>
                                            </tr>
                                            <tr onclick="updateUserName(this)">
                                                <td>Ian</td>
                                            </tr>
                                            <!-- Add more rows dynamically if needed -->
                                        </tbody>
                                    </table>
                                </section>
                            </main>
                        </div>
                        <div class="CourseMemberContainer"></div>
                        <button type="submit" class="addmemberbtn">Add +</button>
                    </form>
                </div>

                <script>
                    function selectedUserName(row) {
                    var userNameInput = document.getElementById("userName");
                    var selectedUserName = row.innerText.trim();
                    if (!userNameInput.value.includes(selectedUserName)) {
                        userNameInput.value += selectedUserName + ' ';
                        var xButton = document.createElement('button');
                        xButton.textContent = 'x';
                        xButton.classList.add('removeButton');
                        xButton.onclick = function() {
                            userNameInput.value = userNameInput.value.replace(selectedUserName, '');
                            xButton.parentElement.remove();
                        };
                        row.classList.add('selected');
                        userNameInput.parentElement.appendChild(xButton);
                    }
                }
                </script>  
                
<!-- creategroup -->
                <div class="creategroupContainer">
                    <h1>Create group</h1>

                    <!-- <form class="selectcontainer" method="POST" action="createGroup.php"> -->
                    <form class="selectcontainer" method="POST" action="createGroup.php">
                    <div>
                            <h3>Group Name:</h3>
                            <input type="text" class="inputgroupName" name="groupName" placeholder="Input group name">
                        </div>


                    <div id="selectedStudentsContainer" class="selected-container"></div>
                    <div class="flex-container">
                        <!-- student -->
                        <div>
                            <label for="selectedStudents">Selected Students:</label>
                            <input type="text" class="inputName" id="selectedStudents" name="studentName" placeholder="User name">
                        </div>
                        <section class="table_selectingusers">
                            <table>
                                <tbody class="studentList" id="selectUserstudents">
                                    <!-- Your student list rows will be dynamically populated here -->
                                </tbody>
                            </table>
                        </section>
                    </div>

                        <div class="flex-container">
                            <!-- Chair Panel -->
                            <div>
                                <label for="selectedPanelistsChair">Selected Chair Panel:</label>
                                <input type="text" id="selectedPanelistsChair" name="panelistNameChair" class="inputName panelAdvisorOptions" placeholder="Select Chair Panel">
                            </div>
                        </div>

                        <div class="flex-container">
                            <!-- Lead Panel -->
                            <div>
                                <label for="selectedPanelistsLead">Selected Lead Panel:</label>
                                <input type="text" id="selectedPanelistsLead" name="panelistNameLead" class="inputName panelAdvisorOptions" placeholder="Select Lead Panel">
                            </div>
                        </div>

                        <div class="flex-container">
                            <!-- Panel Member 1 -->
                            <div>
                                <label for="selectedPanelists1">Selected Panel Member 1:</label>
                                <input type="text" id="selectedPanelists1" name="panelistName1" class="inputName panelAdvisorOptions" placeholder="Select Panel Member 1">
                            </div>
                        </div>

                        <div class="flex-container">
                            <!-- Panel Member 2 -->
                            <div>
                                <label for="selectedPanelists2">Selected Panel Member 2:</label>
                                <input type="text" id="selectedPanelists2" name="panelistName2" class="inputName panelAdvisorOptions" placeholder="Select Panel Member 2">
                            </div>
                        </div>

                        <div class="flex-container">
                            <!-- Adviser -->
                            <div>
                                <label for="selectedAdvisers">Selected Adviser:</label>
                                <input type="text" id="selectedAdvisers" name="adviserName" class="inputName panelAdvisorOptions" placeholder="Select Adviser">
                            </div>
                        </div>

                        <button type="submit" class="addgroupbtn">Add +</button>
                    </form>
                </div>

            <script>
            function selectedUserName(row) {
                var selectedStudentsInput = document.getElementById("selectedStudents");
                var selectedPanelistsInput = document.getElementById("selectedPanelists");
                var selectedAdvisorsInput = document.getElementById("selectedAdvisors");
                var selectedUser = row.innerText.trim();
                
                // Function to add highlight effect
                function highlightSelectedInput(input) {
                    input.classList.add('highlight');
                }
                
                // Function to remove highlight effect
                function removeHighlight(input) {
                    input.classList.remove('highlight');
                }
                
                // Check if the user is already selected
                if (selectedStudentsInput.value.includes(selectedUser) ||
                    selectedPanelistsInput.value.includes(selectedUser) ||
                    selectedAdvisorsInput.value.includes(selectedUser)) {
                    // If selected, remove from the corresponding input field
                    selectedStudentsInput.value = selectedStudentsInput.value.replace('(' + selectedUser + ')', '');
                    selectedPanelistsInput.value = selectedPanelistsInput.value.replace('(' + selectedUser + ')', '');
                    selectedAdvisorsInput.value = selectedAdvisorsInput.value.replace('(' + selectedUser + ')', '');
                    
                    // Remove highlight from the corresponding input
                    if (row.parentElement.id === "selectUserstudents") {
                        removeHighlight(selectedStudentsInput);
                    } else if (row.parentElement.id === "selectUserpanelists") {
                        removeHighlight(selectedPanelistsInput);
                    } else if (row.parentElement.id === "selectUseradvisors") {
                        removeHighlight(selectedAdvisorsInput);
                    }
                    
                    // Remove 'x' button and class
                    row.querySelector('.removeButton').remove();
                    row.classList.remove('selected');
                    
                    // Re-enable clicking on the row
                    row.onclick = function() {
                        selectedUserName(row);
                    };
                } else {
                    // If not selected, add to the corresponding input field with brackets
                    var userWithBrackets = '(' + selectedUser + ')';
                    if (row.parentElement.id === "selectUserstudents") {
                        selectedStudentsInput.value += userWithBrackets + ' ';
                        highlightSelectedInput(selectedStudentsInput);
                    } else if (row.parentElement.id === "selectUserpanelists") {
                        selectedPanelistsInput.value += userWithBrackets + ' ';
                        highlightSelectedInput(selectedPanelistsInput);
                    } else if (row.parentElement.id === "selectUseradvisors") {
                        selectedAdvisorsInput.value += userWithBrackets + ' ';
                        highlightSelectedInput(selectedAdvisorsInput);
                    }
                    
                    // Add 'x' button and class
                    var xButton = document.createElement('button');
                    xButton.textContent = 'x';
                    xButton.classList.add('removeButton');
                    xButton.onclick = function() {
                        // Remove user from corresponding input field when 'x' is clicked
                        if (row.parentElement.id === "selectUserstudents") {
                            selectedStudentsInput.value = selectedStudentsInput.value.replace(userWithBrackets + ' ', '');
                            removeHighlight(selectedStudentsInput);
                        } else if (row.parentElement.id === "selectUserpanelists") {
                            selectedPanelistsInput.value = selectedPanelistsInput.value.replace(userWithBrackets + ' ', '');
                            removeHighlight(selectedPanelistsInput);
                        } else if (row.parentElement.id === "selectUseradvisors") {
                            selectedAdvisorsInput.value = selectedAdvisorsInput.value.replace(userWithBrackets + ' ', '');
                            removeHighlight(selectedAdvisorsInput);
                        }
                        // Remove 'x' button and class
                        row.querySelector('.removeButton').remove();
                        row.classList.remove('selected');
                    };
                    row.appendChild(xButton);
                    row.classList.add('selected');
                    
                    // Disable clicking on the row
                    row.onclick = null;
                }
            }

            </script> 

<!-- viewgroup -->
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
   
<!-- set requirements -->
<div class="setrequirements">
    <h3>Requirements</h3>
    <form class="Requirements" method="POST" action="test.php">
        <input type="text" class="inputRequirements" name="requirements" placeholder="Input requirements">
        <h3>Requirements Description</h3>
        <input type="text" class="inputRequirementsDescription" name="requirementsDescription" placeholder="Input Description">
        <div></div>
        <button type="submit" class="addreqbtn" onclick="addreqBTN()">Add +</button>
    </form>
</div>  
<!-- rubric --> 

                <style> .rubriccontainer{
                    display: none;
                }</style>

        <div class="rubriccontainer">
            <!-- <div class="rubriccontainerv2"> -->
                <form class="addRubric" method="POST" action="addRubric.php">
                    <div>
                        <input type="text" id="courserubric" class="select-box" name="rubricCode" placeholder="Input Rubric" required />
                        <input type="submit" class="btn_submit" value="Submit" />
                    </div>
                    <section class="table_selectrubric">
                        <table>
                            <tbody class="rubricList" id="selectedRubric">
                            <!-- Your student list rows will be dynamically populated here -->
                            </tbody>
                        </table>
                    </section>
                </form>
            <!-- </div> -->
        </div>
     
    <script src="professorhome.js"></script>   
     
</body>
</html> 
<script>
// Function to handle AJAX request for live search
    function liveSearchCourseCode() {
    var input = document.getElementById('courseCode').value;
    var xhr = new XMLHttpRequest();
    if (input.trim() !== '') { // Check if input is not empty
        xhr.open('GET', 'LiveSearchCourseCode.php?search=' + input, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById('courseCodeSuggestions').innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    } else { // If input is empty, hide the suggestions
        document.getElementById('courseCodeSuggestions').innerHTML = '';
    }
}  
 
    // Event listener to trigger live search on input change
    document.getElementById('courseCode').addEventListener('input', liveSearchCourseCode);
 
    // Event listener to hide suggestions when the cursor is not in the field
    document.getElementById('courseCode').addEventListener('blur', function() {
        document.getElementById('courseCodeSuggestions').innerHTML = '';
});
</script>  