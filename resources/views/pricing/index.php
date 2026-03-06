<?php ob_start(); ?>
<h1>Pricing</h1>
<div class="grid">
    <div class="card"><h3>Free</h3><p>$0 / month</p><p>25 conversions</p></div>
    <div class="card"><h3>Pro</h3><p>$19 / month</p><p>1000 conversions + API</p></div>
    <div class="card"><h3>Agency</h3><p>$79 / month</p><p>10,000 conversions + White-label</p></div>
</div>
<?php $content = ob_get_clean(); $title = 'Pricing'; include __DIR__ . '/../layouts/app.php'; ?>
