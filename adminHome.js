
  // Sorting | Ordering data of HTML table
document.addEventListener('profile', function () {
    const editProfileBtn = document.querySelector('.editprofileBtn');
    const logoutBtn = document.querySelector('.logoutBtn');
  
    editProfileBtn.addEventListener('click', function (event) { 
      event.preventDefault(); 
    }); 
  });

  const table_rows = document.querySelectorAll('tbody tr');
  const table_headings = document.querySelectorAll('thead th');
  
  table_headings.forEach((head, i) => {
      let sort_asc = true;
      head.addEventListener('click', () => {
          table_headings.forEach(head => head.classList.remove('active'));
          head.classList.add('active');
  
          document.querySelectorAll('td').forEach(td => td.classList.remove('active'));
          table_rows.forEach(row => {
              row.querySelectorAll('td')[i].classList.add('active');
          });
  
          head.classList.toggle('asc', sort_asc);
          sort_asc = head.classList.contains('asc') ? false : true;
  
          sortTable(i, sort_asc);
      });
  });
  
  
  function sortTable(column, sort_asc) {
      const sortedRows = [...table_rows].sort((a, b) => {
          const first_row = a.querySelectorAll('td')[column].textContent.toLowerCase();
          const second_row = b.querySelectorAll('td')[column].textContent.toLowerCase();
  
          return sort_asc ? (first_row > second_row ? 1 : -1) : (first_row < second_row ? 1 : -1);
      });
  
      sortedRows.forEach(sorted_row => document.querySelector('tbody').appendChild(sorted_row));
  }

  // left section action js 
    function Users(){
      window.location.assign("Adminuser.php")
    }
    function openArchive(){
      window.location.assign("AdminHome.php")
    } 
    function logOUT(){
      window.location.assign("LoginSignup.php")
    } 
    function notifAuth(){
      window.location.assign("AdminNotifications.php")
    }
    function openClassPage(){
      window.location.assign("AdminCourseCreate.php")
    } 
    function logOUT(){
      window.location.assign("LoginSignup.php")
    }
    function Schedule(){
      window.location.assign("AdminDefenseschedule.php")
    }
    function DefenseR(){
        window.location.assign("DefenseResults.php")
      }
  
// action of melonbtns
function viewMembers() { 
  var container = document.querySelector('.viewgroup'); 
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';  
}

// edit profile js 

document.addEventListener('DOMContentLoaded', (event) => {
  const profilePic = document.getElementById('profilePic');
  const menu = document.getElementById('menuBtn');
  const editProfileBtn = document.getElementById('editProfileBtn');
  const overlay = document.getElementById('editProfileOverlay');

  profilePic.addEventListener('click', () => {
      menu.classList.toggle('show');
  });

  document.addEventListener('click', (event) => {
      if (!profilePic.contains(event.target) && !menu.contains(event.target)) {
          menu.classList.remove('show');
      }
  });

  editProfileBtn.addEventListener('click', () => {
      overlay.classList.add('show');
      menu.classList.remove('show');
  });

  function closeEditform() {
      overlay.classList.remove('show');
  }

  window.onclick = function(event) {
      if (event.target == overlay) {
          overlay.classList.remove('show');
      }
  }

  // Attach closeEditform function to the global scope
  window.closeEditform = closeEditform;
});   

// for class dropdown

const dropdownsClass = document.querySelectorAll('.classListDropdown');

dropdownsClass.forEach(dropdown => {
    const listClass = dropdown.querySelector('.listClass');
    const coursesListed = dropdown.querySelector('.coursesListed');
    const menuCourses = dropdown.querySelector('.menuCourses');
    const options = dropdown.querySelectorAll('.menuCourses > .term'); // Select term list items
    const selectedClass = dropdown.querySelector('.selectedClass');

    listClass.addEventListener('click', () => {
        listClass.classList.toggle('listClass-clicked');
        coursesListed.classList.toggle('coursesListed-rotate');
        menuCourses.classList.toggle('menuCourses-open');
    });

    options.forEach(option => {
        option.addEventListener('click', () => {
            // Update the selected class text
            selectedClass.innerText = option.innerText;

            // Hide all course details
            document.querySelectorAll('.coursesDetails').forEach(detail => {
                detail.style.display = 'none';
            });

            // Show the selected term's courses
            const term = option.getAttribute('data-term');
            const coursesDetail = document.getElementById(term);
            if (coursesDetail) {
                coursesDetail.style.display = 'block';
            }

            // Hide the main menuCourses
            menuCourses.classList.remove('menuCourses-open');
        });
    });
});

  // for course create


 
