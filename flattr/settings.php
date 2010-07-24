<?php

class Flattr_Settings
{
    public function __construct()
    {
        add_action('admin_init',    array($this, 'register_settings') );
        add_action('admin_menu',    array( $this, 'init_ui') );
    }

    public function init_ui()
    {
        add_options_page('Flattr Setup', 'Flattr', 'manage_options', __FILE__, array($this, 'render'));
    }

    public function register_settings()
    {
		register_setting('flattr-settings-group', 'flattr_uid', 	array($this, 'validate_userid'));
		register_setting('flattr-settings-group', 'flattr_aut',		array($this, 'validate_auto'));
		register_setting('flattr-settings-group', 'flattr_aut_page',		array($this, 'validate_auto_page'));
		register_setting('flattr-settings-group', 'flattr_cat', 	array($this, 'validate_category'));
		register_setting('flattr-settings-group', 'flattr_lng',		array($this, 'validate_language'));
		register_setting('flattr-settings-group', 'flattr_compact', array($this, 'validate_checkbox'));
		register_setting('flattr-settings-group', 'flattr_hide',	array($this, 'validate_checkbox'));
		# Should the except be modified, too? (default: true)
		register_setting('flattr-settings-group', 'flattr_mod_exc', array($this, 'validate_modify_excerpts'));
		# Should the button be only shows in single view? (is_single() == true)
		register_setting('flattr-settings-group', 'flattr_only_single', array($this, 'validate_only_single'));
    }

    public function render()
    {
        include('settings-template.php');
    }
    
    public function validate_only_single($only_single) {
	return ($only_single == 'true' ? 'true' : 'false');
    }
    
    public function validate_modify_excerpts($modify_excerpts) {
	return ($modify_excerpts == 'true' ? 'true' : 'false');
    }
    
    public function validate_category($category)
    {
    	return $category;
    }
    
    public function validate_language($language)
    {
    	return $language;
    }

    public function validate_checkbox($input)
    {
        return ($input == 'true' ? 'true' : '');
    }
    
    public function validate_auto($input)
    {
        return ($input == 'on' ? 'on' : '');
    }

    public function validate_auto_page($input)
    {
        return ($input == 'on' ? 'on' : '');
    }
    
    public function validate_userid($userId)
    {    
    	return $userId;
    }
}
