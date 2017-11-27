<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cinema[]|\Cake\Collection\CollectionInterface $cinemas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Add New Cinema'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cinemas index large-9 medium-8 columns content">
    <h3><?= __('Cinemas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cinemas as $cinema): ?>
            <tr>
                <td><?= h($cinema->name) ?></td>
                <td class="actions">
                    <li><?= $this->Html->link(__('List Halls'), ['controller' => 'Cinemas', 'action'=> 'halls', $cinema->id]) ?></li>
                    <li><?= $this->Html->link(__('Add New Hall'), ['controller' => 'Halls', 'action' => 'add', $cinema->id]) ?></li>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
