<?php

namespace Kanboard\Plugin\Budget;

use Kanboard\Core\Translator;
use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Security\Role;

class Plugin extends Base
{
    public function initialize()
    {
        $this->applicationAccessMap->add('HourlyRateController', '*', Role::APP_ADMIN);
        $this->projectAccessMap->add('BudgetController', '*', Role::PROJECT_MANAGER);

        $this->route->addRoute('/budget/project/:project_id', 'BudgetController', 'show', 'budget');
        $this->route->addRoute('/budget/project/:project_id/lines', 'BudgetLineController', 'show', 'budget');
        $this->route->addRoute('/budget/project/:project_id/breakdown', 'BudgetController', 'breakdown', 'budget');

        $this->template->hook->attach('template:project:dropdown', 'budget:project/dropdown');
        $this->template->hook->attach('template:user:sidebar:actions', 'budget:user/sidebar');
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
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
        return '1.0.9';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/kanboard/plugin-budget';
    }

    public function getCompatibleVersion()
    {
        return '>=1.0.37';
    }
}
