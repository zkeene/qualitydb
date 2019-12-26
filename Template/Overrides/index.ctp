<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Override[]|\Cake\Collection\CollectionInterface $overrides
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu', ['nav_title'=>'Default Override']);?>
    </ul>
</nav>
<div class="overrides index large-9 medium-8 columns content">
    <h3><?= __('Default Overrides') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">Override Target</th>
                <th scope="col">Time Frame</th>
                <th scope="col" class="actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $specificMetricsDisplay = array();
                foreach ($specificMetrics as $specificMetric) {
                    $specificMetricsDisplay[$specificMetric->id] = $specificMetric->specific_metric_name;
                }
                asort($specificMetricsDisplay);
            ?>
            <?php foreach ($overrides as $override): ?>
            <tr>
                <td>
                <?php
                    if ($override->override_type==0) {
                        echo $override->has('specific_metric') ? $this->Html->link($specificMetricsDisplay[$override->specific_metric->id], ['controller' => 'SpecificMetrics', 'action' => 'view', $override->specific_metric->id]) : '';
                    } else {
                        echo $override->has('provider') ? $this->Html->link($override->provider->provider_name, ['controller' => 'Providers', 'action' => 'view', $override->provider->id]) : '';
                    }
                ?>
                </td>
                <td><?= $override->target_year ?><?= ($override->time_frame) ? ' Quarter '.$this->Number->format($override->target_quarter) : ''?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $override->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $override->id], ['confirm' => __('Are you sure you want to delete # {0}?', $override->id)]) ?>
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
