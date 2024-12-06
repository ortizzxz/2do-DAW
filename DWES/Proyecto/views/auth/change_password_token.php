<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambiar Contraseña</title>
</head>
<body>
    <h1>Cambiar Contraseña</h1>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>
    
    <form action="<?php echo BASE_URL; ?>?controller=Usuario&action=updatePasswordWithToken" method="POST">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
        <label for="new_password">Nueva Contraseña:</label>
        <input type="password" name="new_password" id="new_password" required>
        <br><br>
        <label for="confirm_password">Confirmar Contraseña:</label> 
        <input type="password" name="confirm_password" id="confirm_password" required>
        <br><br>
        <button type="submit">Cambiar Contraseña</button>
    </form>
</body>
</html>