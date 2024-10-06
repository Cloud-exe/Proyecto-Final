require('dotenv').config();
const express = require('express');
const sequelize = require('./config/config');
const Usuario = require('./models/Usuario');
const SolicitudIngreso = require('./models/SolicitudIngreso');
const cors = require("cors");

const app = express();
const port = process.env.PORT || 3000;
const bcrypt = require('bcrypt');

app.use(express.json());
app.use(cors());

// Ruta para crear un nuevo usuario
app.post('/usuarios', async (req, res) => {
    try {
        const { nombre, email, clase, nombrePersonaje, rol, password } = req.body;

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

        res.status(200).json({ mensaje: 'Inicio de sesión exitoso', usuario });
    } catch (error) {
        console.error('Error en el login:', error);
        res.status(500).send('Error en el servidor');
    }
});



// Endpoint para editar un usuario
app.post('/guardarPerfil', async (req, res) => {
    const { nombre, email, clase, nombrePersonaje, rol, password } = req.body;

    try {
        const usuario = await Usuario.findOne({ where: { email } });

        if (!usuario) {
            return res.status(404).json({ success: false, message: 'Usuario no encontrado' });
        }

        if (nombrePersonaje !== undefined) {
            usuario.nombrePersonaje = nombrePersonaje;
        }

        if (nombre !== undefined) {
            usuario.nombre = nombre;
        }
        if (clase !== undefined) {
            usuario.clase = clase;
        }
        if (rol !== undefined) {
            usuario.rol = rol;
        }

        if (password) {
            const hashPassword = await bcrypt.hash(password, 10); 
            usuario.password = hashPassword;
        }

        await usuario.save();

        return res.json({ success: true, message: 'Usuario actualizado exitosamente' });
    } catch (error) {
        console.error('Error al actualizar el usuario:', error);
        return res.status(500).json({ success: false, message: 'Error en el servidor' });
    }
});

// Ruta para guardar una nueva solicitud de ingreso
app.post('/solicitudes', async (req, res) => {
    try {
        const {
            nombrePersonaje,
            clase,
            especializacion,
            nivelObjeto,
            experiencia,
            disponibilidad,
            razonUnirse,
            aceptaTerminos,
        } = req.body;

        const nuevaSolicitud = await SolicitudIngreso.create({
            nombrePersonaje,
            clase,
            especializacion,
            nivelObjeto,
            experiencia,
            disponibilidad,
            razonUnirse,
            aceptaTerminos,
        });

        res.status(201).json({
            message: 'Solicitud de ingreso guardada correctamente.',
            solicitud: nuevaSolicitud,
        });
    } catch (error) {
        console.error(error);
        res.status(500).json({
            message: 'Error al guardar la solicitud de ingreso.',
            error: error.message,
        });
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
