<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Metric $metric
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Metric'), ['action' => 'edit', $metric->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Metric'), ['action' => 'delete', $metric->id], ['confirm' => __('Are you sure you want to delete # {0}?', $metric->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Metrics'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Metric'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Performances'), ['controller' => 'Performances', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Performance'), ['controller' => 'Performances', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Specific Metrics'), ['controller' => 'SpecificMetrics', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Specific Metric'), ['controller' => 'SpecificMetrics', 'action' => 'add']) ?> </li>
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
                <th scope="col"><?= __('Service Line') ?></th>
                <th scope="col"><?= __('Year') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($metric->specific_metrics as $specificMetrics): ?>
            <tr>
                <td><?= h($specificMetrics->service_line->service_line) ?></td>
                <td><?= h($specificMetrics->year) ?></td>
                <td class="actions">
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
