<?php if ($this->user->isProjectManagementAllowed($project['id'])): ?>
    <li>
        <i class="fa fa-pie-chart fa-fw"></i>
        <?= $this->url->link(t('Budget'), 'budget', 'index', array('plugin' => 'budget', 'project_id' => $project['id'])) ?>
    </li>
<?php endif ?>