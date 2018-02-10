<div class="content">
    <?php if(count($messages['success'])):?>
        <?php foreach ($messages['success'] as $message): ?>
            <div class="alert alert-success">
                <span><?php echo $message; ?></span>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if(count($messages['errors'])):?>
        <?php foreach ($messages['errors'] as $message): ?>
            <div class="alert alert-danger">
                <span><?php echo $message; ?></span>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>