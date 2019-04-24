<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProviderType $providerType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Provider Type']);?>
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