const profile = document.querySelector('.profile');
const melonbtn = document.querySelector('.melonbtn');
const editprofileBtn = document.querySelector('.editprofileBtn');

profile.addEventListener('click', function () {
  const toggleMenu = document.querySelector('.menu');
  toggleMenu.classList.toggle('active');
});
 
const tap = document.querySelector('.profile', 'melonbtn', 'editprofileBtn');
tap.addEventListener('click', function () {
  const toggleMenu = document.querySelector('.menu', '.settingMelon', );
  toggleMenu.classList.toggle('active', 'melonActivate');
}); 

function toggleCourseCreation() { 
  var container = document.querySelector('.containerCreatecourse');
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
}

  
function createcourse() { 
  console.log("createcourse() function called.");
  const courseName = document.querySelector('.inputTerm[name="courseName"]').value;
  document.getElementById('courseNameDisplay').textContent = courseName;

  // Clear input field
  document.querySelector('.inputTerm[name="courseName"]').value = ''; 
}

function dropdownMelon() {
  var container = document.querySelector('.dropdown-content');
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
}


function creategroup() { 
  var container = document.querySelector('.creategroupContainer');
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
}
 
// PANG CREATE NG GROUP UNDER COURSE CREATE

function createGROUP() {
  // Get input values
  var groupName = document.querySelector('.inputgroupName').value;
  var studentName = document.querySelector('.inputName[name="studentName"]').value;
  var panelName = document.querySelector('.inputName[name="panelName"]').value;
  var advisorName = document.querySelector('.inputName[name="advisorName"]').value;

  // Create a new div element for the group
  var newGroupDiv = document.createElement('div');
  newGroupDiv.className = 'groupDiv';

  // Create a new button element inside the group div
  var newButton = document.createElement('button');
  newButton.type = 'button';
  newButton.className = 'groupButton';
  newButton.textContent = groupName + ' Group'; // You can customize the button text here

  // Append the button to the group div
  newGroupDiv.appendChild(newButton);

  // Append the group div to the coursesDropdown section
  var coursesDropdown = document.getElementById('coursesDropdown');
  coursesDropdown.appendChild(newGroupDiv);
}

function newGroupCreated() {
  var container = document.querySelector('.GroupContainer');
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
    
}
 
document.addEventListener('DOMContentLoaded', function() {
  var dropdownBtns = document.querySelectorAll('.dropdownbtn');

  dropdownBtns.forEach(function(btn) {
      btn.addEventListener('click', function() {
          var allDropdowns = document.querySelectorAll('.dropdown-content');
          allDropdowns.forEach(function(dropdown) {
              dropdown.style.display = 'none';
          }); 
      });
  });
});

function AddMembers() { 
  var container = document.querySelector('.addmember');
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
}

function setrequirements() { 
  var container = document.querySelector('.setrequirements');
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
}

function rubric() { 
  var container = document.querySelector('.rubriccontainer');
  container.style.display = (container.style.display === 'none' || container.style.display === '') ? 'block' : 'none';
}

 
 
// js fucntion of group submission members requ files 
document.addEventListener('click', e =>{
  const isflsDropdowButton = e.target.matches("[data-flsDropdown-button]")
  if(!isflsDropdowButton && e.target.closest('[data-flsDropdown]') != null)
  return
  
  let currentflsDropdown
  if(isflsDropdowButton){
      currentflsDropdown = e.target.closest('[data-flsDropdown]')
      currentflsDropdown.classList.toggle('active')
  }
  
  document.querySelectorAll("[data-flsDropdown].active").forEach(flsDropdown => {
      if (flsDropdown === currentflsDropdown) return
      flsDropdown.classList.remove("active")
  });
  }) 
  function showDefaultBody() {
    document.getElementById("defaultBody").style.display = "block";
    document.getElementById("submissionFrame").style.display = "none";
  
}

