<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?php echo htmlspecialchars($usuario->getId()); ?></td>
                <td><?php echo htmlspecialchars($usuario->getNombre()); ?></td>
                <td><?php echo htmlspecialchars($usuario->getEmail()); ?></td>
                <td>
                    <a href="<?php echo BASE_URL; ?>?controller=Usuario&action=reenviarToken&user_id=<?php echo $usuario->getId(); ?>">
                        Reenviar Token
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
