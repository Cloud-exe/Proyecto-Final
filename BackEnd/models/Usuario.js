const { Model, DataTypes } = require('sequelize');
const sequelize = require('../config/config');

class Usuario extends Model {}

Usuario.init({
    nombre: {
        type: DataTypes.STRING,
        allowNull: false,
    },
    email: {
        type: DataTypes.STRING,
        allowNull: false,
        unique: true,
    },
    clase: {
        type: DataTypes.ENUM('Guerrero', 'Paladín', 'Sacerdote'),
        allowNull: false,
    },
    nombrePersonaje: {
        type: DataTypes.STRING,
        allowNull: false,
    },
    rol: {
        type: DataTypes.ENUM('DPS', 'Tanque', 'Healer'),
        allowNull: false,
    },
    password: {
        type: DataTypes.STRING,
        allowNull: false,
    }
}, {
    sequelize,
    modelName: 'Usuario',
    tableName: 'usuarios',
    timestamps: true,
});

module.exports = Usuario;
