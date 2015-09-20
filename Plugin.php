<?php

namespace Plugin\Budget;

use Core\Translator;
use Core\Plugin\Base;

class Plugin extends Base
{
    public function initialize()
    {
        $this->acl->extend('project_manager_acl', array('budget' => '*'));

        $this->template->hook->attach('project:dropdown', 'budget:project/dropdown');
        $this->template->hook->attach('user:sidebar:actions', 'budget:user/sidebar');

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
}
