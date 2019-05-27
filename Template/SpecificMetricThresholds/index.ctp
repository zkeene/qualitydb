<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SpecificMetricThreshold[]|\Cake\Collection\CollectionInterface $specificMetricThresholds
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Specific Metric Threshold']);?>
    </ul>
</nav>
<div class="specificMetricThresholds index large-9 medium-8 columns content">
    <h3><?= __('Specific Metric Thresholds') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th colspan='2' scope="col"><?= $this->Paginator->sort('specific_metric_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('threshold') ?></th>
                <th scope="col"><?= $this->Paginator->sort('threshold_incentive_percent', 'Incentive Percent') ?></th>
                <th colspan='2' scope="col"><?= $this->Paginator->sort('message_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('threshold_color_id', 'Color') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_gateway_threshold', 'Gateway Threshold') ?></th>
                <th colspan='2' scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($specificMetricThresholds as $specificMetricThreshold): ?>
            <tr>
                <td colspan='2'><?= $specificMetricThreshold->has('specific_metric') ? $this->Html->link($specificMetricThreshold->specific_metric->specific_metric_name, ['controller' => 'SpecificMetrics', 'action' => 'view', $specificMetricThreshold->specific_metric->id]) : '' ?></td>
                <td><?= $this->Number->format($specificMetricThreshold->threshold) ?></td>
                <td><?= $this->Number->format($specificMetricThreshold->threshold_incentive_percent) ?></td>
                <td colspan='2'><?= h($specificMetricThreshold->message->message_title)?></td>
                <td><?= h($specificMetricThreshold->threshold_color->color)?></td>
                <td><?= h($specificMetricThreshold->is_gateway_threshold)?'Yes':'No' ?></td>
                <td colspan='2' class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $specificMetricThreshold->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $specificMetricThreshold->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $specificMetricThreshold->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specificMetricThreshold->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
