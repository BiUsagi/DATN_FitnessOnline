const closeModalExercise = document.querySelector('.close-modal-exercise');
    closeModalExercise.addEventListener('click', function() {
        const overflow = document.querySelector('.overflow');   
      
        overflow.classList.remove('show-modal');   
        location.reload(); 
    });

    
    document.querySelector('.btn-start-exercise').addEventListener('click', function() {
        const countdownElement = document.querySelector('.countdown');
        const videoElement = document.querySelector('.show-video video'); // Chỉ video hiện tại
        const startButton = document.querySelector('.btn-start-exercise');
        const overflowColLeft = document.querySelector('.overflow-col-left');
    
        // Ẩn nút start và phần overlay
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
    
                // Phát video đã chọn
                videoElement.play();
                videoElement.removeAttribute('controls');
            }
        }, 1000);
    });
    