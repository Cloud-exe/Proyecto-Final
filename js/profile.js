// document.addEventListener('DOMContentLoaded', function() {
//     const usuario = localStorage.getItem('usuario');
    
//     if (!usuario) {
//         window.location.href = '/index.html';
//     }
// });

window.addEventListener('DOMContentLoaded', () => {
    const userData = JSON.parse(localStorage.getItem('usuario')); 
    if (!userData) {
        window.location.href = '/index.html';
    }
    // console.log(userData);
    document.getElementById('email').textContent = userData.usuario.email;
    document.getElementById('personaje').textContent = userData.usuario.nombrePersonaje;
    document.getElementById('rol').textContent = userData.usuario.rol;
    document.getElementById('nombrePersonaje').textContent = userData.usuario.nombrePersonaje;
});



const editButton = document.getElementById('editButton');
        const saveButton = document.getElementById('saveButton');
        const emailSpan = document.getElementById('email');
        const personajeSpan = document.getElementById('personaje');
        const rolSpan = document.getElementById('rol');
        const passwordSpan = document.getElementById('password');
    
        editButton.addEventListener('click', function () {
            emailSpan.innerHTML = `<input type="text" id="emailInput" value="${emailSpan.textContent}" class="bg-gray-800 text-white border border-yellow-500 rounded p-1 w-full">`;
            personajeSpan.innerHTML = `<input type="text" id="personajeInput" value="${personajeSpan.textContent}" class="bg-gray-800 text-white border border-yellow-500 rounded p-1 w-full">`;
            rolSpan.innerHTML = `<input type="text" id="rolInput" value="${rolSpan.textContent}" class="bg-gray-800 text-white border border-yellow-500 rounded p-1 w-full">`;
            passwordSpan.innerHTML = `<input type="text" id="passwordInput" value="${passwordSpan.textContent}" class="bg-gray-800 text-white border border-yellow-500 rounded p-1 w-full">`; // Cambiar `password.textContent` a `passwordSpan.textContent`
    
            saveButton.classList.remove('hidden');
        });
    
        saveButton.addEventListener('click', function () {
            const newEmail = document.getElementById('emailInput').value;
            const newPersonaje = document.getElementById('personajeInput').value;
            const newRol = document.getElementById('rolInput').value;
            const newPassword = document.getElementById('passwordInput').value;
    
            // Actualiza el contenido de los spans solo si no están vacíos
            emailSpan.textContent = newEmail || emailSpan.textContent;
            personajeSpan.textContent = newPersonaje || personajeSpan.textContent;
            rolSpan.textContent = newRol || rolSpan.textContent;
            passwordSpan.textContent = newPassword || passwordSpan.textContent;
    
            fetch(`${CONFIG.API_URL}/guardarPerfil`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ 
                    email: newEmail, 
                    nombrePersonaje: newPersonaje, 
                    rol: newRol, 
                    password: newPassword 
                }) // Usa las nuevas variables aquí
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Cambios guardados exitosamente');
                    } else {
                        alert('Hubo un error al guardar los cambios');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
    
            saveButton.classList.add('hidden');
        });