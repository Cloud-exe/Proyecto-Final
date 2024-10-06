require('dotenv').config();
const express = require('express');
const sequelize = require('./config/config');
const Usuario = require('./models/Usuario');
const cors = require("cors");

const app = express();
const port = process.env.PORT || 3000;
const bcrypt = require('bcrypt');

app.use(express.json());
app.use(cors());
// app.use(bcrypt());

// Ruta para crear un nuevo usuario
app.post('/usuarios', async (req, res) => {
    try {
        const { nombre, email, clase, nombrePersonaje, rol, password } = req.body;

        // Asegúrate de que se proporcionen los datos necesarios
        if (!nombre || !email || !clase || !nombrePersonaje || !rol || !password) {
            return res.status(400).json({ error: 'Faltan datos requeridos: nombre, email, clase, nombrePersonaje, rol y password' });
        }
        const hashPassword = await bcrypt.hash(password, 10);

        const nuevoUsuario = await Usuario.create({ nombre, email, clase, nombrePersonaje, rol, password: hashPassword });
        res.status(201).json(nuevoUsuario);
    } catch (error) {
        console.error('Error al crear el usuario:', error);
        res.status(500).send('Error al crear el usuario');
    }
});


// Ruta para obtener todos los usuarios
app.get('/usuarios', async (req, res) => {
    try {
        const usuarios = await Usuario.findAll(); 
        res.json(usuarios);
    } catch (error) {
        console.error('Error al obtener usuarios:', error);
        res.status(500).send('Error en el servidor');
    }
});

// Ruta para iniciar sesión


app.post('/login', async (req, res) => {
    const { email, password } = req.body;

    // Asegúrate de que se proporcionen los datos necesarios
    if (!email || !password) {
        return res.status(400).json({ error: 'Faltan datos requeridos: email y password' });
    }

    try {
        const usuario = await Usuario.findOne({ where: { email } });

        if (!usuario) {
            return res.status(401).json({ error: 'Credenciales incorrectas' });
        }

        const match = await bcrypt.compare(password, usuario.password);

        if (!match) {
            return res.status(401).json({ error: 'Credenciales incorrectas' });
        }

        // Autenticación exitosa
        res.status(200).json({ mensaje: 'Inicio de sesión exitoso', usuario });
    } catch (error) {
        console.error('Error en el login:', error);
        res.status(500).send('Error en el servidor');
    }
});


// Sincronizar la base de datos y arrancar el servidor
const startServer = async () => {
    try {
        await sequelize.authenticate();
        console.log('Conexión a la base de datos establecida.');
        
        await sequelize.sync({ force: false });
        console.log('Tablas sincronizadas.');

        app.listen(port, () => {
            console.log(`Servidor escuchando en http://localhost:${port}`);
        });
    } catch (error) {
        console.error('No se pudo conectar a la base de datos:', error);
    }
};

startServer();
