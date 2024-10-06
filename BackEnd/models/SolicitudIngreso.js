const { Model, DataTypes } = require('sequelize');
const sequelize = require('../config/config');

class SolicitudIngreso extends Model {}

SolicitudIngreso.init({
    nombrePersonaje: {
        type: DataTypes.STRING,
        allowNull: false,
    },
    clase: {
        type: DataTypes.ENUM(
            'guerrero', 
            'paladin', 
            'cazador', 
            'picaro', 
            'sacerdote', 
            'chaman', 
            'mago', 
            'brujo', 
            'monje', 
            'druida', 
            'cazador de demonios', 
            'caballero de la muerte'
        ),
        allowNull: false,
    },
    especializacion: {
        type: DataTypes.STRING,
        allowNull: false,
    },
    nivelObjeto: {
        type: DataTypes.INTEGER,
        allowNull: false,
        validate: {
            min: 1,
            max: 500,
        },
    },
    experiencia: {
        type: DataTypes.TEXT,
        allowNull: false,
    },
    disponibilidad: {
        type: DataTypes.STRING,
        allowNull: false,
    },
    razonUnirse: {
        type: DataTypes.TEXT,
        allowNull: false,
    },
    aceptaTerminos: {
        type: DataTypes.BOOLEAN,
        allowNull: false,
        defaultValue: false,
    },
}, {
    sequelize,
    modelName: 'SolicitudIngreso',
    tableName: 'solicitudes_ingreso',
    timestamps: true,
});

module.exports = SolicitudIngreso;
