<?php wp_footer() ?>

<footer>
    <div class="footer-widgets">
        <div class="footer-widget-area footer-1">
            <?php if (is_active_sidebar('footer-1')) : ?>
                <?php dynamic_sidebar('footer-1'); ?>
            <?php endif; ?>
        </div>
        <div class="footer-widget-area footer-2">
            <?php if (is_active_sidebar('footer-2')) : ?>
                <?php dynamic_sidebar('footer-2'); ?>
            <?php endif; ?>
        </div>
        <div class="footer-widget-area footer-3">
            <?php if (is_active_sidebar('footer-3')) : ?>
                <?php dynamic_sidebar('footer-3'); ?>
            <?php endif; ?>
        </div>
    </div>
</footer>

</body>
</html>