<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Hall $hall
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Cinemas'), ['controller' => 'Cinemas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Halls'), ['controller' => 'Cinemas', 'action'=> 'halls', $cinemaId]) ?></li>
    </ul>
</nav>
<div class="halls form large-9 medium-8 columns content">
    <?= $this->Form->create($hall) ?>
    <fieldset>
        <legend><?= __('Add Hall') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('rows');
            echo $this->Form->control('seats');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
