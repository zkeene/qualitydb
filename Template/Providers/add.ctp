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
        <legend><?= __('Add Provider') ?></legend>
        <table>
            <tr>
            <td colspan='2'><?= $this->Form->control('provider_name') ?></td>
            </tr>
            <tr>
            <td><?= $this->Form->control('service_line_id', ['options' => $serviceLines]) ?></td>
            <td><?= $this->Form->control('provider_type_id', ['options' => $providerTypes]) ?></td>
            </tr>
            <tr>
            <td><?= $this->Form->control('SER', ['label' => 'Epic SER']) ?></td>
            <td><?= $this->Form->control('NPI') ?></td>
            </tr>
            <tr>
            <td><?= $this->Form->control('badge_num', ['label' => 'KHN Badge']) ?></td>
            <td><?= $this->Form->control('provider_status', ['options' => array(1=>'Active',0=>'Inactive'), 'label' => 'Status']) ?></td>
            </tr>
            </table>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
