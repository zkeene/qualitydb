<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Performance $performance
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Performances']);?>
    </ul>
</nav>
<div class="performances view large-9 medium-8 columns content">
    <h3><?= h($performance->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Provider') ?></th>
            <td><?= $performance->has('provider') ? $this->Html->link($performance->provider->id, ['controller' => 'Providers', 'action' => 'view', $performance->provider->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Location') ?></th>
            <td><?= $performance->has('location') ? $this->Html->link($performance->location->id, ['controller' => 'Locations', 'action' => 'view', $performance->location->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Metric') ?></th>
            <td><?= $performance->has('metric') ? $this->Html->link($performance->metric->id, ['controller' => 'Metrics', 'action' => 'view', $performance->metric->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Year') ?></th>
            <td><?= h($performance->year) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($performance->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Numerator') ?></th>
            <td><?= $this->Number->format($performance->numerator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Denominator') ?></th>
            <td><?= $this->Number->format($performance->denominator) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quarter') ?></th>
            <td><?= $this->Number->format($performance->quarter) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Period Performance') ?></th>
            <td><?= $performance->period_performance? 'Yes':'No' ?></td>
        </tr>
    </table>
</div>
