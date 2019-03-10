<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Provider $provider
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Providers'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Service Lines'), ['controller' => 'ServiceLines', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Service Line'), ['controller' => 'ServiceLines', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Provider Types'), ['controller' => 'ProviderTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Provider Type'), ['controller' => 'ProviderTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Contracts'), ['controller' => 'Contracts', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Contract'), ['controller' => 'Contracts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Performances'), ['controller' => 'Performances', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Performance'), ['controller' => 'Performances', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="providers form large-9 medium-8 columns content">
    <?= $this->Form->create($provider) ?>
    <fieldset>
        <legend><?= __('Add Provider') ?></legend>
        <?php
            echo $this->Form->control('provider_name');
            echo $this->Form->control('service_line_id', ['options' => $serviceLines]);
            echo $this->Form->control('provider_type_id', ['options' => $providerTypes]);
            echo $this->Form->control('SER');
            echo $this->Form->control('NPI');
            echo $this->Form->control('badge_num');
            echo $this->Form->control('provider_status', ['options'=> array(1=>'Active',0=>'Inactive')]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
