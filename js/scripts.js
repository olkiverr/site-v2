document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('.trending-slider');
    const leftButton = document.querySelector('.slider-button.left');
    const rightButton = document.querySelector('.slider-button.right');

    leftButton.addEventListener('click', function() {
        slider.scrollBy({
            left: -200,
            behavior: 'smooth'
        });
    });

    rightButton.addEventListener('click', function() {
        slider.scrollBy({
            left: 200,
            behavior: 'smooth'
        });
    });

    const upcomingSlider = document.querySelector('.upcoming-slider');
    const upcomingLeftButton = document.querySelector('.upcoming-slider-container .slider-button.left');
    const upcomingRightButton = document.querySelector('.upcoming-slider-container .slider-button.right');

    upcomingLeftButton.addEventListener('click', function() {
        upcomingSlider.scrollBy({
            left: -200,
            behavior: 'smooth'
        });
    });

    upcomingRightButton.addEventListener('click', function() {
        upcomingSlider.scrollBy({
            left: 200,
            behavior: 'smooth'
        });
    });

    // Remove CRUD-related JavaScript code
});
