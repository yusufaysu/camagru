function addComment() {
    const commentText = document.getElementById("commentText").value;
    
    if (commentText.trim() !== "") {
        const commentDiv = document.createElement("div");
        commentDiv.className = "comment";
        commentDiv.textContent = "Kullanıcı: " + commentText;
        
        const commentsContainer = document.querySelector(".comments");
        commentsContainer.appendChild(commentDiv);
        
        document.getElementById("commentText").value = "";
    }
}

document.addEventListener("DOMContentLoaded", function() {
    const likeButtons = document.querySelectorAll(".like-button");
  
    likeButtons.forEach(button => {
      button.addEventListener("click", function() {
        const likesElement = button.previousElementSibling;
        const currentLikes = parseInt(likesElement.textContent);
        likesElement.textContent = currentLikes + 1;
      });
    });
  });
  