const { Model, DataTypes } = require('sequelize');
const sequelize = require('../config/config'); // Ajusta la ruta si es necesario

class Usuario extends Model {}

// Define el modelo
Usuario.init({
    nombre: {
        type: DataTypes.STRING,
        allowNull: false, // Asegúrate de que este campo sea obligatorio
    },
    email: {
        type: DataTypes.STRING,
        allowNull: false, // Asegúrate de que este campo sea obligatorio
        unique: true, // Evitar correos duplicados
    },
}, {
    sequelize, // La instancia de sequelize
    modelName: 'Usuario', // Nombre del modelo
    tableName: 'usuarios', // Nombre de la tabla en la base de datos
    timestamps: true, // Si quieres usar createdAt y updatedAt
});

// Exportar el modelo
module.exports = Usuario;
