<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Provider $provider
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Provider']);?>
    </ul>
</nav>
<div class="providers form large-9 medium-8 columns content">
    <?= $this->Form->create($provider) ?>
    <fieldset>
        <legend><?= __('Edit Provider') ?></legend>
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
