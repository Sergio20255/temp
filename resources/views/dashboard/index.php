<?php ob_start(); ?>
<h1>User Dashboard</h1>
<p>View conversions, usage limits, API tokens, and billing profile.</p>
<?php $content = ob_get_clean(); $title = 'Dashboard'; include __DIR__ . '/../layouts/app.php'; ?>