function submissionBtnAuth() {
    document.getElementById("defaultBody").style.display = "none";
    document.getElementById("submissionFrame").style.display = "flex";

}


function clsViewGrp(){
  var container = document.querySelector('.viewgroup');
  container.style.display = 'none';
}
  
    // RUBRIC JS PUTANIGGA MO IAN
    document.addEventListener("DOMContentLoaded", function (){
      const customSelects = document.querySelectorAll(".custom-select");
      
      function updateSelectedOptions(customSelect) {
    const selectedOptions = Array.from(customSelect.querySelectorAll(".option.active")).filter(option => option !== customSelect.querySelector(".option.all-tags")).map(function(option) {
        return {
            value: option.getAttribute("data-value"),
            text: option.textContent.trim()
        };
    });

    const selectedValues = selectedOptions.map(function(option) {
        return option.value;
    });

    customSelect.querySelector(".tags_input").value = selectedValues.join(', ');

    let tagsHTML = "";

    if(selectedOptions.length === 0) {
        tagsHTML = '<span class="placeholder">Select the tags</span>';
    } else {
        selectedOptions.forEach(function(option) {
            tagsHTML += `<span class="tag">${option.text}<span class="remove-tag" data-value="${option.value}">&times;</span></span>`;
        });
    }
    customSelect.querySelector(".selected-options").innerHTML = tagsHTML;
}

  
      customSelects.forEach(function(customSelect) {
          const searchInput = customSelect.querySelector(".search-tag");
          const optionsContainer = customSelect.querySelector(".options");
          const noResultMessage = customSelect.querySelector(".no-result-message");
          const options = customSelect.querySelectorAll(".option");
          const allTagsoption = customSelect.querySelector(".option.all-tags");
          const clearButton = customSelect.querySelector(".clear");
  
          allTagsoption.addEventListener("click", function() {
              const isActive = allTagsoption.classList.contains("active");
  
              options.forEach(function(option) {
                  if(option !== allTagsoption) {
                      option.classList.toggle("active", !isActive);
                  }
              });
              updateSelectedOptions(customSelect);
          });
  
          clearButton.addEventListener("click", function() {
              searchInput.value = "";
              options.forEach(function(option) {
                  option.style.display = "block";
              });
              noResultMessage.style.display = "none";
          });
          
          searchInput.addEventListener("input", function() {
              const searchTerm = searchInput.value.toLowerCase();
  
              options.forEach(function(option) {
                  const optionText = option.textContent.trim().toLowerCase();
                  const shouldShow = optionText.includes(searchTerm);
                  option.style.display = shouldShow ? "block" : "none";
              });
  
              const anyOptionsMatch = Array.from(options).some(option => option.style.display === "block");
              noResultMessage.style.display = anyOptionsMatch ? "none" : "block";
  
              if(searchTerm) {
                  optionsContainer.classList.add("option-search-active");
              } else {
                  optionsContainer.classList.remove("option-search-active");
              } 
          });
  
      });
  
      customSelects.forEach(function(customSelect) {
          const options = customSelect.querySelectorAll(".option");
          options.forEach(function(option) {
              option.addEventListener("click", function(event) {
                  option.classList.toggle("active");
                  updateSelectedOptions(customSelect);
              });
          });
      });
  
      document.addEventListener("click", function(event) {
          const removeTag = event.target.closest(".remove-tag");
          if(removeTag) {
              const customSelect = removeTag.closest(".custom-select");
              const valueToRemove = removeTag.getAttribute("data-value");
              const optionToRemove = customSelect.querySelector(".option[data-value='"+valueToRemove+"']");
              optionToRemove.classList.remove("active");
  
              const otherSelectedOptions = customSelect.querySelectorAll(".option.active:not(.all-tags)");
              const allTagsoption = customSelect.querySelector(".option.all-tags");
  
              if(otherSelectedOptions.length === 0) {
                  allTagsoption.classList.remove("active");
              }
              updateSelectedOptions(customSelect);
          }
      });
  
      const selectBoxes = document.querySelectorAll(".select-box");
      selectBoxes.forEach(function(selectBox) {
          selectBox.addEventListener("click", function(event) {
              if(!event.target.closest(".tag")) {
                  selectBox.parentNode.classList.toggle("open");
              }
          });
      });
  
      function resetCustomSelects() {
          customSelects.forEach(function(customSelect) {
              customSelect.querySelectorAll(".option.active").forEach(function(option) {
                  option.classList.remove("active");
              });
              customSelect.querySelector(".option.all-tags").classList.remove("active");
              updateSelectedOptions(customSelect);
          });
      }
      updateSelectedOptions(customSelects[0]);
      const submitButton = document.querySelector(".btn_submit");
      submitButton.addEventListener("click", function() {
          let valid = true;
  
          customSelects.forEach(function(customSelect) {
              const selectedOptions = customSelect.querySelectorAll(".option.active");
  
              if(selectedOptions.length === 0) {
                  const tagErrorMsg = customSelect.querySelector(".tag_error_msg");
                  tagErrorMsg.textContent = "This field is required";
                  tagErrorMsg.style.display = "block";
                  valid = false;
              } else {
                  const tagErrorMsg = customSelect.querySelector(".tag_error_msg");
                  tagErrorMsg.textContent = "";
                  tagErrorMsg.style.display = "none";
              }
          });
  
          if(valid) {
              let tags = document.querySelector(".tags_input").value;
              alert(tags);
              resetCustomSelects();
              return;
          }
      });
  });
  
  function showStats(courseId) {
    document.querySelectorAll('.stats-container').forEach(function(div) {
        div.classList.remove('active');
    });
    document.getElementById(courseId).classList.add('active');
    document.getElementById('stats-modal').style.display = 'block';
    updatePlot(courseId.replace('-stats', ''));
}

