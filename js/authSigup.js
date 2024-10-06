document.addEventListener('DOMContentLoaded', function() {
    const usuario = localStorage.getItem('usuario');
    
    if (usuario) {
        window.location.href = '/index.html';
    }
});
document.getElementById('registerForm').addEventListener('submit', async (event) => {
    event.preventDefault();

    const nombre = document.getElementById('nombre').value;
    const email = document.getElementById('email').value;
    const clase = document.getElementById('clase').value;
    const nombrePersonaje = document.getElementById('nombrePersonaje').value;
    const rol = document.getElementById('rol').value;
    const password = document.getElementById('password').value;


    try {
        const response = await fetch(`${CONFIG.API_URL}/usuarios`, {

            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ nombre, email, clase, nombrePersonaje, rol, password }),
        });

        if (response.ok) {
            const nuevoUsuario = await response.json();
            alert('Usuario creado: ' + JSON.stringify(nuevoUsuario));
            document.getElementById('registerForm').reset();
            localStorage.setItem('usuario', JSON.stringify(nuevoUsuario));
            window.location.href = '/index.html';
        } else {
            const error = await response.json();
            alert('Error: ' + error.error);
        }
    } catch (error) {
        console.error('Error al crear el usuario:', error);
        alert('Error al crear el usuario. Por favor, intenta de nuevo.');
    }
});
