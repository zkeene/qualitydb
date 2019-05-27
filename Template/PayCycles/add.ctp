<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PayCycle $payCycle
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Pay Cycle']);?>
    </ul>
</nav>
<div class="payCycles form large-9 medium-8 columns content">
    <?= $this->Form->create($payCycle) ?>
    <fieldset>
        <legend><?= __('Add Pay Cycle') ?></legend>
        <?= $this->Form->control('pay_cycle') ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
