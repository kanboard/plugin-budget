<div class="sidebar">
    <h2><?= t('Budget') ?></h2>
    <ul>
        <li <?= $this->app->getRouterAction() === 'index' ? 'class="active"' : '' ?>>
            <?= $this->url->link(t('Budget overview'), 'budget', 'index', array('plugin' => 'budget', 'project_id' => $project['id'])) ?>
        </li>
        <li <?= $this->app->getRouterAction() === 'create' ? 'class="active"' : '' ?>>
            <?= $this->url->link(t('Budget lines'), 'budget', 'create', array('plugin' => 'budget', 'project_id' => $project['id'])) ?>
        </li>
        <li <?= $this->app->getRouterAction() === 'breakdown' ? 'class="active"' : '' ?>>
            <?= $this->url->link(t('Cost breakdown'), 'budget', 'breakdown', array('plugin' => 'budget', 'project_id' => $project['id'])) ?>
        </li>
    </ul>
</div>