document.addEventListener('DOMContentLoaded', function() {
  const opinionsList = document.getElementById('opinions');

  function loadOpinions() {
    const opinions = JSON.parse(localStorage.getItem('opinions')) || [];
    opinions.reverse(); 

    opinions.forEach(function(opinionData) {
      const opinionElement = createOpinionElement(opinionData);
      opinionsList.appendChild(opinionElement);
    });
  }

  function createOpinionElement(opinionData) {
    const opinionDiv = document.createElement('div');
    opinionDiv.classList.add('opinion');

    const opinionPara = document.createElement('p');
    opinionPara.textContent = `意見: ${opinionData.opinion}`;

    const reazonPara = document.createElement('p');
    reazonPara.textContent = `詳しい説明・理由: ${opinionData.reazon}`;

    const likeBtn = document.createElement('button');
    likeBtn.classList.add('like-btn');
    likeBtn.textContent = 'いいね！';
    likeBtn.addEventListener('click', function() {
      toggleLike(likeBtn);
    });

    const likesCount = document.createElement('span');
    likesCount.textContent = '0';
    let likes = 0;

    opinionDiv.appendChild(opinionPara);
    opinionDiv.appendChild(reazonPara);
    opinionDiv.appendChild(likeBtn);
    opinionDiv.appendChild(likesCount);

    function toggleLike(button) {
      const hasLiked = button.classList.contains('liked');
      
      if (!hasLiked) {
        button.classList.add('liked');
        likes++;
        likesCount.textContent = likes;
      } else {
        button.classList.remove('liked');
        likes--;
        likesCount.textContent = likes;
      }

      button.disabled = false;
    }

    return opinionDiv;
  }

  loadOpinions();
});
