<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contract $contract
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Contract']);?>
    </ul>>
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
            echo $this->Form->control('active',['checked' => true]);
            echo $this->Form->control('comments');
            if(isset($_SERVER['REMOTE_USER'])){
                $username = $_SERVER['REMOTE_USER'];
            } else {
                $username = 'Unknown';
            }
            echo $this->Form->hidden('user', ['value'=>$username]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
