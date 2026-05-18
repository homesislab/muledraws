<?php echo notify($this->session) ?>
<?php if ($methodName == 'save') { ?>
    <?php if ($error != '') { ?>
        <?php echo notifyError($error); ?>
    <?php } ?>
<?php } ?>