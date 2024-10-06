// const { Sequelize } = require('sequelize');
// require('dotenv').config();

// const sequelize = new Sequelize(process.env.DB_NAME, process.env.DB_USER, process.env.DB_PASSWORD, {
//     host: process.env.POSTGRES_HOST,
//     port: process.env.DB_PORT,
//     dialect: 'postgres', 
// });

// module.exports = sequelize;


const { Sequelize } = require('sequelize');
require('dotenv').config();

const sequelize = new Sequelize(process.env.DB_NAME, process.env.DB_USER, process.env.DB_PASSWORD, {
    host: process.env.DB_HOST,
    port: process.env.DB_PORT,
    dialect: 'postgres',
    dialectOptions: {
        ssl: {
            require: true, // Si necesitas SSL
            rejectUnauthorized: false // Cambia a true si quieres verificar el certificado
        }
    }
});

// Probar la conexión
sequelize.authenticate()
    .then(() => {
        console.log('Conexión a la base de datos establecida con éxito.');
    })
    .catch(err => {
        console.error('No se pudo conectar a la base de datos:', err);
    });

module.exports = sequelize;
