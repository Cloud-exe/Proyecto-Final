tailwind.config = {
    theme: {
        extend: {
            fontFamily: {
                'cinzel': ['Cinzel', 'serif'],
            }
        }
    }
};


document.addEventListener('DOMContentLoaded', function () {
    const userMenuButton = document.getElementById('user-menu-button');
    const dropdown = document.getElementById('dropdown-menu');
    const loginButton = document.getElementById('userLog');
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

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

    menuToggle.addEventListener('click', function () {
        mobileMenu.classList.toggle('hidden');
    });

    window.addEventListener('click', function (event) {
        if (!menuToggle.contains(event.target) && !mobileMenu.contains(event.target)) {
            mobileMenu.classList.add('hidden');
        }
    });

    const mobileMenuLinks = mobileMenu.querySelectorAll('a');
    mobileMenuLinks.forEach(link => {
        link.addEventListener('click', function () {
            mobileMenu.classList.add('hidden');
        });
    });
});

