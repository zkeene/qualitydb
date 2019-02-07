<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProviderType $providerType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $providerType->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $providerType->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Provider Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Providers'), ['controller' => 'Providers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Provider'), ['controller' => 'Providers', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="providerTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($providerType) ?>
    <fieldset>
        <legend><?= __('Edit Provider Type') ?></legend>
        <?php
            echo $this->Form->control('provider_type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
