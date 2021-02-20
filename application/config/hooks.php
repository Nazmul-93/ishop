<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$hook['pre_controller'][] = array(
    'class'    => 'SettingsController',
    'function' => 'ConfigSettings',
    'filename' => 'SettingsController.php',
    'filepath' => 'hooks');
