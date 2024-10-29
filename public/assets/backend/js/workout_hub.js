const overflow = document.querySelector('.overflow');
const actionStart = document.querySelectorAll('.action-start i');
const closeModalExercise = document.querySelector('.close-modal-exercise');
actionStart.forEach(item =>{
    item.addEventListener('click', function() {
        overflow.classList.add('show-modal');    
    })
});

closeModalExercise.addEventListener('click', function() {
    overflow.classList.remove('show-modal');    
});

document.querySelector('.btn-start-exercise').addEventListener('click', function() {
    const countdownElement = document.querySelector('.countdown');
    const videos = document.querySelectorAll('.show-video video');
    const startButton = document.querySelector('.btn-start-exercise');
    const overflowColLeft = document.querySelector('.overflow-col-left');

    startButton.style.display = 'none';
    overflowColLeft.style.display = 'none';

    let countdown = 3;
    countdownElement.textContent = countdown;
    countdownElement.style.display = 'flex';

    const countdownInterval = setInterval(() => {
        countdown--;
        if (countdown > 0) {
            countdownElement.textContent = countdown;
        } else {
            clearInterval(countdownInterval);
            countdownElement.style.display = 'none';
 
            videos.forEach(video => {
                video.play();
                video.removeAttribute('controls');
            });
        }
    }, 1000);
});


