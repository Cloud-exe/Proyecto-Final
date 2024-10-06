require('dotenv').config();
const express = require('express');
const sequelize = require('./config/config');
const Usuario = require('./models/Usuario');

const app = express();
const port = process.env.PORT || 3000;

app.use(express.json());

// Ruta para crear un nuevo usuario
app.post('/usuarios', async (req, res) => {
    try {
        const { nombre, email } = req.body;
        const nuevoUsuario = await Usuario.create({ nombre, email });
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

// Sincronizar la base de datos y arrancar el servidor
const startServer = async () => {
    try {
        await sequelize.authenticate();
        console.log('Conexión a la base de datos establecida.');
        await sequelize.sync({ force: true }); // Cambia a false si no quieres que se reemplacen las tablas
        console.log('Tablas sincronizadas.');

        app.listen(port, () => {
            console.log(`Servidor escuchando en http://localhost:${port}`);
        });
    } catch (error) {
        console.error('No se pudo conectar a la base de datos:', error);
    }
};

startServer();
