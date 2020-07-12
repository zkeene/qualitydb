<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Provider $provider
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Provider']);?>
    </ul>
</nav>
<div class="providers view large-9 medium-8 columns content">
    <h3><?= h($provider->provider_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Service Line') ?></th>
            <td><?= $provider->has('service_line') ? $this->Html->link($provider->service_line->service_line, ['controller' => 'ServiceLines', 'action' => 'view', $provider->service_line->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Type') ?></th>
            <td><?= $provider->has('provider_type') ? $this->Html->link($provider->provider_type->provider_type, ['controller' => 'ProviderTypes', 'action' => 'view', $provider->provider_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Epic SER') ?></th>
            <td><?= h($provider->SER) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('NPI') ?></th>
            <td><?= h($provider->NPI) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('KHN Badge') ?></th>
            <td><?= h($provider->badge_num) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($provider->provider_status)? 'Active':'Inactive' ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Contracts') ?>
        <div class="right"><?= $this->Html->link('New Contract',['controller'=>'Contracts', 'action'=>'add',$provider->id],['class'=>'button'])?></div></h4>
        <?php if (!empty($provider->contracts)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Total Incentive') ?></th>
                <th scope="col"><?= __('Pay Cycle') ?></th>
                <th scope="col"><?= __('FTE') ?></th>
                <th scope="col"><?= __('Effective') ?></th>
                <th scope="col"><?= __('Effective Quality') ?></th>
                <th scope="col"><?= __('Amendment') ?></th>
                <th scope="col"><?= __('Default Expiration') ?></th>
                <th scope="col"><?= __('Inactive Date') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($provider->contracts as $contracts): ?>
            <tr>
                <td><?= h($this->Number->currency($contracts->total_incentive_amount,'USD',['places'=>0])) ?></td>
                <td><?= h($contracts->pay_cycle->pay_cycle) ?></td>
                <td><?= h($contracts->fte) ?></td>
                <td><?= h($contracts->effective_date) ?></td>
                <td><?= h($contracts->effective_quality_date) ?></td>
                <td><?= h($contracts->amendment_date) ?></td>
                <td><?= h($contracts->default_expire_date) ?></td>
                <td><?= h($contracts->inactive_date) ?></td>
                <td><?= h($contracts->active)? 'Active':'Inactive' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Contracts', 'action' => 'view', $contracts->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Contracts', 'action' => 'edit', $contracts->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Contracts', 'action' => 'delete', $contracts->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contracts->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Performances') ?>
        <div class="right"><?= $this->Html->link('New Performance',['controller'=>'Performances', 'action'=>'add',$provider->id],['class'=>'button'])?></div></h4>
        <?php if (!empty($provider->performances)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Location') ?></th>
                <th scope="col" colspan=3><?= __('Metric') ?></th>
                <th scope="col"><?= __('Year') ?></th>
                <th scope="col"><?= __('Quarter') ?></th>
                <th scope="col"><?= __('Performance') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($provider->performances as $performances): ?>
            <tr>
                <td><?= $performances->has('location') ? h($performances->location->location_name) : '' ?></td>
                <td colspan=3><?= h($performances->metric->metric) ?></td>
                <td><?= h($performances->year) ?></td>
                <td><?= h($performances->quarter) ?></td>
                <td><?= h($performances->numerator).'/'.h($performances->denominator) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Performances', 'action' => 'view', $performances->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Performances', 'action' => 'edit', $performances->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Performances', 'action' => 'delete', $performances->id], ['confirm' => __('Are you sure you want to delete # {0}?', $performances->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
