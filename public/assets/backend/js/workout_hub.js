const closeModalExercise = document.querySelector('.close-modal-exercise');
    closeModalExercise.addEventListener('click', function() {
        const overflow = document.querySelector('.overflow');   
      
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