<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SpecificMetricThreshold $specificMetricThreshold
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Specific Metric Thresholds'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Specific Metrics'), ['controller' => 'SpecificMetrics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Specific Metric'), ['controller' => 'SpecificMetrics', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Message'), ['controller' => 'Messages', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Threshold Colors'), ['controller' => 'ThresholdColors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Threshold Color'), ['controller' => 'ThresholdColors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="specificMetricThresholds form large-9 medium-8 columns content">
    <?= $this->Form->create($specificMetricThreshold) ?>
    <fieldset>
        <legend><?= __('Add Specific Metric Threshold') ?></legend>
        <?php
        $specificMetricsDisplay = array();
        foreach ($specificMetrics as $specificMetric) {
            $specificMetricsDisplay[$specificMetric->id] = $specificMetric->service_line->service_line.' - '.$specificMetric->metric->metric.' - '.$specificMetric->year;
        }
            echo $this->Form->control('specific_metric_id', ['options' => $specificMetricsDisplay]);
            echo $this->Form->control('threshold');
            echo $this->Form->control('threshold_incentive_percent');
            echo $this->Form->control('message_id', ['options' => $messages]);
            echo $this->Form->control('threshold_color_id', ['options' => $thresholdColors]);
            echo $this->Form->control('is_gateway_threshold');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
