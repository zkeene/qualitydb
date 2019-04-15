<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SpecificMetric $specificMetric
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Specific Metrics'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Service Lines'), ['controller' => 'ServiceLines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Service Line'), ['controller' => 'ServiceLines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Metrics'), ['controller' => 'Metrics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Metric'), ['controller' => 'Metrics', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Specific Metric Thresholds'), ['controller' => 'SpecificMetricThresholds', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Specific Metric Threshold'), ['controller' => 'SpecificMetricThresholds', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="specificMetrics form large-9 medium-8 columns content">
    <?= $this->Form->create($specificMetric) ?>
    <fieldset>
        <legend><?= __('Add Specific Metric') ?></legend>
        <?php
            echo $this->Form->control('service_line_id', ['options' => $serviceLines]);
            echo $this->Form->control('metric_id', ['options' => $metrics]);
            echo $this->Form->control('threshold_direction',['label' => 'Downward Metric']);
            echo $this->Form->control('is_gateway_metric');
            echo $this->Form->control('is_beta_metric');
            echo $this->Form->control('is_service_line_metric');
            echo $this->Form->control('is_tbd_metric');
            echo $this->Form->control('year');
            echo $this->Form->control('metric_order');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
