<?php ob_start(); ?>
<h2>Ranking de Mejores Puntuaciones</h2>
<table>
    <thead>
        <tr>
            <th>Posición</th>
            <th>Jugador</th>
            <th>Puntuación</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($scores as $index => $score): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= htmlspecialchars($score['username']) ?></td>
                <td><?= $score['score'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php $content = ob_get_clean(); require 'layout.php'; ?>
