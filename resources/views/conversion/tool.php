<?php ob_start(); ?>
<section>
    <h1><?= strtoupper(str_replace('-', ' ', $slug)); ?> Converter</h1>
    <div class="card">
        <input type="file" id="fileInput">
        <div class="progress"><div id="progressBar"></div></div>
        <button id="convertBtn">Convert</button>
        <a href="#" id="downloadBtn" class="hidden">Download</a>
    </div>
</section>
<?php
$content = ob_get_clean();
$title = strtoupper(str_replace('-', ' ', $slug)) . ' | FileForge';
$description = 'Secure and fast online conversion tool page.';
$schema = json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'WebApplication',
    'name' => strtoupper(str_replace('-', ' ', $slug)) . ' Converter',
    'applicationCategory' => 'UtilityApplication',
], JSON_UNESCAPED_SLASHES);
include __DIR__ . '/../layouts/app.php';
?>
