tailwind.config = {
    theme: {
        extend: {
            fontFamily: {
                'cinzel': ['Cinzel', 'serif'],
            }
        }
    }
};

// document.getElementById('mobile-menu-button').addEventListener('click', function() {
//     var menuItems = document.getElementById('menu-items');
//     menuItems.classList.toggle('hidden');
// });


document.addEventListener('DOMContentLoaded', function () {
    const userMenuButton = document.getElementById('user-menu-button');
    const dropdown = document.getElementById('dropdown-menu');
    const loginButton = document.getElementById('userLog');
    
    const user = localStorage.getItem('usuario');

    if (user) {
        userMenuButton.parentElement.classList.remove('hidden');
        loginButton.classList.add('hidden');

        
    } else {
        userMenuButton.parentElement.classList.add('hidden');
        loginButton.classList.remove('hidden');
    }

    userMenuButton.addEventListener('click', function () {
        dropdown.classList.toggle('hidden');
    });

    window.addEventListener('click', function (event) {
        if (!userMenuButton.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
});

document.getElementById('user-menu-item-2').addEventListener('click', function (event) {
    event.preventDefault();

    localStorage.removeItem('usuario');

    window.location.href = '/index.html';
});

