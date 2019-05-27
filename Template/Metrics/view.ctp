<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Metric $metric
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Metric']);?>
    </ul>
</nav>
<div class="metrics view large-9 medium-8 columns content">
    <h3><?= h($metric->metric) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Is Calculated Metric') ?></th>
            <td><?= $metric->is_calculated_metric ? 'Yes':'No' ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Metric Definition') ?></h4>
        <?= $this->Text->autoParagraph(h($metric->metric_def)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Specific Metrics') ?></h4>
        <?php if (!empty($metric->specific_metrics)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th colspan='2' scope="col"><?= __('Service Line') ?></th>
                <th scope="col"><?= __('Year') ?></th>
                <th scope="col"><?= __('Threshold Direction') ?></th>
                <th scope="col"><?= __('Gateway') ?></th>
                <th scope="col"><?= __('Beta') ?></th>
                <th scope="col"><?= __('Service Line Metric') ?></th>
                <th scope="col"><?= __('TBD') ?></th>
                <th scope="col"><?= __('Order') ?></th>
                <th scope="col"><?= __('Weight') ?></th>
                <th scope="col"><?= __('Precision') ?></th>
                <th colspan='2' scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($metric->specific_metrics as $specificMetrics): ?>
            <tr>
                <td colspan='2'><?= h($specificMetrics->service_line->service_line) ?></td>
                <td><?= h($specificMetrics->year) ?></td>
                <td><?= $specificMetrics->threshold_direction ? 'Down':'Up' ?></td>
                <td><?= $specificMetrics->is_gateway_metric ? 'Yes':'No' ?></td>
                <td><?= $specificMetrics->is_beta_metric ? 'Yes':'No' ?></td>
                <td><?= $specificMetrics->is_service_line_metric ? 'Yes':'No' ?></td>
                <td><?= $specificMetrics->is_tbd_metric ? 'Yes':'No' ?></td>
                <td><?= h($specificMetrics->metric_order) ?></td>
                <td><?= h($specificMetrics->weight) ?></td>
                <td><?= h($specificMetrics->round_precision) ?></td>
                <td colspan='2' class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SpecificMetrics', 'action' => 'view', $specificMetrics->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SpecificMetrics', 'action' => 'edit', $specificMetrics->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SpecificMetrics', 'action' => 'delete', $specificMetrics->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specificMetrics->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
