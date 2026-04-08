<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<div class="card">
    <h2>Login</h2>

    
    <?php if(session('error')): ?>
        <div class="error"><?php echo e(session('error')); ?></div>
    <?php endif; ?>

    <form method="POST" action="/login">
        <?php echo csrf_field(); ?>

        <input type="email" name="email" placeholder="Email" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>
    </form>

    <div class="footer">
        Belum punya akun? <a href="#">Register</a>
    </div>
</div><?php /**PATH C:\Users\Lenovo\Downloads\kuliah pens\FILE TUGAS\Rincian Tugas\ASpire\ASpire-2026-main\ASpire-2026-main\w3\LibrAspire2\resources\views/login.blade.php ENDPATH**/ ?>