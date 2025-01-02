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

    const isAdmin = document.body.classList.contains('admin');
    if (isAdmin) {
        document.querySelectorAll('.trending-item, .upcoming-item').forEach(item => {
            item.addEventListener('click', () => {
                const trendingEditMenu = document.getElementById('trending-edit-menu');
                const upcomingEditMenu = document.getElementById('upcoming-edit-menu');
                if (trendingEditMenu.style.display === 'block' || upcomingEditMenu.style.display === 'block') {
                    document.querySelectorAll('.trending-item, .upcoming-item').forEach(i => i.classList.remove('selected'));
                    item.classList.add('selected');
                }
            });
        });
    }
});

function toggleEditMenu(sliderType) {
    const editMenu = document.getElementById(`${sliderType}-edit-menu`);
    editMenu.style.display = editMenu.style.display === 'block' ? 'none' : 'block';
}

function addTrendingItem() {
    const formData = new FormData(document.getElementById('trending-edit-form'));
    fetch('php/save_image.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            const image = data.imageUrl;
            const title = formData.get('title');
            const slider = document.querySelector('.trending-slider');
            const newItem = document.createElement('div');
            newItem.classList.add('trending-item');
            newItem.innerHTML = `<img src="${image}" alt="${title}"><p>${title}</p>`;
            slider.appendChild(newItem);
        } else {
            alert(data.message);
        }
    });
}

function updateTrendingItem() {
    const formData = new FormData(document.getElementById('trending-edit-form'));
    fetch('php/save_image.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            const image = data.imageUrl;
            const title = formData.get('title');
            const selectedItem = document.querySelector('.trending-item.selected');
            if (selectedItem) {
                selectedItem.querySelector('img').src = image;
                selectedItem.querySelector('p').textContent = title;
            }
        } else {
            alert(data.message);
        }
    });
}

function deleteTrendingItem() {
    const selectedItem = document.querySelector('.trending-item.selected');
    if (selectedItem) {
        const formData = new FormData();
        formData.append('image', selectedItem.querySelector('img').src);
        fetch('php/delete_image.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                selectedItem.remove();
            } else {
                alert(data.message);
            }
        });
    }
}

function addUpcomingItem() {
    const formData = new FormData(document.getElementById('upcoming-edit-form'));
    fetch('php/save_image.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            const image = data.imageUrl;
            const title = formData.get('title');
            const slider = document.querySelector('.upcoming-slider');
            const newItem = document.createElement('div');
            newItem.classList.add('trending-item');
            newItem.innerHTML = `<img src="${image}" alt="${title}"><p>${title}</p>`;
            slider.appendChild(newItem);
        } else {
            alert(data.message);
        }
    });
}

function updateUpcomingItem() {
    const formData = new FormData(document.getElementById('upcoming-edit-form'));
    fetch('php/save_image.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            const image = data.imageUrl;
            const title = formData.get('title');
            const selectedItem = document.querySelector('.trending-item.selected');
            if (selectedItem) {
                selectedItem.querySelector('img').src = image;
                selectedItem.querySelector('p').textContent = title;
            }
        } else {
            alert(data.message);
        }
    });
}

function deleteUpcomingItem() {
    const selectedItem = document.querySelector('.trending-item.selected');
    if (selectedItem) {
        const formData = new FormData();
        formData.append('image', selectedItem.querySelector('img').src);
        fetch('php/delete_image.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                selectedItem.remove();
            } else {
                alert(data.message);
            }
        });
    }
}

document.addEventListener('DOMContentLoaded', () => {
    const isAdmin = document.body.classList.contains('admin');
    if (isAdmin) {
        document.querySelectorAll('.trending-item, .upcoming-item').forEach(item => {
            item.addEventListener('click', () => {
                const trendingEditMenu = document.getElementById('trending-edit-menu');
                const upcomingEditMenu = document.getElementById('upcoming-edit-menu');
                if (trendingEditMenu.style.display === 'block' || upcomingEditMenu.style.display === 'block') {
                    document.querySelectorAll('.trending-item, .upcoming-item').forEach(i => i.classList.remove('selected'));
                    item.classList.add('selected');
                }
            });
        });
    }
});
