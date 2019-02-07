<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ThresholdColor $thresholdColor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Threshold Color'), ['action' => 'edit', $thresholdColor->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Threshold Color'), ['action' => 'delete', $thresholdColor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $thresholdColor->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Threshold Colors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Threshold Color'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Specific Metric Thresholds'), ['controller' => 'SpecificMetricThresholds', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Specific Metric Threshold'), ['controller' => 'SpecificMetricThresholds', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="thresholdColors view large-9 medium-8 columns content">
    <h3><?= h($thresholdColor->color) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Color Hex') ?></th>
            <td><?= h($thresholdColor->color_hex) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Specific Metric Thresholds') ?></h4>
        <?php if (!empty($thresholdColor->specific_metric_thresholds)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Specific Metric') ?></th>
                <th scope="col"><?= __('Threshold') ?></th>
                <th scope="col"><?= __('Threshold Incentive Percent') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('Is Gateway Threshold') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($thresholdColor->specific_metric_thresholds as $specificMetricThresholds): ?>
            <tr>
                <td><?= h($specificMetricThresholds->specific_metric->service_line->service_line) ?> - <?= h($specificMetricThresholds->specific_metric->metric->metric) ?> - <?= h($specificMetricThresholds->specific_metric->year) ?></td>
                <td><?= h($specificMetricThresholds->threshold) ?></td>
                <td><?= h($specificMetricThresholds->threshold_incentive_percent) ?></td>
                <td><?= h($specificMetricThresholds->message->message_title) ?></td>
                <td><?= ($specificMetricThresholds->is_gateway_threshold)?'Yes':'No' ?></td>
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
