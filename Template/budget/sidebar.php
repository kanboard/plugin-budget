<div class="sidebar">
    <h2><?= t('Budget') ?></h2>
    <ul>
        <li <?= $this->app->getRouterAction() === 'index' ? 'class="active"' : '' ?>>
            <?= $this->url->link(t('Budget overview'), 'BudgetController', 'index', array('plugin' => 'budget', 'project_id' => $project['id'])) ?>
        </li>
        <li <?= $this->app->getRouterAction() === 'create' ? 'class="active"' : '' ?>>
            <?= $this->url->link(t('Budget lines'), 'BudgetController', 'create', array('plugin' => 'budget', 'project_id' => $project['id'])) ?>
        </li>
        <li <?= $this->app->getRouterAction() === 'breakdown' ? 'class="active"' : '' ?>>
            <?= $this->url->link(t('Cost breakdown'), 'BudgetController', 'breakdown', array('plugin' => 'budget', 'project_id' => $project['id'])) ?>
        </li>
    </ul>
</div>
