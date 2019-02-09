<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SpecificMetricThreshold[]|\Cake\Collection\CollectionInterface $specificMetricThresholds
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('New') ?></li>
        <li><?= $this->Html->link(__('Specific Metric Threshold'), ['action' => 'add']) ?></li>
        <li class="heading"><?= __('Listings') ?></li>
        <li><?= $this->Html->link(__('Specific Metrics'), ['controller' => 'SpecificMetrics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Threshold Colors'), ['controller' => 'ThresholdColors', 'action' => 'index']) ?></li>
        <li class="heading"><?= __('Related New') ?></li>
        <li><?= $this->Html->link(__('Message'), ['controller' => 'Messages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Specific Metric'), ['controller' => 'SpecificMetrics', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Threshold Color'), ['controller' => 'ThresholdColors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="specificMetricThresholds index large-9 medium-8 columns content">
    <h3><?= __('Specific Metric Thresholds') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('specific_metric_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('threshold') ?></th>
                <th scope="col"><?= $this->Paginator->sort('threshold_incentive_percent') ?></th>
                <th scope="col"><?= $this->Paginator->sort('message_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('threshold_color_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_gateway_threshold') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($specificMetricThresholds as $specificMetricThreshold): ?>
            <tr>
                <td><?= $specificMetricThreshold->has('specific_metric') ? $this->Html->link($specificMetricThreshold->specific_metric->id, ['controller' => 'SpecificMetrics', 'action' => 'view', $specificMetricThreshold->specific_metric->id]) : '' ?></td>
                <td><?= $this->Number->format($specificMetricThreshold->threshold) ?></td>
                <td><?= $this->Number->format($specificMetricThreshold->threshold_incentive_percent) ?></td>
                <td><?= h($specificMetricThreshold->message->message_title)?></td>
                <td><?= h($specificMetricThreshold->threshold_color->color)?></td>
                <td><?= h($specificMetricThreshold->is_gateway_threshold)?'Yes':'No' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $specificMetricThreshold->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $specificMetricThreshold->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $specificMetricThreshold->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specificMetricThreshold->id)]) ?>
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
