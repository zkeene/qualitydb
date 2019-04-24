<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SpecificMetric $specificMetric
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Specific Metric'), ['action' => 'edit', $specificMetric->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Specific Metric'), ['action' => 'delete', $specificMetric->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specificMetric->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Specific Metrics'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Specific Metric'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Service Lines'), ['controller' => 'ServiceLines', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Service Line'), ['controller' => 'ServiceLines', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Metrics'), ['controller' => 'Metrics', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Metric'), ['controller' => 'Metrics', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Specific Metric Thresholds'), ['controller' => 'SpecificMetricThresholds', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Specific Metric Threshold'), ['controller' => 'SpecificMetricThresholds', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="specificMetrics view large-9 medium-8 columns content">
    <h3><?= h($specificMetric->service_line->service_line) ?> - <?= h($specificMetric->metric->metric) ?> - <?= h($specificMetric->year) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Threshold Direction') ?></th>
            <td><?= $specificMetric->threshold_direction ? __('Down') : __('Up'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Gateway Metric') ?></th>
            <td><?= $specificMetric->is_gateway_metric ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Beta Metric') ?></th>
            <td><?= $specificMetric->is_beta_metric ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Service Line Metric') ?></th>
            <td><?= $specificMetric->is_service_line_metric ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is TBD Metric') ?></th>
            <td><?= $specificMetric->is_tbd_metric ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Metric Order') ?></th>
            <td><?= $specificMetric->metric_order ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weight') ?></th>
            <td><?= $specificMetric->weight ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Rounding Precision') ?></th>
            <td><?= $specificMetric->round_precision ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Specific Metric Thresholds') ?></h4>
        <?php if (!empty($specificMetric->specific_metric_thresholds)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Threshold') ?></th>
                <th scope="col"><?= __('Threshold Incentive Percent') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('Color') ?></th>
                <th scope="col"><?= __('Is Gateway Threshold') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($specificMetric->specific_metric_thresholds as $specificMetricThresholds): ?>
            <tr>
                <td><?= h($specificMetricThresholds->threshold) ?></td>
                <td><?= h($specificMetricThresholds->threshold_incentive_percent) ?></td>
                <td><?= h($specificMetricThresholds->message->message_title) ?></td>
                <td><?= h($specificMetricThresholds->threshold_color->color) ?></td>
                <td><?= $specificMetricThresholds->is_gateway_threshold ? 'Yes':'No' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SpecificMetricThresholds', 'action' => 'view', $specificMetricThresholds->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SpecificMetricThresholds', 'action' => 'edit', $specificMetricThresholds->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SpecificMetricThresholds', 'action' => 'delete', $specificMetricThresholds->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specificMetricThresholds->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
