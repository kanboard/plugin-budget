<?php if ($this->user->hasAccess('hourlyrate', 'index')): ?>
    <li <?= $this->app->getRouterController() === 'hourlyrate' ? 'class="active"' : '' ?>>
        <?= $this->url->link(t('Hourly rate'), 'hourlyrate', 'index', array('plugin' => 'budget', 'user_id' => $user['id'])) ?>
    </li>
<?php endif ?>