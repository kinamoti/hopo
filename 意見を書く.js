document.addEventListener('DOMContentLoaded', function() {
  const opinionForm = document.getElementById('opinionForm');
  const opinionsList = document.getElementById('opinions'); // opinionsListを取得

  opinionForm.addEventListener('submit', function(event) {
    event.preventDefault();
    
    const opinionInput = document.getElementById('opinionInput');
    const reazonInput = document.getElementById('reazonInput'); // reazonInputを正しく取得

    const newOpinionText = opinionInput.value;
    const newReazonText = reazonInput.value; // reazonInputの値を取得

    if (newOpinionText.trim() !== '' && newReazonText.trim() !== '') {
      saveOpinion(newOpinionText, newReazonText); // 新しい意見と説明・理由を保存
      const newOpinion = createOpinionElement({ opinion: newOpinionText, reazon: newReazonText }); // オブジェクトとして渡す
      opinionsList.appendChild(newOpinion);
      opinionInput.value = '';
      reazonInput.value = ''; // 入力欄をリセット
    }
  });

  function saveOpinion(opinion, reazon) {
    let opinions = JSON.parse(localStorage.getItem('opinions')) || [];
    opinions.push({ opinion, reazon }); // 意見と説明・理由をオブジェクトとして保存
    localStorage.setItem('opinions', JSON.stringify(opinions));
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

// 意見を書く.js

document.addEventListener('DOMContentLoaded', function() {
  const opinionForm = document.getElementById('opinionForm');

  opinionForm.addEventListener('submit', function(event) {
    event.preventDefault(); // デフォルトの送信を停止

    // フォームが送信された後の処理をここに記述

    window.location.href = '完了.html'; // 完了画面に遷移
  });

  // 他の処理...
});
