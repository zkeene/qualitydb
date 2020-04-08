<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SpecificMetric $specificMetric
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Specific Metric']);?>
    </ul>
</nav>
<div class="specificMetrics view large-9 medium-8 columns content">
    <h3><?= $specificMetric->specific_metric_name?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Threshold Direction') ?></th>
            <td><?= $specificMetric->threshold_direction ? __('Down') : __('Up'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gateway Metric') ?></th>
            <td><?= $specificMetric->is_gateway_metric ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Beta Metric') ?></th>
            <td><?= $specificMetric->is_beta_metric ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Service Line Metric') ?></th>
            <td><?= $specificMetric->is_service_line_metric ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('TBD Metric') ?></th>
            <td><?= $specificMetric->is_tbd_metric ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order') ?></th>
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
        <h4><?= __('Related Specific Metric Thresholds') ?>
        <div class="right"><?= $this->Html->link('New Threshold',['controller'=>'SpecificMetricThresholds', 'action'=>'add',$specificMetric->id],['class'=>'button'])?></div></h4>
        <?php if (!empty($specificMetric->specific_metric_thresholds)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Threshold') ?></th>
                <th scope="col"><?= __('Incentive Percent') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('Color') ?></th>
                <th scope="col"><?= __('Gateway Threshold') ?></th>
                <th scope="col"><?= __('Quarter') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($specificMetric->specific_metric_thresholds as $specificMetricThresholds): ?>
            <tr>
                <td><?= h($specificMetricThresholds->threshold) ?></td>
                <td><?= h($specificMetricThresholds->threshold_incentive_percent) ?></td>
                <td><?= h($specificMetricThresholds->message->message_title) ?></td>
                <td><?= h($specificMetricThresholds->threshold_color->color) ?></td>
                <td><?= $specificMetricThresholds->is_gateway_threshold ? 'Yes':'No' ?></td>
                <td><?= h($specificMetricThresholds->quarter) ?></td>
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
