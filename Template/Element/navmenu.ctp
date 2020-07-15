<?php if ($nav_title!='Utilities'): ?>
  <li class="heading">New</li>
  <li><?= $this->Html->link(__($nav_title), ['action' => 'add']) ?></li>
<?php endif; ?>
<li class="heading"><?= __('Listings') ?></li>
<li><?= $this->Html->link(__('Service Lines'), ['controller' => 'ServiceLines', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('Providers'), ['controller' => 'Providers', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('Metrics'), ['controller' => 'Metrics', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('Default Overrides'), ['controller' => 'Overrides', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('Messages'), ['controller' => 'Messages', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('Provider Types'), ['controller' => 'ProviderTypes', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('Pay Cycles'), ['controller' => 'PayCycles', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('Threshold Colors'), ['controller' => 'ThresholdColors', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('Locations'), ['controller' => 'Locations', 'action' => 'index']) ?></li>
<li class="heading"><?= __('Utilities') ?></li>
<li><?= $this->Html->link(__('Find Contract by Date'), ['controller' => 'Contracts', 'action' => 'find']) ?></li>
<li><a target="_blank" href="/scorecard/upload.php">Upload Quarter Data</a></li>
<li><a target="_blank" href="/scorecard/upload_period.php">Upload Period Data</a></li>
<li><?= $this->Html->link(__('Delete Data'), ['controller' => 'Performances', 'action' => 'bulkDelete']) ?></li>
<li><a target="_blank" href="/scorecard/lock_period.php">Lock Period</a></li>
<li><?= $this->Html->link(__('Duplicate Specific Metric'), ['controller' => 'SpecificMetrics', 'action' => 'duplicate']) ?></li>
<li><a target="_blank" href="/scorecard/duplicate_year.php">Duplicate Year</a></li>
<li><a target="_blank" href="/update.php">Update System from GitHub</a></li>
<li class="heading"><?= __('Reports') ?></li>
<li><a target="_blank" href="/scorecard/metric_definitions.php">Metric Definitions</a></li>
<li><a target="_blank" href="/scorecard/provider_list.php">Active Provider List</a></li>
<li><a target="_blank" href="/scorecard/duplicate_performance.php">Providers with Duplicate Performance</a></li>