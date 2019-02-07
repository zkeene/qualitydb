<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SpecificMetricThreshold $specificMetricThreshold
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Specific Metric Threshold'), ['action' => 'edit', $specificMetricThreshold->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Specific Metric Threshold'), ['action' => 'delete', $specificMetricThreshold->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specificMetricThreshold->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Specific Metric Thresholds'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Specific Metric Threshold'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Specific Metrics'), ['controller' => 'SpecificMetrics', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Specific Metric'), ['controller' => 'SpecificMetrics', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Threshold Colors'), ['controller' => 'ThresholdColors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Threshold Color'), ['controller' => 'ThresholdColors', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="specificMetricThresholds view large-9 medium-8 columns content">
    <h3><?= h($specificMetricThreshold->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Specific Metric') ?></th>
            <td><?= $specificMetricThreshold->has('specific_metric') ? $this->Html->link($specificMetricThreshold->specific_metric->id, ['controller' => 'SpecificMetrics', 'action' => 'view', $specificMetricThreshold->specific_metric->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Message') ?></th>
            <td><?= $specificMetricThreshold->has('message') ? $this->Html->link($specificMetricThreshold->message->id, ['controller' => 'Messages', 'action' => 'view', $specificMetricThreshold->message->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Threshold Color') ?></th>
            <td><?= $specificMetricThreshold->has('threshold_color') ? $this->Html->link($specificMetricThreshold->threshold_color->id, ['controller' => 'ThresholdColors', 'action' => 'view', $specificMetricThreshold->threshold_color->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Is Gateway Threshold') ?></th>
            <td><?= h($specificMetricThreshold->is_gateway_threshold) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($specificMetricThreshold->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Threshold') ?></th>
            <td><?= $this->Number->format($specificMetricThreshold->threshold) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Threshold Incentive Percent') ?></th>
            <td><?= $this->Number->format($specificMetricThreshold->threshold_incentive_percent) ?></td>
        </tr>
    </table>
</div>
