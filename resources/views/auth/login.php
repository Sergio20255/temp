<?php ob_start(); ?>
<h1>Login</h1>
<form><input type="email" placeholder="Email"><input type="password" placeholder="Password"><button>Login</button></form>
<?php $content = ob_get_clean(); $title = 'Login'; include __DIR__ . '/../layouts/app.php'; ?>
