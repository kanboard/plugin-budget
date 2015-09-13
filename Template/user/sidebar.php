<?php if ($this->user->isAdmin()): ?>
    <li <?= $this->app->getRouterController() === 'hourlyrate' ? 'class="active"' : '' ?>>
        <?= $this->url->link(t('Hourly rates'), 'hourlyrate', 'index', array('plugin' => 'budget', 'user_id' => $user['id'])) ?>
    </li>
<?php endif ?>