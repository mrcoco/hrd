

<div class="row">
    <?php echo $form->labelEx($user, 'username'); ?>
    <?php echo $form->textField($user, 'username', array('size' => 20, 'maxlength' => 20)); ?>
    <?php echo $form->error($user, 'username'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($user, 'password'); ?>
    <?php echo $form->passwordField($user, 'password', array('size' => 60, 'maxlength' => 128)); ?>
    <?php echo $form->error($user, 'password'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($user, 'password_repeat'); ?>
    <?php echo $form->passwordField($user, 'password_repeat', array('size' => 60, 'maxlength' => 128)); ?>
    <?php echo $form->error($user, 'password_repeat'); ?>
</div>

<div class="row">
    <?php echo $form->labelEx($user, 'email'); ?>
    <?php echo $form->textField($user, 'email', array('size' => 60, 'maxlength' => 128)); ?>
    <?php echo $form->error($user, 'email'); ?>
</div>