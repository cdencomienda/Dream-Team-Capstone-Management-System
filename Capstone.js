function addComment() {
    // Get the comments section container
    var commentsSection = document.getElementById('commentsSection');
    var sendIcon = document.createElement('i');
     sendIcon.classList.add('fa-solid', 'fa-paper-plane');
     
    // Clone the existing comment section (optional, if needed)
    var newComment = document.createElement('div');
    newComment.classList.add('panel-comments');
  
    // Create the new elements
    var newHeading = document.createElement('h3');
    newHeading.textContent = 'Comment # ' + (commentsSection.children.length + 1);
  
    var newTextArea = document.createElement('textarea');
    newTextArea.classList.add('comments-input');
  
    // Create the send button
    var sendButton = document.createElement('button');
    sendButton.innerHTML = sendIcon.outerHTML;
    sendButton.classList.add('send-button');  // Add a class for styling (optional)
  
    // Append the new elements to the new comment div
    
    newComment.appendChild(newHeading);
    newComment.appendChild(newTextArea);
    newComment.appendChild(sendButton);  // Add the button here
  
    // Append the new comment div to the comments section container
    commentsSection.appendChild(newComment);

    setTimeout(function() {
      commentsSection.scrollTo({ top: newComment.offsetTop, behavior: 'smooth' });
    }, 10); // Adjust delay if needed (in milliseconds)
  }
  