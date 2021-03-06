<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Themes extends MX_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->data["carabiner_css"] = 'admin-plugin';
        $this->data["carabiner_js"] = 'admin-chart';
        $this->data['view'] = 'dashboard';
        $this->load->view(ctTemplate('admin'), $this->data);
    }

    public function chart($type = 'flot') {
        $this->data["carabiner_css"] = 'admin-plugin';
        if ($type == 'flot') {
            $js["chart"] = array(
                array('bower_components/flot/excanvas.min.js'),
                array('bower_components/flot/jquery.flot.js'),
                array('bower_components/flot/jquery.flot.pie.js'),
                array('bower_components/flot/jquery.flot.resize.js'),
                array('bower_components/flot/jquery.flot.time.js'),
                array('bower_components/flot.tooltip/js/jquery.flot.tooltip.min.js'),
                array('js/flot-data.js'),
            );
            $this->data['view'] = 'themes-flot';
        } else {
            $js["chart"] = array(
                array('bower_components/raphael/raphael-min.js'),
                array('bower_components/morrisjs/morris.min.js'),
                array('js/morris-data.js'),
            );
            $this->data['view'] = 'themes-morris';
        }
        $this->data["carabiner_js"] = 'admin-chart';
        $this->carabiner->group('admin-chart', array('js' => $js["chart"]));

        $this->load->view(ctTemplate('admin'), $this->data);
    }

    public function login() {
        $css = array(
            array('bower_components/bootstrap/dist/css/bootstrap.min.css'),
            array('bower_components/metisMenu/dist/metisMenu.min.css'),
            array('dist/css/sb-admin-2.css'),
            array('bower_components/font-awesome/css/font-awesome.min.css'),
        );
        $this->carabiner->group('admin-css-login', array('css' => $css));
        $js = array(
            array('bower_components/jquery/dist/jquery.min.js'),
            array('bower_components/bootstrap/dist/js/bootstrap.min.js'),
            array('dist/js/sb-admin-2.js'),
        );
        $this->carabiner->group('admin-js-login', array('js' => $js));


        $this->load->view(ctTemplate('admin', 'template-login'), $this->data);
    }

}
