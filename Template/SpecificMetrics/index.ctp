<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\SpecificMetric[]|\Cake\Collection\CollectionInterface $specificMetrics
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Specific Metric']);?>
    </ul>
</nav>
<div class="specificMetrics index large-9 medium-8 columns content">
    <h3><?= __('Specific Metrics') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th colspan="2" scope="col"><?= $this->Paginator->sort('specific_metric_name','Specific Metric') ?></th>
                <th scope="col"><?= $this->Paginator->sort('threshold_direction') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_gateway_metric', 'Gateway') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_beta_metric', 'Beta') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_service_line_metric','Service Line Metric') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_tbd_metric','TBD') ?></th>
                <th scope="col"><?= $this->Paginator->sort('metric_order', 'Order') ?></th>
                <th scope="col"><?= $this->Paginator->sort('weight') ?></th>
                <th scope="col"><?= $this->Paginator->sort('round_precision', 'Precision') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($specificMetrics as $specificMetric): ?>
            <tr>
                <td colspan="2"><?= $this->Html->link(h($specificMetric->specific_metric_name), ['action' => 'view', $specificMetric->id]) ?></td>
                <td><?= $specificMetric->threshold_direction ? 'Down':'Up' ?></td>
                <td><?= $specificMetric->is_gateway_metric ? 'Yes':'No' ?></td>
                <td><?= $specificMetric->is_beta_metric ? 'Yes':'No' ?></td>
                <td><?= $specificMetric->is_service_line_metric ? 'Yes':'No' ?></td>
                <td><?= $specificMetric->is_tbd_metric ? 'Yes':'No' ?></td>
                <td><?= h($specificMetric->metric_order) ?></td>
                <td><?= h($specificMetric->weight) ?></td>
                <td><?= h($specificMetric->round_precision) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $specificMetric->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $specificMetric->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specificMetric->id)]) ?>
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