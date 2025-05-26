const countDownDate = new Date("Dec 20, 2025 15:37:25").getTime();

var x = setInterval(function () {
  var counter = document.getElementById("countdown");
  var now = new Date().getTime();
  var distance = countDownDate - now;

  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  counter.innerHTML =
    days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

  if (distance < 0) {
    clearInterval(x);
    counter.innerHTML = "Unfortunately, You arrived late!\nThe offer has ended";
  }
}, 1000);



const win = document.querySelector("#winner");
const loaderContent = document.querySelector(".loader-content");
const loader = document.querySelector(".loader");
const myModal = new bootstrap.Modal(document.getElementById("modal"), {
  keyboard: false,
  backdrop: "static",
});
const celebrationSound = document.getElementById("celebrationSound");

let confettiFrameId = null; // Store animation frame ID

function launchConfetti() {
  confetti({
    particleCount: 100,
    spread: 70,
    origin: { y: 0.6 },
  });

  const duration = 20000;
  const end = Date.now() + duration;

  function frame() {
    confetti({
      particleCount: 5,
      angle: 60,
      spread: 55,
      origin: { x: 0 },
    });
    confetti({
      particleCount: 5,
      angle: 120,
      spread: 55,
      origin: { x: 1 },
    });
    if (Date.now() < end) {
      confettiFrameId = requestAnimationFrame(frame);
    }
  }
  confettiFrameId = requestAnimationFrame(frame);
}

win.addEventListener("click", function () {
  startLoader();

  setTimeout(function () {
    loaderContent.style.display = "none";
    loader.style.display = "none";
    myModal.show();

    launchConfetti();
    celebrationSound.play();
  }, 4000);
});

// Function to stop confetti and music, and close modal
function stopCelebration() {
  // Stop confetti animation
  if (confettiFrameId) {
    cancelAnimationFrame(confettiFrameId);
    confettiFrameId = null;
  }
  // Stop confetti 
  if (typeof confetti === 'function' && confetti.reset) {
    confetti.reset();
  }
  // Pause and reset the celebration sound
  celebrationSound.pause();
  celebrationSound.currentTime = 0;
  // Hide the modal
  myModal.hide();
}

// Attach stopCelebration to modal close button
const modalCloseBtn = document.querySelector('#modal .btn-close');
if (modalCloseBtn) {
  modalCloseBtn.addEventListener('click', stopCelebration);
}




