<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SpecificMetric[]|\Cake\Collection\CollectionInterface $specificMetrics
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('New') ?></li>
        <li><?= $this->Html->link(__('Specific Metric'), ['action' => 'add']) ?></li>
        <li class="heading"><?= __('Listings') ?></li>
        <li><?= $this->Html->link(__('Service Lines'), ['controller' => 'ServiceLines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Metrics'), ['controller' => 'Metrics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Specific Metric Thresholds'), ['controller' => 'SpecificMetricThresholds', 'action' => 'index']) ?></li>
        <li class="heading"><?= __('New Related') ?></li>
        <li><?= $this->Html->link(__('Service Line'), ['controller' => 'ServiceLines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Metric'), ['controller' => 'Metrics', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Specific Metric Threshold'), ['controller' => 'SpecificMetricThresholds', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="specificMetrics index large-9 medium-8 columns content">
    <h3><?= __('Specific Metrics') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('ServiceLines.service_line','Service Line') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Metrics.metric','Metric') ?></th>
                <th scope="col"><?= $this->Paginator->sort('year') ?></th>
                <th scope="col"><?= $this->Paginator->sort('threshold_direction') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_gateway_metric') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_beta_metric') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_service_line_metric') ?></th>
                <th scope="col"><?= $this->Paginator->sort('metric_order') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($specificMetrics as $specificMetric): ?>
            <tr>
                <td><?= $specificMetric->has('service_line') ? $this->Html->link($specificMetric->service_line->service_line, ['controller' => 'ServiceLines', 'action' => 'view', $specificMetric->service_line->id]) : '' ?></td>
                <td><?= $specificMetric->has('metric') ? $this->Html->link($specificMetric->metric->metric, ['controller' => 'Metrics', 'action' => 'view', $specificMetric->metric->id]) : '' ?></td>
                <td><?= h($specificMetric->year) ?></td>
                <td><?= $specificMetric->threshold_direction ? 'Down':'Up' ?></td>
                <td><?= $specificMetric->is_gateway_metric ? 'Yes':'No' ?></td>
                <td><?= $specificMetric->is_beta_metric ? 'Yes':'No' ?></td>
                <td><?= $specificMetric->is_service_line_metric ? 'Yes':'No' ?></td>
                <td><?= h($specificMetric->metric_order) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $specificMetric->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $specificMetric->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $specificMetric->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specificMetric->id)]) ?>
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
