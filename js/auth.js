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
            alert(usuario.mensaje); // Mensaje de éxito
            localStorage.setItem('usuario', JSON.stringify(usuario)); // Guarda la información del usuario en localStorage
            window.location.href = '/index.html'; // Redirige al índice
        } else {
            const error = await response.json();
            alert('Error: ' + error.error); // Muestra el mensaje de error
        }
    } catch (error) {
        console.error('Error al iniciar sesión:', error);
        alert('Error en el servidor. Por favor, intenta de nuevo.');
    }
});