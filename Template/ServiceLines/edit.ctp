<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ServiceLine $serviceLine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $serviceLine->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $serviceLine->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Service Lines'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Specific Metrics'), ['controller' => 'SpecificMetrics', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Specific Metric'), ['controller' => 'SpecificMetrics', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="serviceLines form large-9 medium-8 columns content">
    <?= $this->Form->create($serviceLine) ?>
    <fieldset>
        <legend><?= __('Edit Service Line') ?></legend>
        <?php
            echo $this->Form->control('service_line');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
