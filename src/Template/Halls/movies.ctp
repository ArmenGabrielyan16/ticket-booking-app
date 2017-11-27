<div class="view large-9 medium-8 columns content">
    <div>
        <?php if (!empty($movies)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Start') ?></th>
                <th scope="col"><?= __('End') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($movies as $movie): ?>
            <tr>
                <td><?= h($movie->title) ?></td>
                <td><?= h($movie->start_time) ?></td>
                <td><?= h($movie->end_time) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Back to Cinemas'), ['controller' => 'Cinemas', 'action' => 'index']) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
