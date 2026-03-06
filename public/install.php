<?php

declare(strict_types=1);

use App\Services\Installer\RequirementChecker;

require_once __DIR__ . '/../vendor/autoload.php';

$step = (int) ($_GET['step'] ?? 1);
$checker = new RequirementChecker();
$requirements = $checker->check();

?><!doctype html>
<html><head><meta charset="utf-8"><title>FileForge Installer</title><link rel="stylesheet" href="/assets/css/app.css"></head>
<body><main class="container">
<h1>FileForge Installation Wizard</h1>
<p>Step <?= $step; ?> of 4</p>
<?php if ($step === 1): ?>
    <h2>Server requirements</h2>
    <ul>
    <?php foreach ($requirements as $name => $ok): ?>
        <li><?= htmlspecialchars($name); ?>: <?= $ok ? 'OK' : 'Missing'; ?></li>
    <?php endforeach; ?>
    </ul>
<?php elseif ($step === 2): ?>
    <h2>Database configuration</h2>
    <form><input placeholder="DB host"><input placeholder="DB name"><button>Save</button></form>
<?php elseif ($step === 3): ?>
    <h2>Create admin account</h2>
    <form><input placeholder="Name"><input placeholder="Email"><input type="password" placeholder="Password"><button>Create</button></form>
<?php else: ?>
    <h2>System setup</h2>
    <p>Write .env, run migrations, set permissions, and finalize.</p>
<?php endif; ?>
</main></body></html>
