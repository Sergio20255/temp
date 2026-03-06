<?php ob_start(); ?>
<h1>Admin Panel</h1>
<div class="grid">
    <div class="card">Users: <?= (int) $stats['users']; ?></div>
    <div class="card">Conversions: <?= (int) $stats['conversions']; ?></div>
    <div class="card">Storage GB: <?= (int) $stats['storage_gb']; ?></div>
    <div class="card">Revenue: $<?= (int) $stats['revenue']; ?></div>
</div>
<ul>
    <li>Manage users</li>
    <li>Enable / disable conversion formats</li>
    <li>Manage plans and limits</li>
    <li>Analytics and logs</li>
</ul>
<?php $content = ob_get_clean(); $title = 'Admin'; include __DIR__ . '/../layouts/app.php'; ?>
