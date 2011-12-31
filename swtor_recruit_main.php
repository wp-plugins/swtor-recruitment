<?php
/**
*Plugin Name: SWTOR Recruitment
*Plugin URI: http://imcsoc.com/records/swtor-recruitment
*Description: An easy to use widget that displays your SWTOR guild's current recruiting needs.
*Version: 1.1.2
*Author: Seberius
*/

/*
*    Copyright 2012  Seberius  (email : widgets@imcsoc.com)
*
*    This program is free software; you can redistribute it and/or modify
*    it under the terms of the GNU General Public License, version 2, as 
*    published by the Free Software Foundation.
*
*    This program is distributed in the hope that it will be useful,
*    but WITHOUT ANY WARRANTY; without even the implied warranty of
*    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*    GNU General Public License for more details.
*
*    You should have received a copy of the GNU General Public License
*    along with this program; if not, write to the Free Software
*    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/* Defines the plugin directory */
define("SWTOR_RCMT_DIR", WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), "", plugin_basename(__FILE__)));

/* Loads the widget */
add_action('widgets_init', 'swtor_recruitment_init');

/* Registers the widget */
function swtor_recruitment_init() {
    register_widget('SWTOR_Recruitment');
}

/* Adds language support */
load_plugin_textdomain( 'swtor-recruitment', null, dirname( plugin_basename( __FILE__ ) ) . '/language/' );

/* Hooks for install/uninstall */
register_activation_hook(__FILE__, 'swtor_recruitment_install');
register_deactivation_hook(__FILE__, 'swtor_recruitment_uninstall');

/* Creates the options if they are not present */
if (!function_exists('swtor_recruitment_install')) {

    function swtor_recruitment_install() {
        $options = array(
			
            /* Imperial Agent Data */
			'empclass0-spec0-status' => '0',
			'empclass0-spec1-status' => '0',
            
            /* Bounty Hunter Data */
			'empclass1-spec0-status' => '0',
			'empclass1-spec1-status' => '0',
            
            /* Sith Inquisitor Data */
            'empclass2-spec0-status' => '0',
			'empclass2-spec1-status' => '0',
            
            /* Sith Warrior Data */
			'empclass3-spec0-status' => '0',
			'empclass3-spec1-status' => '0',
            
            /* Jedi Knight Data */
			'repclass0-spec0-status' => '0',
			'repclass0-spec1-status' => '0',
			
            /* Jedi Consular Data */
			'repclass1-spec0-status' => '0',
			'repclass1-spec1-status' => '0',
			
            /* Smuggler Data */
			'repclass2-spec0-status' => '0',
			'repclass2-spec1-status' => '0',
            
            /* Trooper Data */
			'repclass3-spec0-status' => '0',
			'repclass3-spec1-status' => '0',
            
		);
	
        add_option('swtor_recruitment_options', $options);
    }

}

if (!function_exists('swtor_recruitment_uninstall')) {

    function swtor_recruitment_uninstall() {
        // delete_option('swtor_recruitment_options');
    }

}

/* A variable to let us use the status data easily */
$swtor_options = get_option('swtor_recruitment_options');

/* Sets the CSS file to be used */
wp_enqueue_style('swtor_structure', SWTOR_RCMT_DIR . 'css/style.css');

class SWTOR_Recruitment extends WP_Widget {
	
	/* Establishes some data for the widget */
	function SWTOR_Recruitment() {
		
		$widget_options = array(
			'classname' => 'swtor-recruitment',
			'description' => __('A recruitment widget for Star Wars: The Old Republic', 'swtor-recruitment')
		);
		
		$control_options = array (
			'width' => 250,
		);
		
		$this->WP_Widget('SWTOR-Recruitment', __('SWTOR Recruitment', 'swtor-recruitment'), $widget_options, $control_options);
	}
	
