<?php ob_start(); ?>
<h1>Create account</h1>
<form><input type="text" placeholder="Name"><input type="email" placeholder="Email"><input type="password" placeholder="Password"><button>Register</button></form>
<?php $content = ob_get_clean(); $title = 'Register'; include __DIR__ . '/../layouts/app.php'; ?>
