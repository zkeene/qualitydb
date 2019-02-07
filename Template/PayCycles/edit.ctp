<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PayCycle $payCycle
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $payCycle->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $payCycle->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pay Cycles'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Contracts'), ['controller' => 'Contracts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contract'), ['controller' => 'Contracts', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="payCycles form large-9 medium-8 columns content">
    <?= $this->Form->create($payCycle) ?>
    <fieldset>
        <legend><?= __('Edit Pay Cycle') ?></legend>
        <?php
            echo $this->Form->control('pay_cycle');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
