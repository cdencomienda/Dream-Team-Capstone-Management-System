document.addEventListener('profile', function () {
    const editProfileBtn = document.querySelector('.editprofileBtn');
    const logoutBtn = document.querySelector('.logoutBtn');
  
    editProfileBtn.addEventListener('click', function (event) { 
      event.preventDefault(); 
    }); 
  });


  function Users(){
    window.location.assign("Adminuser.php")
  }
  function openArchive(){
    window.location.assign("AdminHome.php")
  }

  function logOUT(){
    window.location.assign("LoginSignup.php")
  }

// pang delete ng gago
$(document).ready(function(){
  // Handle click on edit button
  $('.edit-btn').click(function(){
      // Retrieve user data from the row
      var rowData = $(this).closest('tr').find('td').map(function(){
          return $(this).text();
      }).get();

      // Populate the modal/popup with user data for editing
      $('#userId').text(rowData[0]); // Display user ID
      $('#userType').val(rowData[1]); // Set user type in input field 

      // Display the modal/popup
      $('#editDeleteModal').show();
  });

  // Handle click on delete button
  $('.delete-btn').click(function(){
      // Retrieve user ID from the row
      var userId = $(this).closest('tr').find('td:first').text();

      // Confirm deletion with user
      if (confirm("Are you sure you want to delete this user?")) {
          // Perform delete operation using AJAX
          $.ajax({
              url: 'delete_user.php',
              type: 'POST',
              data: {userId: userId},
              success: function(response){
                  // Reload the page or update the table as needed
                  // Example: window.location.reload();
              },
              error: function(xhr, status, error) {
                  // Handle errors
                  console.error(xhr.responseText);
              }
          });
      }
  });

  // Handle click on save changes button
  $('#saveEditBtn').click(function(){
      // Retrieve edited user data
      var userId = $('#userId').text();
      var userType = $('#userType').val(); 

      // Perform update operation using AJAX
      $.ajax({
          url: 'edit_user.php',
          type: 'POST',
          data: {
              userId: userId,
              userType: userType 
          },
          success: function(response){
              // Handle success response
              // Example: window.location.reload();
          },
          error: function(xhr, status, error) {
              // Handle errors
              console.error(xhr.responseText);
          }
      });
  });

  // Close modal/popup when close button is clicked
  $('.close-modal-btn').click(function(){
      $('#editDeleteModal').hide();
  });
});



  document.getElementById('editProfileBtn').addEventListener('click', function() {
    var overlay = document.getElementById("editProfileOverlay");
    overlay.style.display = "block";
  });
  
  function closeEditform(){
    document.getElementById('editProfileOverlay').style.display = 'none';
    document.getElementById('menuBtn').style.display = 'block';
    location.reload();
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
  