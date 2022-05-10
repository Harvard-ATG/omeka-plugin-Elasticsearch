<?php

class Elasticsearch_Form_Display extends Omeka_Form
{
    public function init() {
        parent::init();

        $this->addElement('checkbox', 'elasticsearch_show_timestamps', array(
            'label' => __('Show timestamps?'),
            'description' => __('Show the timestamp when a result was created and when it was last updated'),
            'value' => get_option('elasticsearch_show_timestamps'),
        ));

        $this->addElement('submit', 'submit', array(
            'label' => __('Save')
        ));

        $this->addDisplayGroup(array(
            'elasticsearch_show_timestamps',
        ), 'fields');

        $this->addDisplayGroup(array('submit'), 'submit_button');
    }
};