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
            echo $this->Form->control('weight');
            echo $this->Form->control('round_precision');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
