<?= $this->extend('front/master-layout') ?>


<?= $this->section('content') ?>

<?php
// Set project directory
$projectDir = __DIR__;
$oldDomain = "www.bookmyyoga.in";
$newDomain = "www.bookmyyoga.in";

echo "<h2>Replacing '$oldDomain' with '$newDomain' in project files...</h2>";

$rii = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($projectDir));

$replacements = 0;

foreach ($rii as $file) {
    if ($file->isDir()) continue;

    $filePath = $file->getPathname();
    $contents = file_get_contents($filePath);

    if (strpos($contents, $oldDomain) !== false) {
        $contents = str_replace($oldDomain, $newDomain, $contents);
        file_put_contents($filePath, $contents);
        $replacements++;
        echo "<p>Replaced in: $filePath</p>";
    }
}

if ($replacements == 0) {
    echo "<p>No occurrences found. Nothing replaced.</p>";
} else {
    echo "<p>Total replacements done: $replacements</p>";
}
?>

<?= $this->endSection() ?>