<div class="view large-9 medium-8 columns content">
    <div>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Rows') ?></th>
                <th scope="col"><?= __('Seats') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($halls as $hall): ?>
            <tr>
                <td><?= h($hall->name) ?></td>
                <td><?= h($hall->rows) ?></td>
                <td><?= h($hall->seats) ?></td>
                <td class="actions">
                    <li><?= $this->Html->link(__('List Movies'), ['controller' => 'Halls', 'action'=> 'movies', $hall->id]) ?></li>
                    <li><?= $this->Html->link(__('Add New Movie'), ['controller' => 'Movies', 'action'=> 'add', $hall->id]) ?></li>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
