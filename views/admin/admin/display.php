<?php echo head(array(
    'title' => __('Elasticsearch | Display Configuration')
)); ?>

<?php echo $this->partial('admin/partials/navigation.php', array('tab' => 'display')); ?>

<div id="primary">
    <h2><?php echo __('Display Configuration') ?></h2>
    <?php echo flash(); ?>
    <?php echo $form ?>
</div>

<?php echo foot(); ?>