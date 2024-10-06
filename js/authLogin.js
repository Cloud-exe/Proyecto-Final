document.addEventListener('DOMContentLoaded', function() {
    const usuario = localStorage.getItem('usuario');
    
    if (usuario) {
        window.location.href = '/index.html';
    }
});

document.getElementById('loginForm').addEventListener('submit', async (event) => {
    event.preventDefault(); 
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    try {
        const response = await fetch(`${CONFIG.API_URL}/login`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ email, password }),
        });

        if (response.ok) {
            const usuario = await response.json();
            alert(usuario.mensaje);
            localStorage.setItem('usuario', JSON.stringify(usuario));
            window.location.href = '/index.html'; 
        } else {
            const error = await response.json();
            alert('Error: ' + error.error);
        }
    } catch (error) {
        console.error('Error al iniciar sesión:', error);
        alert('Error en el servidor. Por favor, intenta de nuevo.');
    }
});


