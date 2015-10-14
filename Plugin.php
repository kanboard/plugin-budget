<?php

namespace Kanboard\Plugin\Budget;

use Kanboard\Core\Translator;
use Kanboard\Core\Plugin\Base;

class Plugin extends Base
{
    public function initialize()
    {
        $this->acl->extend('project_manager_acl', array('budget' => '*'));

        $this->template->hook->attach('template:project:dropdown', 'budget:project/dropdown');
        $this->template->hook->attach('template:user:sidebar:actions', 'budget:user/sidebar');

        $this->on('session.bootstrap', function($container) {
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
        return '1.0.0';
    }
}
