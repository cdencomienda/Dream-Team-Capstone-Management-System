document.addEventListener('profile', function () {
    const editProfileBtn = document.querySelector('.editprofileBtn');
    const logoutBtn = document.querySelector('.logoutBtn');
  
    editProfileBtn.addEventListener('click', function (event) { 
      event.preventDefault(); 
    }); 
  });

  const table_rows = document.querySelectorAll('tbody tr');
  const table_headings = document.querySelectorAll('thead th');

  
  // 2. Sorting | Ordering data of HTML table
  
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
    window.location.assign("CourseCreate.php")
  } 
  function logOUT(){
    window.location.assign("LoginSignup.php")
  }
  function Schedule(){
    window.location.assign("AdminDefenseschedule.php")
  }
  

  document.getElementById('editProfileBtn').addEventListener('click', function() {
    var overlay = document.getElementById("editProfileOverlay");
    overlay.style.display = "block";
  });

//   $(document).ready(function(){
//     // Handle click on delete button
//     $('.delete-btn').click(function(){
//         // Retrieve user ID from the row
//         var userId = $(this).closest('tr').find('td:first').text();

//         // Confirm deletion with user
//         if (confirm("Are you sure you want to delete this user?")) {
//             // Perform delete operation using AJAX
//             $.ajax({
//                 url: 'delete&edituser.php',
//                 type: 'POST',
//                 data: {userId: userId},
//                 success: function(response){
//                     // Reload the page after successful deletion
//                     window.location.reload();
//                 },
//                 error: function(xhr, status, error) {
//                     // Handle errors
//                     console.error(xhr.responseText);
//                 }
//             });
//         }
//     });

//     // Handle click on save changes button
//     $('#saveEditBtn').click(function(){
//         // Retrieve edited user data
//         var userId = $('#userId').val(); // Assuming this is an input field for editing
//         var userType = $('#userType').val(); 

//         // Perform update operation using AJAX
//         $.ajax({
//             url: 'delete&edituser.php',
//             type: 'POST',
//             data: {
//                 userId: userId,
//                 userType: userType 
//             },
//             success: function(response){
//                 // Reload the page after successful edit
//                 window.location.reload();
//             },
//             error: function(xhr, status, error) {
//                 // Handle errors
//                 console.error(xhr.responseText);
//             }
//         });
//     });
// });


  document.getElementById('editProfileBtn').addEventListener('click', function() {
    var overlay = document.getElementById("editProfileOverlay");
    overlay.style.display = "block";
  });
  
  function closeEditform(){
    document.getElementById('editProfileOverlay').style.display = 'none';
    document.getElementById('menuBtn').style.display = 'block'; // Show the menuBtn element
  }
   
  function Back(){
    document.getElementById('menuBtn').style.display = 'none';
  }
  
  window.onclick = function(event) {
    var overlay = document.getElementById("editProfileOverlay");
    if (event.target == overlay) {
        overlay.style.display = "none";
    }
  }
  
  const profile = document.querySelector('.profile');
  const editprofileBtn = document.querySelector('.editprofileBtn');
  
  profile.addEventListener('click', function () {
    const toggleMenu = document.querySelector('.menu');
    toggleMenu.classList.toggle('active');
  });
  