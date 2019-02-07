<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contract $contract
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $contract->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $contract->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Contracts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pay Cycles'), ['controller' => 'PayCycles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pay Cycle'), ['controller' => 'PayCycles', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contracts form large-9 medium-8 columns content">
    <?= $this->Form->create($contract) ?>
    <fieldset>
        <legend><?= __('Edit Contract') ?></legend>
        <?php
            echo $this->Form->control('provider_id', ['options' => $providers]);
            echo $this->Form->control('total_incentive_amount');
            echo $this->Form->control('pay_cycle_id', ['options' => $payCycles]);
            echo $this->Form->control('fte');
            echo $this->Form->control('effective_date', ['empty' => true]);
            echo $this->Form->control('effective_quality_date', ['empty' => true]);
            echo $this->Form->control('amendment_date', ['empty' => true]);
            echo $this->Form->control('default_expire_date', ['empty' => true]);
            echo $this->Form->control('inactive_date', ['empty' => true]);
            echo $this->Form->control('active');
            echo $this->Form->control('datetime_stamp');
            echo $this->Form->control('user_id', ['options' => $users]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
