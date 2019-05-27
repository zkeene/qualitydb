<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ServiceLine $serviceLine
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Service Line']);?>
    </ul>
</nav>
<div class="serviceLines form large-9 medium-8 columns content">
    <?= $this->Form->create($serviceLine) ?>
    <fieldset>
        <legend><?= __('Edit Service Line') ?></legend>
        <?= $this->Form->control('service_line') ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
