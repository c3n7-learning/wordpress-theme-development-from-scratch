<?php
if (is_active_sidebar('sidebar-blog')) {
?>
    <div class="sidebar">
        <?php dynamic_sidebar('sidebar-blog'); ?>
    </div>
<?php
}
