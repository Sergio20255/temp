<?php ob_start(); ?>
<h1>One-Click Installer</h1>
<ol>
    <li>Step 1: Server requirement check</li>
    <li>Step 2: Database configuration</li>
    <li>Step 3: Admin account creation</li>
    <li>Step 4: System setup</li>
</ol>
<?php $content = ob_get_clean(); $title = 'Installer'; include __DIR__ . '/../layouts/app.php'; ?>
