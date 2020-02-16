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
<div class="specificMetricThresholds form large-9 medium-8 columns content">
    <?= $this->Form->create($specificMetricThreshold) ?>
    <fieldset>
        <legend><?= __('Add Specific Metric Threshold') ?></legend>
        <?php
        $specificMetricsDisplay = array();
        foreach ($specificMetrics as $specificMetric) {
            $specificMetricsDisplay[$specificMetric->id] = $specificMetric->specific_metric_name;
        }
        asort($specificMetricsDisplay);
        ?>
            <table>
                <tr>
                    <td colspan='4'><?= $this->Form->control('specific_metric_id', ['options' => $specificMetricsDisplay]) ?></td>
                </tr>
                <tr>
                    <td><?= $this->Form->control('threshold') ?></td>
                    <td><?= $this->Form->control('threshold_incentive_percent', ['label' => 'Incentive Percent']) ?></td>
                    <td><?= $this->Form->control('threshold_color_id', ['options' => $thresholdColors, 'label' => 'Color']) ?></td>
                    <td><?= $this->Form->control('quarter') ?></td>
                <tr>
                    <td colspan='3'><?= $this->Form->control('message_id', ['options' => $messages]) ?></td>
                    <td><?= $this->Form->control('is_gateway_threshold', ['label' => 'Gateway Threshold']) ?></td>
                </tr>
            </table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
