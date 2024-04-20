<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" 
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Class Menu</title>
    <style>
        

        body{
         background: #CBC4BA;
         overflow-x: hidden;
        overflow: hidden;
        }
        #error-message {
            position: absol ute;
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
        transition: opacity 0.3s ease; /* Add transition for background color */
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
                    <img src="menu_assets/prof.jpg" alt="profile-img">
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
                            <img src="menu_assets/prof.jpg" alt="profile-img">
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

            // Add event listener to the close button
            var closeButton = document.querySelector('.close');
            closeButton.addEventListener('click', closeEditform);
        }

        // Define closeEditform function
        function closeEditform() {
            document.getElementById('editProfileOverlay').style.display = 'none';
            document.getElementById('menuBtn').style.display = 'none';
            location.reload();
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
            <!-- Course Display Dropdown -->
            <div id="coursesDropdown"></div>
        </div>
       
 
        <!-- Script to handle AJAX request for live search -->
        <script>
            // Function to fetch courses created by the professor via AJAX
            // Function to fetch courses created by the professor via AJAX
            function fetchCourses() {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', 'LiveSearchCourseCreated.php', true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var courses = JSON.parse(xhr.responseText);
                        var coursesDropdown = document.getElementById('coursesDropdown');

                        courses.forEach(function(course) {
                            var dropdown = document.createElement('div');
                            dropdown.classList.add('dropdown');

                            var h3 = document.createElement('h3');
                            h3.textContent = course.courseName;

                            var button = document.createElement('button');
                            button.type = 'button';
                            button.classList.add('classSet');
                            button.textContent = '...';
                            button.onclick = function() {
                                dropdown.classList.toggle('active');
                            };

                            var dropdownContent = document.createElement('div');
                            dropdownContent.classList.add('dropdown-content');

                            var actions = ['Create Group', 'View Members', 'Add Members', 'Requirements', 'Rubric'];
                            actions.forEach(function(action) {
                                var btn = document.createElement('button');
                                btn.type = 'button';
                                btn.classList.add('dropdownbtn');
                                btn.textContent = action;
                                btn.onclick = function() {
                                    // Handle action based on course ID
                                    switch (action) {
                                        case 'Create Group':
                                            creategroup(course.courseID);
                                            break;
                                        case 'View Members':
                                            viewMembers(course.courseID);
                                            break;
                                        case 'Add Members':
                                            addMembers(course.courseID);
                                            break;
                                        case 'Requirements':
                                            setrequirements(course.courseID);
                                            break;
                                        case 'Rubric':
                                            rubric(course.courseID);
                                            break;
                                        default:
                                            break;
                                    }
                                };
                                dropdownContent.appendChild(btn);
                            });

                            dropdown.appendChild(h3);
                            dropdown.appendChild(button);
                            dropdown.appendChild(dropdownContent);
                            coursesDropdown.appendChild(dropdown);
                        });
                    }
                };
                xhr.send();
            }

            // Call the function to fetch courses when the page loads or as needed
            fetchCourses();

        </script>
 
 
 
 
        <!-- creategroup -->
                <div class="creategroupContainer">
                    <h1>Create group</h1>
                    <h3>Group Name:</h3>
                                <input type="text" class="inputgroupName" name="groupName" placeholder="Input group name">
                    <form class="addcheckbox">
                        <div class="flex-container">
                           
                            <div>
                                <h3>Add Student:</h3>
                                <input type="text" class="inputName" name="studentName" placeholder="Input name">
                            </div>
                            <div class="checkboxStudent">
                                <input type="checkbox" id="StudentName" name="student" value="studentID">
                                <label for="StudentName"> StudentName</label><br>
                                <input type="checkbox" id="StudentName" name="student" value="studentID">
                                <label for="StudentName"> StudentName</label><br>
                            </div>
                        </div>
                        <div class="flex-container">
                            <div>
                                <h3>Add Panel:</h3>
                                <input type="text" class="inputName" name="panelName" placeholder="Input name">
                            </div>
                            <div class="checkboxPanel">
                                <input type="checkbox" id="PanelName" name="panel" value="panelID">
                                <label for="PanelName"> PanelName</label><br>
                                <input type="checkbox" id="PanelName" name="panel" value="panelID">
                                <label for="PanelName"> PanelName</label><br>
                            </div>
                        </div>
                        <div class="flex-container">
                            <div>
                                <h3>Add Advisor:</h3>
                                <input type="text" class="inputName" name="advisorName" placeholder="Input name">
                            </div>
                            <div class="checkboxAdvisor">
                                <input type="checkbox" id="AdvisorName" name="advisor" value="advisorID">
                                <label for="AdvisorName"> AdvisorName</label><br>
                                <input type="checkbox" id="AdvisorName" name="advisor" value="advisorID">
                                <label for="AdvisorName"> AdvisorName</label><br>
                            </div>
                        </div>
                    </form>
                    <button type="button" class="addgroupbtn" onclick="createGROUP()">Add +</button>
                </div>
 
        <!-- viewgroup -->
                <div class="viewgroup">
                    <h3>Members:</h3>
                        <div class="membersContainer">
                            <label for="StudentName"> StudentName</label><br>
                            <label for="StudentName"> StudentName</label><br>
                            <label for="StudentName"> StudentName</label><br>
                            <label for="StudentName"> StudentName</label><br>
                            <label for="InstructorName"> InstructorName</label><br>
                        </div>
                </div>
 
        <!-- add members -->
                <div class="addmember">
                    <form class="addcheckbox">
                        <div>
                            <h3>Add Member:</h3>
                            <input type="text" class="inputName" name="studentName" placeholder="Input name">
                        </div>
                        <div class="checkboxStudent">
                            <input type="checkbox" id="StudentName" name="student" value="studentID">
                            <label for="StudentName"> StudentName</label><br>
                            <input type="checkbox" id="StudentName" name="student" value="studentID">
                            <label for="StudentName"> StudentName</label><br>
                        </div>
                        <button type="button" class="addmemberbtn" onclick="addmem()">Add +</button>
                    </form>
                </div>
 
        <!-- set requirements -->
                <div class="setrequirements">
                    <h3>Requirements</h3>
                        <input type="text" class="inputRequirements" name="requirements" placeholder="Input requirements">
                    <h3>Requirements Description</h3>
                        <input type="text" class="inputRequirementsDescription" name="requirementsDescription" placeholder="Input Description">
                    <h3>${courseName}</h3>
                </div>
        <!-- rubric -->
                <div class="rubriccontainer">
                    <h3>Rubric Code:</h3>
                    <input type="text" id="courserubric" class="inputRubricID" name="rubricCode" placeholder="Input Rubric Code">
                </div>
        </div>
    </div>
    <script
        src="professorhome.js">
   
    </script>  
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