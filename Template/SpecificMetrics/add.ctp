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
        <table>
                <tr>
                    <td><?= $this->Form->control('service_line_id', ['options' => $serviceLines, 'default'=>$service_line_id]) ?></td>
                    <td><?= $this->Form->control('metric_id', ['options' => $metrics]) ?></td>
                </tr>
                <tr>
                    <td><?= $this->Form->control('year') ?></td>
                    <td><?= $this->Form->control('metric_order', ['label' => 'Order']) ?></td>
                </tr>
                <tr>
                    <td><?= $this->Form->control('weight') ?></td>
                    <td><?= $this->Form->control('round_precision', ['label' => 'Rounding Precision']) ?></td>
                </tr>
                <tr>
                    <td><?= $this->Form->control('threshold_direction', ['label' => 'Downward Metric']) ?>
                    <?= $this->Form->control('is_gateway_metric',['label' => 'Gateway Metric']) ?>
                    <?= $this->Form->control('is_beta_metric', ['label' => 'Beta Metric']) ?></td>
                    <td><?= $this->Form->control('is_service_line_metric', ['label' => 'Service Line Metric']) ?>
                    <?= $this->Form->control('is_tbd_metric', ['label' => 'TBD Metric']) ?></td>
                </tr>
            </table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
