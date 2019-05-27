<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Message $message
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Message']);?>
    </ul>
</nav>
<div class="messages view large-9 medium-8 columns content">
    <h3><?= h($message->message_title) ?></h3>
    <div class="row">
        <h4><?= __('Message') ?></h4>
        <?= $this->Text->autoParagraph(h($message->message)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Specific Metric Thresholds') ?></h4>
        <?php if (!empty($message->specific_metric_thresholds)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th colspan='2' scope="col"><?= __('Specific Metric') ?></th>
                <th scope="col"><?= __('Threshold') ?></th>
                <th scope="col"><?= __('Incentive Percent') ?></th>
                <th scope="col"><?= __('Color') ?></th>
                <th scope="col"><?= __('Gateway Threshold') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($message->specific_metric_thresholds as $specificMetricThresholds): ?>
            <tr>
                <td colspan='2'><?= h($specificMetricThresholds->specific_metric->specific_metric_name) ?></td>
                <td><?= h($specificMetricThresholds->threshold) ?></td>
                <td><?= h($specificMetricThresholds->threshold_incentive_percent) ?></td>
                <td><?= h($specificMetricThresholds->threshold_color->color) ?></td>
                <td><?= h($specificMetricThresholds->is_gateway_threshold)? 'Yes':'No' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'SpecificMetricThresholds', 'action' => 'view', $specificMetricThresholds->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'SpecificMetricThresholds', 'action' => 'edit', $specificMetricThresholds->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'SpecificMetricThresholds', 'action' => 'delete', $specificMetricThresholds->id], ['confirm' => __('Are you sure you want to delete # {0}?', $specificMetricThresholds->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