function closeModal() {
    document.getElementById('stats-modal').style.display = 'none';
}

function updateStats() {
    var year = document.getElementById('academic-year').value;
    var activeDiv = document.querySelector('.stats-container.active');
    var stats = getStats(activeDiv.id.replace('-stats', ''), year);
    updateModalContent(stats);
    updatePlot(activeDiv.id.replace('-stats', ''));
}

function getStats(courseId, year) {
    // This function should return stats based on courseId and year
    // Here, we are using dummy data
    const dummyStats = {
        'DATAMGT': {
            '2023-2026': { pass: 5, conditionalPass: 70, repeat: 20, passingRate: 75 },
            '2022-2025': { pass: 10, conditionalPass: 60, repeat: 30, passingRate: 70 },
        },
        'SOFTDES': {
            '2023-2026': { pass: 10, conditionalPass: 60, repeat: 30, passingRate: 70 },
            '2022-2025': { pass: 15, conditionalPass: 50, repeat: 35, passingRate: 65 },
        },
        // Add stats for other courses and years
    };
    return dummyStats[courseId][year];
}

function updateModalContent(stats) {
    document.getElementById('pass').innerText = stats.pass + '%';
    document.getElementById('conditional-pass').innerText = stats.conditionalPass + '%';
    document.getElementById('repeat').innerText = stats.repeat + '%';
    document.getElementById('passing-rate').innerText = stats.passingRate + '%';
}

function updatePlot(courseId) {
    var year = document.getElementById('academic-year').value;
    var stats = getStats(courseId, year);
    var xArray = ["PASS", "CONDITIONAL PASS", "REPEAT"];
    var yArray = [stats.pass, stats.conditionalPass, stats.repeat];

    var data = [{
        x: xArray,
        y: yArray,
        type: "bar",
        orientation: "v",
        marker: {color: "rgba(0,0,255,0.6)"}
    }];

    var layout = {title: "Final Defense Report Statistics"};

    Plotly.newPlot("myPlot", data, layout);
}

$(document).ready(function() {
    function animateBars() {
        $('.bar').each(function() {
            var percentage = $(this).data('percentage');
            $(this).animate({
                height: percentage
            }, 1000);
        });
    }

    animateBars();
});


