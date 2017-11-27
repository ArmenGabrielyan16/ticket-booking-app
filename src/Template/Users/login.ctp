<h1>Login</h1>

<?php
$form = $this->Form;
?>
<?= $form->create() ?>
<?= $form->control('username') ?>
<?= $form->control('password') ?>
<?= $form->button('Login') ?>
<?= $form->end() ?>