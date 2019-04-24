<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ThresholdColor[]|\Cake\Collection\CollectionInterface $thresholdColors
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Threshold Color']);?>
    </ul>
</nav>
<div class="thresholdColors index large-9 medium-8 columns content">
    <h3><?= __('Threshold Colors') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('color') ?></th>
                <th scope="col"><?= $this->Paginator->sort('color_hex') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($thresholdColors as $thresholdColor): ?>
            <tr>
                <td><?= h($thresholdColor->color) ?></td>
                <td><?= h($thresholdColor->color_hex) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $thresholdColor->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $thresholdColor->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $thresholdColor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $thresholdColor->id)]) ?>
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