//   function showStats(courseId) {
//     document.querySelectorAll('.stats-container').forEach(function(div) {
//         div.classList.remove('active');
//     });
//     document.getElementById(courseId).classList.add('active');
//     document.getElementById('stats-modal').style.display = 'block';
// }

// function closeModal() {
//     document.getElementById('stats-modal').style.display = 'none';
// }

// function updateStats() {
//     var year = document.getElementById('academic-year').value;
//     var activeDiv = document.querySelector('.stats-container.active');
//     var stats = getStats(activeDiv.id.replace('-stats', ''), year);
//     updateModalContent(stats);
// }

// function getStats(courseId, year) {
//     // This function should return stats based on courseId and year
//     // Here, we are using dummy data
//     const dummyStats = {
//         'DATAMGT': {
//             '2023-2026': { pass: 5, conditionalPass: 70, repeat: 20, passingRate: 75 },
//             '2022-2025': { pass: 10, conditionalPass: 60, repeat: 30, passingRate: 70 },
//         },
//         'SOFTDES': {
//             '2023-2026': { pass: 10, conditionalPass: 60, repeat: 30, passingRate: 70 },
//             '2022-2025': { pass: 15, conditionalPass: 50, repeat: 35, passingRate: 65 },
//         },
//         // Add stats for other courses and years
//     };
//     return dummyStats[courseId][year];
// }

// function updateModalContent(stats) {
//     document.getElementById('pass').innerText = stats.pass + '%';
//     document.getElementById('conditional-pass').innerText = stats.conditionalPass + '%';
//     document.getElementById('repeat').innerText = stats.repeat + '%';
//     document.getElementById('passing-rate').innerText = stats.passingRate + '%';
// }
// $(document).ready(function(){
//   // Function to animate bars based on percentage values
//   function animateBars() {
//       $('.bar').each(function() {
//           var percentage = $(this).data('percentage');
//           $(this).animate({
//               height: percentage
//           }, 1000);
//       });
//   }
  
//   // Call the function when the document is ready
//   animateBars();
// // }); 
// function updateStats1() {
//     var selectedYear = document.getElementById("academic-year").value;

//     // Example: Update data for DATAMGT subject
//     if (selectedYear === "2024-2025") {
//         document.getElementById("datamgt-pass").textContent = "15%";
//         document.getElementById("datamgt-conditional-pass").textContent = "55%";
//         document.getElementById("datamgt-repeat").textContent = "20%";
//         document.getElementById("datamgt-passing-rate").textContent = "75%";
//     } else if (selectedYear === "2023-2024") {
//         document.getElementById("datamgt-pass").textContent = "20%";
//         document.getElementById("datamgt-conditional-pass").textContent = "50%";
//         document.getElementById("datamgt-repeat").textContent = "30%";
//         document.getElementById("datamgt-passing-rate").textContent = "80%";
//     } else if (selectedYear === "2022-2023") {
//         document.getElementById("datamgt-pass").textContent = "10%";
//         document.getElementById("datamgt-conditional-pass").textContent = "60%";
//         document.getElementById("datamgt-repeat").textContent = "30%";
//         document.getElementById("datamgt-passing-rate").textContent = "70%";
//     }

//     // Example: Update data for SOFTDES subject
//     if (selectedYear === "2024-2025") {
//         document.getElementById("softdes-pass").textContent = "25%";
//         document.getElementById("softdes-conditional-pass").textContent = "50%";
//         document.getElementById("softdes-repeat").textContent = "25%";
//         document.getElementById("softdes-passing-rate").textContent = "75%";
//     } else if (selectedYear === "2023-2024") {
//         document.getElementById("softdes-pass").textContent = "30%";
//         document.getElementById("softdes-conditional-pass").textContent = "45%";
//         document.getElementById("softdes-repeat").textContent = "25%";
//         document.getElementById("softdes-passing-rate").textContent = "80%";
//     } else if (selectedYear === "2022-2023") {
//         document.getElementById("softdes-pass").textContent = "20%";
//         document.getElementById("softdes-conditional-pass").textContent = "55%";
//         document.getElementById("softdes-repeat").textContent = "25%";
//         document.getElementById("softdes-passing-rate").textContent = "70%";
//     }
// }