<?php if ($nav_title!='Utilities'): ?>
  <li class="heading">New</li>
  <li><?= $this->Html->link(__($nav_title), ['action' => 'add']) ?></li>
<?php endif; ?>
<li class="heading"><?= __('Listings') ?></li>
<li><?= $this->Html->link(__('Service Lines'), ['controller' => 'ServiceLines', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('Providers'), ['controller' => 'Providers', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('Contracts'), ['controller' => 'Contracts', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('Provider Types'), ['controller' => 'ProviderTypes', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('Pay Cycles'), ['controller' => 'PayCycles', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('Performances'), ['controller' => 'Performances', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('Specific Metrics'), ['controller' => 'SpecificMetrics', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('Metrics'), ['controller' => 'Metrics', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('Threshold Colors'), ['controller' => 'ThresholdColors', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('Specific Metric Thresholds'), ['controller' => 'SpecificMetricThresholds', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
<li class="heading"><?= __('Utilities') ?></li>
<li><a target="_blank" href="/scorecard/upload.php">Upload Data</a></li>
<li><a target="_blank" href="/scorecard/delete_performance.php">Delete Data</a></li>
<li><a target="_blank" href="/scorecard/lock_period.php">Lock Period</a></li>
<li><a target="_blank" href="/scorecard/provider_list.php">Active Provider List</a></li>
<li><a target="_blank" href="/scorecard/duplicate_specific.php">Duplicate Specific Metric</a></li>