	/* This creates the widget seen on the site */
	function widget($args, $instance) {
		
		global $swtor_options;
		
		extract($args);
		
		$title = apply_filters('widget_title', $instance['title']);
		
		/* Checks if the faction has been set, then sets a variable that is used to call the correct images */
		if(isset($instance['current_faction'])) {
			if ($instance['current_faction'] == 'Empire') {
				$current_faction = 'emp';
			}
			else {
				$current_faction = 'rep';
			};
		}
		else {
			$current_faction = 'emp';
		};
		
		/* Sets a variable that is used to link to the url destination */
		$current_URL = esc_url($instance['current_url']);
		
		/* Checks if the language has been set, then sets a variable that is used to call the correct images */
		if(isset($instance['current_language'])) {
			if ($instance['current_language'] == '0') {
				$current_language = 'en';
			}
			else if($instance['current_language'] == '1') {
				$current_language = 'fr';
			}
			else{
				$current_language = 'de';
			};
		}
		else {
			$current_language = 'en';
		};
		?>
		
		<?php echo $before_widget; ?>
		<?php echo $before_title . $title . $after_title; ?>
		
		<div class = "swtor-recruitment-container" onclick = "location.href = '<?php echo $current_URL; ?>'" style = "cursor:pointer;" title = "<?php echo $current_URL; ?>">
			<div class = "<?php echo 'swtor-language-' . $current_language . ' swtor-' . $current_faction; ?>" ></div>
			<?php for ($class_num = 0; $class_num <= 3; $class_num++) { ?>
				<div class = "swtor-class <?php echo 'swtor-language-' . $current_language . ' swtor-' . $current_faction . 'class' . $class_num; ?>" >
					<?php $status_num = $swtor_options[$current_faction . 'class' . $class_num . '-spec0-status']?>
					<div class = "<?php echo 'swtor-language-' . $current_language . ' swtor-status' . $status_num . ' swtor-spec0' ?>" ></div>
					
					<?php $status_num = $swtor_options[$current_faction . 'class' . $class_num . '-spec1-status']?>
					<div class = "<?php echo 'swtor-language-' . $current_language . ' swtor-status' . $status_num . ' swtor-spec1' ?>" ></div>
					
				</div>
				
			<?php } ?>
			
		</div>
		
		<?php echo $after_widget; ?>
		
	<?php
	}
	
	/* Sanitizes input and passes the data to the unique instance of the widget */
	function update($new_instance, $old_instance) {
		
		$instance = $old_instance;
		$instance['title'] = wp_filter_nohtml_kses($new_instance['title']);
		$instance['current_url'] = esc_url($new_instance['current_url']);
		$instance['current_faction'] = wp_filter_nohtml_kses($new_instance['current_faction']);
		$instance['current_language'] = absint($new_instance['current_language']);
		
		return $instance;
		
	}
	
	/* Creates the title input and faction selection for each unique instance of the widget */
	function form($instance) {
		
		$defaults = array('current_faction' => 'Empire', 'current_language' => '0');
        $instance = wp_parse_args((array) $instance, $defaults);
		
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title: ', 'swtor-recruitment') ?></label>
			<input type = "text"
				   id = "<?php echo $this->get_field_id('title'); ?>"
				   name = "<?php echo $this->get_field_name('title'); ?>"
				   value = "<?php echo $instance['title']; ?>"
				   style = "width: 100%;"
			/>
			
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('current_url'); ?>"><?php _e('Recruitment URL: ', 'swtor-recruitment') ?></label>
			<input type = "text"
				   id = "<?php echo $this->get_field_id('current_url'); ?>"
				   name = "<?php echo $this->get_field_name('current_url'); ?>"
				   value = "<?php echo $instance['current_url']; ?>"
				   style = "width: 100%;"
			/>
			
		</p>
		<div>
			<label for = "<?php echo $this->get_field_id('current_faction'); ?>"><?php _e('Select Faction: ', 'swtor-recruitment') ?></label>
			<select id = "<?php echo $this->get_field_id('current_faction'); ?>" name = "<?php echo $this->get_field_name('current_faction'); ?>" >
                <?php $current_faction = $instance['current_faction']; ?>
				<option value = 'Empire' <?php if ($current_faction == 'Empire') { echo 'selected="selected"'; } ?>; ><?php _e('Empire', 'swtor-recruitment') ?></option>
                <option value = 'Republic' <?php if ($current_faction == 'Republic') { echo 'selected="selected"'; } ?>; ><?php _e('Republic', 'swtor-recruitment') ?></option>
			</select>
			
		</div>>
		<div>
			<label for = "<?php echo $this->get_field_id('current_language'); ?>"><?php _e('Select Language: ', 'swtor-recruitment') ?></label>
			<select id = "<?php echo $this->get_field_id('current_language'); ?>" name = "<?php echo $this->get_field_name('current_language'); ?>" >
                <?php $current_language = $instance['current_language']; ?>
				<option value = '0' <?php if ($current_language == '0') { echo 'selected="selected"'; } ?>; ><?php _e('English', 'swtor-recruitment') ?></option>
                <option value = '1' <?php if ($current_language == '1') { echo 'selected="selected"'; } ?>; ><?php _e('French', 'swtor-recruitment') ?></option>
				<option value = '2' <?php if ($current_language == '2') { echo 'selected="selected"'; } ?>; ><?php _e('German', 'swtor-recruitment') ?></option>
			</select>
			
		</div>
		
		<?php
		
	}
	
}

/* Checks if user is admin and calls the admin page */
if (is_admin ()) {
	include 'admin/admin.php';
	
}

?>