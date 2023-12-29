document.addEventListener('DOMContentLoaded', function() {
  const opinionForm = document.getElementById('opinionForm');
  const opinionsList = document.getElementById('opinions');

  opinionForm.addEventListener('submit', function(event) {
    event.preventDefault();
    
    const opinionInput = document.getElementById('opinionInput');
    const newOpinionText = opinionInput.value;

    if (newOpinionText.trim() !== '') {
      saveOpinion(newOpinionText);
      const newOpinion = createOpinionElement(newOpinionText);
      opinionsList.appendChild(newOpinion);
      opinionInput.value = '';
    }
  });

  function saveOpinion(opinion) {
    let opinions = JSON.parse(localStorage.getItem('opinions')) || [];
    opinions.push(opinion);
    localStorage.setItem('opinions', JSON.stringify(opinions));
  }

  function createOpinionElement(opinionText) {
    // 以前のコードと同じ
  }
});
