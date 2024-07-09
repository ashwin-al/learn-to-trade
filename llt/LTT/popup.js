document.addEventListener('DOMContentLoaded', function() {
    var popup = document.querySelector('.popup');
    var okButton = document.querySelector('.ok-button');
    var cancelButton = document.querySelector('.cancel-button');
    var closeButton = document.querySelector('.close');

    popup.addEventListener('click', function() {
        popup.classList.toggle('show');
    });

    okButton.addEventListener('click', function() {
        window.location.href = 'signup.html';
    });

    cancelButton.addEventListener('click', function() {
        popup.classList.toggle('show');
    });

    closeButton.addEventListener('click', function() {
        popup.classList.toggle('show');
    });
});