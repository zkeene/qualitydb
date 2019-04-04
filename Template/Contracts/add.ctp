<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contract $contract
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Contracts'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pay Cycles'), ['controller' => 'PayCycles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pay Cycle'), ['controller' => 'PayCycles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="contracts form large-9 medium-8 columns content">
    <?= $this->Form->create($contract) ?>
    <fieldset>
        <legend><?= __('Add Contract') ?></legend>
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
            echo $this->Form->control('comments');
            echo $this->Form->control('datetime_stamp', ['disabled' => true]);
            if(isset($_SERVER['REMOTE_USER'])){
                $username = $_SERVER['REMOTE_USER'];
            } else {
                $username = '';
            }
            echo $this->Form->control('user', ['default'=>$username, 'disabled' =>true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
