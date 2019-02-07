<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Performance $performance
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Performance'), ['action' => 'edit', $performance->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Performance'), ['action' => 'delete', $performance->id], ['confirm' => __('Are you sure you want to delete # {0}?', $performance->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Performances'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Performance'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Locations'), ['controller' => 'Locations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Location'), ['controller' => 'Locations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Metrics'), ['controller' => 'Metrics', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Metric'), ['controller' => 'Metrics', 'action' => 'add']) ?> </li>
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
    </table>
</div>
