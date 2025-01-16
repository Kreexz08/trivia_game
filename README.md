# Trivia Game

Este es un juego de trivia desarrollado en PHP puro. Utiliza PostgreSQL como base de datos y Composer para la gestión de dependencias.

## Requisitos

- **XAMPP**: Versión 3.3.0
- **PHP**: Versión 8.4.1
- **Composer**: versión 2.8.4

## Paso 1: Configurar XAMPP

1. Descarga e instala XAMPP, asegurándote de utilizar la versión 3.3.0.
2. Inicia el servicio de Apache desde el panel de control de XAMPP.

## Paso 2: Configurar Composer

1. Descarga e instala Composer desde su sitio oficial.
2. Navega a la carpeta del proyecto en tu terminal.
3. Ejecuta el siguiente comando para instalar las dependencias del proyecto:

   ```bash
   composer install
    ```
## Paso 3: Configurar Variables de Entorno

1. Crea un archivo `.env` copiando el archivo de ejemplo:

   ```bash
   cp .env.example .env
    ```
2. Rellena los valores correspondientes en el archivo `.env`. Aquí tienes un ejemplo:

   ```plaintext
   DB_HOST=localhost
   DB_PORT=5432
   DB_NAME=trivia
   DB_USER=postgres
   DB_PASSWORD=12345678
   ```

## Paso 4: Configurar la Base de Datos

1. Conéctate a PostgreSQL y crea la base de datos `trivia` ejecutando el siguiente comando:

   ```sql
   CREATE DATABASE trivia;
   ```
2. Ejecuta la migración para crear las tablas necesarias en la base de datos con el siguiente comando:

   ```bash
   php migrate.php
   ```

## Paso 5: Ejecutar el Proyecto

1. Coloca tu proyecto en el directorio `htdocs` de XAMPP.
2. Accede a tu aplicación desde el navegador utilizando la siguiente URL: `http://localhost/game_php/public`


Con estos pasos, deberías poder configurar y ejecutar tu juego de trivia en PHP. 
