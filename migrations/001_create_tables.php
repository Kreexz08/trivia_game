<?php

function migrate()
{
    $db = \Numaa\GamePhp\Models\Database::getConnection();

    $queries = [
        "CREATE TABLE IF NOT EXISTS preguntas (
            id SERIAL PRIMARY KEY,
            texto TEXT NOT NULL,
            opciones TEXT NOT NULL,
            correcta VARCHAR(255) NOT NULL
        )",
        "CREATE TABLE IF NOT EXISTS scores (
            id SERIAL PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            score INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )",
        "INSERT INTO preguntas (texto, opciones, correcta) VALUES
        ('¿Cuál es la capital de Francia?', 'París|Londres|Berlín|Roma', 'París'),
        ('¿Cuánto es 5 + 7?', '10|12|14|16', '12'),
        ('¿Cuál es el océano más grande?', 'Atlántico|Pacífico|Índico|Ártico', 'Pacífico'),
        ('¿Quién escribió \"Cien años de soledad\"?', 'Gabriel García Márquez|Mario Vargas Llosa|Pablo Neruda|Octavio Paz', 'Gabriel García Márquez'),
        ('¿En qué año llegó el hombre a la luna?', '1965|1969|1971|1975', '1969'),
        ('¿Cuál es el planeta más cercano al sol?', 'Mercurio|Venus|Tierra|Marte', 'Mercurio'),
        ('¿Cuál es el elemento químico con el símbolo O?', 'Oxígeno|Oro|Osmio|Oganesón', 'Oxígeno'),
        ('¿Quién pintó la Mona Lisa?', 'Leonardo da Vinci|Vincent van Gogh|Pablo Picasso|Claude Monet', 'Leonardo da Vinci'),
        ('¿Cuál es el río más largo del mundo?', 'Nilo|Amazonas|Yangtsé|Misisipi', 'Amazonas'),
        ('¿En qué año comenzó la Segunda Guerra Mundial?', '1935|1939|1941|1945', '1939')"
    ];

    foreach ($queries as $query) {
        $db->exec($query);
    }
}

migrate();
