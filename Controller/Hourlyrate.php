<?php

namespace Kanboard\Plugin\Budget\Controller;

use Kanboard\Controller\User;

/**
 * Hourly Rate controller
 *
 * @package  controller
 * @author   Frederic Guillot
 */
class Hourlyrate extends User
{
    /**
     * Display rate and form
     *
     * @access public
     */
    public function index(array $values = array(), array $errors = array())
    {
        $user = $this->getUser();

        $this->response->html($this->layout('budget:hourlyrate/index', array(
            'rates' => $this->hourlyRate->getAllByUser($user['id']),
            'currencies_list' => $this->config->getCurrencies(),
            'values' => $values + array('user_id' => $user['id']),
            'errors' => $errors,
            'user' => $user,
        )));
    }

    /**
     * Validate and save a new rate
     *
     * @access public
     */
    public function save()
    {
        $values = $this->request->getValues();
        list($valid, $errors) = $this->hourlyRate->validateCreation($values);

        if ($valid) {

            if ($this->hourlyRate->create($values['user_id'], $values['rate'], $values['currency'], $values['date_effective'])) {
                $this->flash->success(t('Hourly rate created successfully.'));
                $this->response->redirect($this->helper->url->to('hourlyrate', 'index', array('plugin' => 'budget', 'user_id' => $values['user_id'])));
            }
            else {
                $this->flash->failure(t('Unable to save the hourly rate.'));
            }
        }

        $this->index($values, $errors);
    }

    /**
     * Confirmation dialag box to remove a row
     *
     * @access public
     */
    public function confirm()
    {
        $user = $this->getUser();

        $this->response->html($this->layout('budget:hourlyrate/remove', array(
            'rate_id' => $this->request->getIntegerParam('rate_id'),
            'user' => $user,
        )));
    }

    /**
     * Remove a row
     *
     * @access public
     */
    public function remove()
    {
        $this->checkCSRFParam();
        $user = $this->getUser();

        if ($this->hourlyRate->remove($this->request->getIntegerParam('rate_id'))) {
            $this->flash->success(t('Rate removed successfully.'));
        }
        else {
            $this->flash->success(t('Unable to remove this rate.'));
        }

        $this->response->redirect($this->helper->url->to('hourlyrate', 'index', array('plugin' => 'budget', 'user_id' => $user['id'])));
    }
}
