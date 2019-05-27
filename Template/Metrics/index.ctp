<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Metric[]|\Cake\Collection\CollectionInterface $metrics
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Metric']);?>
    </ul>
</nav>
<div class="metrics index large-9 medium-8 columns content">
    <h3><?= __('Metrics') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('metric') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_calculated_metric', 'Calculated Metric') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($metrics as $metric): ?>
            <tr>
            <td><?= $this->Html->link(__($metric->metric), ['action' => 'view', $metric->id]) ?></td>
            <td><?= $metric->is_calculated_metric ? 'Yes':'No' ?></td>
                <td class="actions">  
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $metric->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $metric->id], ['confirm' => __('Are you sure you want to delete # {0}?', $metric->id)]) ?>
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
