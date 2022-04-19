// Start Users Dashboard Section
const userNotification = document.querySelector('.user-notification');
const closeNotification = document.querySelector('.close-notification');

if (closeNotification != null) {
  closeNotification.addEventListener('click', function () {
    userNotification.classList.add('active');
  });
}

// End Users Dashboard Section
