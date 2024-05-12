// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("addScheduleBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
function createDefenseContainer() {
  // Gather input values
  const schedTitle = document.getElementById('schedTitle').value;
  const time = document.getElementById('time').value;
  const date = document.getElementById('date').value;
  
  const groupName = document.getElementById('GroupName').value;
  // Create new defense schedule container
  const defenseContainer = document.createElement('div');
  defenseContainer.classList.add('DefenseScheduleCont');
  defenseContainer.innerHTML = `
      <div class="SchedTitle">
          <h2>${schedTitle}</h2>
      </div>
      <div class="SchedDetails">
          time: ${time}<br>
          date: ${date}<br>
          group name: ${groupName}<br>
      </div>
      <div class="DocumentStatus">
          Status: ?????
      </div>
  `;

  // Check if a new row needs to be created
  let lastRow = document.querySelector('.ScheduleRow:last-child');
  if (!lastRow || lastRow.children.length === 4) {
      lastRow = document.createElement('div');
      lastRow.classList.add('ScheduleRow');
      document.getElementById('scheduleContainer').appendChild(lastRow);
  }

  // Append the new container to the last row
  lastRow.appendChild(defenseContainer);

  // Scroll to the bottom to show the newly added row
  
}   
 
