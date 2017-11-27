<h1>CakePHP Registration Form</h1>

<?php
$form = $this->Form;
?>
<?= $form->create('User', ['url' => ['action' => 'register']]); ?>
<?= $form->input('username'); ?>
<?= $form->input('password', ['type' => 'password']); ?>
<?= $form->input('password_confirm', ['type' => 'password']); ?>
<?= $form->button('Register'); ?>
<?= $form->end(); ?>