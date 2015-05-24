<?php if (!isset($noCopyright)): ?>
    <div class="row large-space-top">
      <footer class="small-12 medium-8 medium-only-text-right columns low-contrast">
        <?php echo kirbytext($site->copyright()) ?>
      </footer>
    </div>
<?php endif; ?>

<body <?php if (isset($error)) echo 'class="error"' ?>>

<?php echo js('assets/js/min.js') ?>
<script>
	$(document).foundation();
</script>
</body>

</html>