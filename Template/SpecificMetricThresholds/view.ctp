<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SpecificMetricThreshold $specificMetricThreshold
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Specific Metric Threshold']);?>
    </ul>
</nav>
<div class="specificMetricThresholds view large-9 medium-8 columns content">
    <h3><?= h($specificMetricThreshold->threshold.' - '.$specificMetricThreshold->specific_metric->service_line->service_line.' - '.$specificMetricThreshold->specific_metric->metric->metric.' - '.$specificMetricThreshold->specific_metric->year) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Specific Metric') ?></th>
            <td><?= $specificMetricThreshold->has('specific_metric') ? $this->Html->link($specificMetricThreshold->specific_metric->service_line->service_line.' - '.$specificMetricThreshold->specific_metric->metric->metric.' - '.$specificMetricThreshold->specific_metric->year, ['controller' => 'SpecificMetrics', 'action' => 'view', $specificMetricThreshold->specific_metric->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Threshold') ?></th>
            <td><?= $this->Number->format($specificMetricThreshold->threshold) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Incentive Percent') ?></th>
            <td><?= $this->Number->format($specificMetricThreshold->threshold_incentive_percent) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Message') ?></th>
            <td><?= $specificMetricThreshold->has('message') ? $this->Html->link($specificMetricThreshold->message->message_title, ['controller' => 'Messages', 'action' => 'view', $specificMetricThreshold->message->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Color') ?></th>
            <td><?= $specificMetricThreshold->has('threshold_color') ? $this->Html->link($specificMetricThreshold->threshold_color->color, ['controller' => 'ThresholdColors', 'action' => 'view', $specificMetricThreshold->threshold_color->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gateway Threshold') ?></th>
            <td><?= h($specificMetricThreshold->is_gateway_threshold? 'Yes':'No') ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quarter') ?></th>
            <td><?= h($specificMetricThreshold->quarter) ?></td>
        </tr>
    </table>
</div>
