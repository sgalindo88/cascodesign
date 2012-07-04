<?php

class TCTGO_Plugin {
	
	private static $form_field_name = 'term_group_order';
	
	private static $instance;
	
	private static $name = 'TCTGO_Plugin';
	
	private static $plugin_path;
	
	private static $taxonomies;
	
	private static $textdomain = 'mailchimp-widget';
	
	private function __construct () {
		
		self::$plugin_path = realpath(dirname(__FILE__) . '/../Tag or Category term_group order.php');
		
		
		
		register_activation_hook(self::$plugin_path, array(&$this, 'activate'));

		register_deactivation_hook(self::$plugin_path, array(&$this, 'deactivate'));
		
		add_action('init', array(&$this, 'init'));
		
		self::load_text_domain();
		
	}
	
	public function add_column_header ($columns) {
		
		$columns['term_group'] = __('Group', 'term-group-order');
		
		return $columns;
 		
	}
	
	public function add_column_value ($empty = '', $custom_column, $term_id) {
		
		$taxonomy = (isset($_POST['taxonomy'])) ? $_POST['taxonomy'] : $_GET['taxonomy'];
		
		$term = get_term($term_id, $taxonomy);
		
		return $term->$custom_column;
		
	}
	
	public function add_edit_term_group ($term_id) {
		
		global $wpdb;
		
		if (isset($_POST[self::$form_field_name])) {
			
			$wpdb->update($wpdb->terms, array('term_group' => $_POST[self::$form_field_name]), array('term_id' => $term_id));
			
		}
		
	}
	
	public function term_group_add_form_field () {
		
		$form_field = '<div class="form-field"><label for="' . self::$form_field_name . '">' . __('Group', 'term-group-order') . '</label><input name="' . self::$form_field_name . '" id="' . self::$form_field_name . '" type="text" value="0" size="10" /><p>' . __('You can give a group number for similar categories or tags. For example: Red, green, blue can be group 1 of categories. Small, medium, large can be group 2 of categories.', 'term-group-order') . '</p></div>';
		
		echo $form_field;
		
	}
	
	public function term_group_edit_form_field ($term) {
		
		$form_field = '<tr class="form-field"><th scope="row" valign="top"><label for="' . self::$form_field_name . '">' . __('Group', 'term-group-order')  . '</label></th><td><input name="' . self::$form_field_name . '" id="' . self::$form_field_name . '" type="text" value="' . $term->term_group . '" size="10" /><p class="description">' . __('You can give a group number for similar categories or tags. For example: Red, green, blue can be group 1 of categories. Small, medium, large can be group 2 of categories.', 'term-group-order') .'</p></td></tr>';
		
		echo $form_field;
		
	}
	
	public function quick_edit_term_group () {
		
		$term_group_field = '<fieldset><div class="inline-edit-col"><label><span class="title">' . __( 'Group' , 'term-group-order') . '</span><span class="input-text-wrap"><input class="ptitle" name="'. self::$form_field_name . '" type="text" value="" /></span></label></div></fieldset>';
		
		$term_group_field .= '<script type="text/javascript">
		
		</script>';
		
		echo $term_group_field;
		
	}
	
	/**
	 *
	*/
	public function get_instance () {
		
		if (empty(self::$instance)) {
			
			self::$instance = new self::$name;
			
		}
		
		return self::$instance;
		
	}
	//activates the plugin
	public function activate () {
		
		
		
	}
	//deactivate the plugin
	public function deactivate () {
		
		
		
	}
	
	public function init () {
		
		self::$taxonomies = get_taxonomies();
		
		foreach (self::$taxonomies as $key => $value) {
			
			add_filter("manage_edit-{$value}_columns", array(&$this, 'add_column_header'));
			add_filter("manage_{$value}_custom_column", array(&$this, 'add_column_value'), 10, 3);
			
			add_action("{$value}_add_form_fields", array(&$this, 'term_group_add_form_field'));
			add_action("{$value}_edit_form_fields", array(&$this, 'term_group_edit_form_field'));
			
		}
		
		add_filter("manage_edit-tags_columns", array(&$this, 'add_column_header'));
		
		add_action('create_term', array(&$this, 'add_edit_term_group'));
		
		add_action('edit_term', array(&$this, 'add_edit_term_group'));
		
		add_action('quick_edit_custom_box', array(&$this, 'quick_edit_term_group'), 10, 3);
		
	}
	
	private static function load_text_domain () {
		
		load_plugin_textdomain(self::$textdomain, null, str_replace('lib', 'languages', dirname(plugin_basename(__FILE__))));
		
	}
	
}

?>
