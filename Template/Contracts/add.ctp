<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contract $contract
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
<ul class="side-nav">
        <?= $this->element('navmenu',['nav_title'=>'Contract']);?>
    </ul>
</nav>
<div class="contracts form large-9 medium-8 columns content">
    <?= $this->Form->create($contract) ?>
    <fieldset>
        <legend><?= __('Add Contract') ?></legend>
        <table>
        <tr>
        <td colspan='3'><?= $this->Form->control('provider_id', ['options' => $providers]) ?></td>
        </tr>
        <tr>
        <td><?= $this->Form->control('total_incentive_amount', ['label' => 'Total Incentive']) ?></td>
        <td><?= $this->Form->control('pay_cycle_id', ['options' => $payCycles]) ?></td>
        <td><?= $this->Form->control('fte', ['label' => 'FTE']) ?></td>
        </tr>
        <tr>
        <td><?= $this->Form->control('effective_date', ['empty' => true]) ?></td>
        <td><?= $this->Form->control('effective_quality_date', ['empty' => true]) ?></td>
        <td><?= $this->Form->control('amendment_date', ['empty' => true]) ?></td>
        </tr>
        <tr>
        <td><?= $this->Form->control('default_expire_date', ['empty' => true]) ?></td>
        <td><?= $this->Form->control('inactive_date', ['empty' => true]) ?></td>
        <td><?= $this->Form->control('active') ?></td>
        </tr>
        <tr>
        <td colspan='3'><?= $this->Form->control('comments') ?></td>
        </tr>
        </table>
        <?php
            if(isset($_SERVER['REMOTE_USER'])){
                $username = $_SERVER['REMOTE_USER'];
            } else {
                $username = 'Unknown';
            }
        ?>
        <?= $this->Form->hidden('user', ['value'=>$username]) ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
