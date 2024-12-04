<h2>Mis Reservas</h2>
<?php if (isset($error)): ?>
    <p style="color: red;"><?= $error ?></p>
<?php endif; ?>
<?php if (empty($reservas)): ?>
    <p>No tienes reservas actualmente.</p>
<?php else: ?>
    <table>
        <tr>
            <th>Fila</th>
            <th>Número</th>
            <th>Fecha de Reserva</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($reservas as $reserva): ?>
        <tr>
            <td><?= $reserva['fila'] ?></td>
            <td><?= $reserva['numero'] ?></td>
            <td><?= $reserva['fecha_reserva'] ?></td>
            <td>
                <a href="/reservas/cancelar/<?= $reserva['id'] ?>" onclick="return confirm('¿Estás seguro de que quieres cancelar esta reserva?');">Cancelar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
<a href="/reservas/crear">Hacer nueva reserva</a>