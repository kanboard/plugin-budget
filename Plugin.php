<?php

namespace Kanboard\Plugin\Budget;

use Kanboard\Core\Translator;
use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Security\Role;

class Plugin extends Base
{
    public function initialize()
    {
        $this->applicationAccessMap->add('hourlyrate', '*', Role::APP_ADMIN);
        $this->projectAccessMap->add('budget', '*', Role::PROJECT_MANAGER);

        $this->route->addRoute('/budget/project/:project_id', 'budget', 'index', 'budget');
        $this->route->addRoute('/budget/project/:project_id/lines', 'budget', 'create', 'budget');
        $this->route->addRoute('/budget/project/:project_id/breakdown', 'budget', 'breakdown', 'budget');

        $this->template->hook->attach('template:project:dropdown', 'budget:project/dropdown');
        $this->template->hook->attach('template:user:sidebar:actions', 'budget:user/sidebar');

        $this->on('app.bootstrap', function ($container) {
            Translator::load($container['config']->getCurrentLanguage(), __DIR__.'/Locale');
        });
    }

    public function getClasses()
    {
        return array(
            'Plugin\Budget\Model' => array(
                'HourlyRate',
                'Budget',
            )
        );
    }

    public function getPluginName()
    {
        return 'Budget Planning';
    }

    public function getPluginDescription()
    {
        return t('Add budget section for projects and expense reports based on user hourly rates');
    }

    public function getPluginAuthor()
    {
        return 'Frédéric Guillot';
    }

    public function getPluginVersion()
    {
        return '1.0.6';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/kanboard/plugin-budget';
    }
}
