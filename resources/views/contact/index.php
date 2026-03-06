<?php ob_start(); ?>
<h1>Contact</h1>
<form>
    <input type="text" placeholder="Name">
    <input type="email" placeholder="Email">
    <textarea placeholder="Message"></textarea>
    <button type="submit">Send</button>
</form>
<?php $content = ob_get_clean(); $title = 'Contact'; include __DIR__ . '/../layouts/app.php'; ?>
