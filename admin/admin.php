<?php
/* SWTOR Recruitment Administration*/
add_action('admin_init', 'swtor_recruitment_admin_init');
add_action('admin_menu', 'swtor_recruitment_admin_add_page');

/* Adds the options to the white list */
function swtor_recruitment_admin_init() {
    register_setting('swtor_recruitment_settings', 'swtor_recruitment_options', 'swtor_recruitment_admin_validate');
}

/* Adds the page to the settings menu */
function swtor_recruitment_admin_add_page() {
    add_options_page('SWTOR Recruitment Administration', 'SWTOR Recruitment', 'manage_options', 'swtor_recruitment_admin', 'swtor_recruitment_admin_do_page');
}

/* Creates the page */
function swtor_recruitment_admin_do_page() {
?>

<div class="wrap">
    <h2><?php _e('SWTOR Recruitment Status', 'swtor-recruitment') ?></h2>
    <form method="post" action="options.php">
        <?php settings_fields('swtor_recruitment_settings'); ?>
        <?php $swtor_admin_options = get_option('swtor_recruitment_options'); ?>
        
        <table class = "form-table" style = "max-width: 20%" >
            
            <!-- Empire Header -->
            <tr style = "background-color: #dddddd;">
                <td colspan = "4"><label for = "<?php echo _e('Empire', 'swtor-recruitment'); ?>" ><h3><?php _e('Empire', 'swtor-recruitment'); ?></h3></label></td>
            </tr>
            <!-- Imperial Agent Settings -->
            <tr style = "background-color: #ddcccc;">
                <td colspan = "4"><label for = "<?php echo _e('Imperial Agent', 'swtor-recruitment'); ?>" ><span style = "font-weight: bold" ><?php _e('Imperial Agent', 'swtor-recruitment'); ?></span></label></td>
            </tr>
            <tr>
                <td><?php echo _e('Operative:', 'swtor-recruitment'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[empclass0-spec0-status]"; >
                    <?php $current_status = $swtor_admin_options['empclass0-spec0-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; ><?php _e('Closed', 'swtor-recruitment') ?></option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; ><?php _e('Limited', 'swtor-recruitment') ?></option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; ><?php _e('Open', 'swtor-recruitment') ?></option>
                </select>
                </td>
                <td><?php echo _e('Sniper:', 'swtor-recruitment'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[empclass0-spec1-status]"; >
                    <?php $current_status = $swtor_admin_options['empclass0-spec1-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; ><?php _e('Closed', 'swtor-recruitment') ?></option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; ><?php _e('Limited', 'swtor-recruitment') ?></option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; ><?php _e('Open', 'swtor-recruitment') ?></option>
                </select>
                </td>
            </tr>
            <!-- Bounty Hunter Settings -->
            <tr style = "background-color: #ddcccc;">
                <td colspan = "4"><label for = "<?php echo _e('Bounty Hunter', 'swtor-recruitment'); ?>" ><span style = "font-weight: bold" ><?php _e('Bounty Hunter', 'swtor-recruitment'); ?></span></label></td>
            </tr>
            <tr>
                <td><?php echo _e('Mercenary:', 'swtor-recruitment'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[empclass1-spec0-status]"; >
                    <?php $current_status = $swtor_admin_options['empclass1-spec0-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; ><?php _e('Closed', 'swtor-recruitment') ?></option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; ><?php _e('Limited', 'swtor-recruitment') ?></option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; ><?php _e('Open', 'swtor-recruitment') ?></option>
                </select>
                </td>
                <td><?php echo _e('Powertech:', 'swtor-recruitment'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[empclass1-spec1-status]"; >
                    <?php $current_status = $swtor_admin_options['empclass1-spec1-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; ><?php _e('Closed', 'swtor-recruitment') ?></option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; ><?php _e('Limited', 'swtor-recruitment') ?></option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; ><?php _e('Open', 'swtor-recruitment') ?></option>
                </select>
                </td>
            </tr>
            <!-- Sith Inquisitor Settings -->
            <tr style = "background-color: #ddcccc;">
                <td colspan = "4"><label for = "<?php echo _e('Sith Inquisitor', 'swtor-recruitment'); ?>" ><span style = "font-weight: bold" ><?php _e('Sith Inquisitor', 'swtor-recruitment'); ?></span></label></td>
            </tr>
            <tr>
                <td><?php echo _e('Assassin:', 'swtor-recruitment'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[empclass2-spec0-status]"; >
                    <?php $current_status = $swtor_admin_options['empclass2-spec0-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; ><?php _e('Closed', 'swtor-recruitment') ?></option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; ><?php _e('Limited', 'swtor-recruitment') ?></option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; ><?php _e('Open', 'swtor-recruitment') ?></option>
                </select>
                </td>
                <td><?php echo _e('Sorcerer:', 'swtor-recruitment'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[empclass2-spec1-status]"; >
                    <?php $current_status = $swtor_admin_options['empclass2-spec1-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; ><?php _e('Closed', 'swtor-recruitment') ?></option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; ><?php _e('Limited', 'swtor-recruitment') ?></option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; ><?php _e('Open', 'swtor-recruitment') ?></option>
                </select>
                </td>
            </tr>
            <!-- Sith Warrior Settings -->
            <tr style = "background-color: #ddcccc;">
                <td colspan = "4"><label for = "<?php echo _e('Sith Warrior', 'swtor-recruitment'); ?>" ><span style = "font-weight: bold" ><?php _e('Sith Warrior', 'swtor-recruitment'); ?></span></label></td>
            </tr>
            <tr>
                <td><?php echo _e('Juggernaut:', 'swtor-recruitment'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[empclass3-spec0-status]"; >
                    <?php $current_status = $swtor_admin_options['empclass3-spec0-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; ><?php _e('Closed', 'swtor-recruitment') ?></option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; ><?php _e('Limited', 'swtor-recruitment') ?></option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; ><?php _e('Open', 'swtor-recruitment') ?></option>
                </select>
                </td>
                <td><?php echo _e('Marauder:', 'swtor-recruitment'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[empclass3-spec1-status]"; >
                    <?php $current_status = $swtor_admin_options['empclass3-spec1-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; ><?php _e('Closed', 'swtor-recruitment') ?></option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; ><?php _e('Limited', 'swtor-recruitment') ?></option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; ><?php _e('Open', 'swtor-recruitment') ?></option>
                </select>
                </td>
            </tr>
            <!-- Republic Header -->
            <tr style = "background-color: #dddddd;">
                <td colspan = "4"><label for = "<?php echo _e('Republic', 'swtor-recruitment'); ?>" ><h3><?php _e('Republic', 'swtor-recruitment'); ?></h3></label></td>
            </tr>
            <!-- Jedi Knight Settings -->
            <tr style = "background-color: #ccccff;">
                <td colspan = "4"><label for = "<?php echo _e('Jedi Knight', 'swtor-recruitment'); ?>" ><span style = "font-weight: bold" ><?php _e('Jedi Knight', 'swtor-recruitment'); ?></span></label></td>
            </tr>
            <tr>
                <td><?php echo _e('Guardian:', 'swtor-recruitment'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[repclass0-spec0-status]"; >
                    <?php $current_status = $swtor_admin_options['repclass0-spec0-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; ><?php _e('Closed', 'swtor-recruitment') ?></option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; ><?php _e('Limited', 'swtor-recruitment') ?></option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; ><?php _e('Open', 'swtor-recruitment') ?></option>
                </select>
                </td>
                <td><?php echo _e('Sentinel:', 'swtor-recruitment'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[repclass0-spec1-status]"; >
                    <?php $current_status = $swtor_admin_options['repclass0-spec1-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; ><?php _e('Closed', 'swtor-recruitment') ?></option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; ><?php _e('Limited', 'swtor-recruitment') ?></option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; ><?php _e('Open', 'swtor-recruitment') ?></option>
                </select>
                </td>
            </tr>
            <!-- Jedi Consular Settings -->
            <tr style = "background-color: #ccccff;">
                <td colspan = "4"><label for = "<?php echo _e('Jedi Consular', 'swtor-recruitment'); ?>" ><span style = "font-weight: bold" ><?php _e('Jedi Consular', 'swtor-recruitment'); ?></span></label></td>
            </tr>
            <tr>
                <td><?php echo _e('Sage:', 'swtor-recruitment'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[repclass1-spec0-status]"; >
                    <?php $current_status = $swtor_admin_options['repclass1-spec0-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; ><?php _e('Closed', 'swtor-recruitment') ?></option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; ><?php _e('Limited', 'swtor-recruitment') ?></option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; ><?php _e('Open', 'swtor-recruitment') ?></option>
                </select>
                </td>
                <td><?php echo _e('Shadow:', 'swtor-recruitment'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[repclass1-spec1-status]"; >
                    <?php $current_status = $swtor_admin_options['repclass1-spec1-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; ><?php _e('Closed', 'swtor-recruitment') ?></option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; ><?php _e('Limited', 'swtor-recruitment') ?></option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; ><?php _e('Open', 'swtor-recruitment') ?></option>
                </select>
                </td>
            </tr>
            <!-- Smuggler Settings -->
            <tr style = "background-color: #ccccff;">
                <td colspan = "4"><label for = "<?php echo _e('Smuggler', 'swtor-recruitment'); ?>" ><span style = "font-weight: bold" ><?php _e('Smuggler', 'swtor-recruitment'); ?></span></label></td>
            </tr>
            <tr>
                <td><?php echo _e('Gunslinger:', 'swtor-recruitment'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[repclass2-spec0-status]"; >
                    <?php $current_status = $swtor_admin_options['repclass2-spec0-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; ><?php _e('Closed', 'swtor-recruitment') ?></option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; ><?php _e('Limited', 'swtor-recruitment') ?></option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; ><?php _e('Open', 'swtor-recruitment') ?></option>
                </select>
                </td>
                <td><?php echo _e('Scoundrel:', 'swtor-recruitment'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[repclass2-spec1-status]"; >
                    <?php $current_status = $swtor_admin_options['repclass2-spec1-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; ><?php _e('Closed', 'swtor-recruitment') ?></option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; ><?php _e('Limited', 'swtor-recruitment') ?></option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; ><?php _e('Open', 'swtor-recruitment') ?></option>
                </select>
                </td>
            </tr>
            <!-- Trooper Settings -->
            <tr style = "background-color: #ccccff;">
                <td colspan = "4"><label for = "<?php echo _e('Trooper', 'swtor-recruitment'); ?>" ><span style = "font-weight: bold" ><?php _e('Trooper', 'swtor-recruitment'); ?></span></label></td>
            </tr>
            <tr>
                <td><?php echo _e('Commando:', 'swtor-recruitment'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[repclass3-spec0-status]"; >
                    <?php $current_status = $swtor_admin_options['repclass3-spec0-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; ><?php _e('Closed', 'swtor-recruitment') ?></option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; ><?php _e('Limited', 'swtor-recruitment') ?></option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; ><?php _e('Open', 'swtor-recruitment') ?></option>
                </select>
                </td>
                <td><?php echo _e('Vanguard:', 'swtor-recruitment'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[repclass3-spec1-status]"; >
                    <?php $current_status = $swtor_admin_options['repclass3-spec1-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; ><?php _e('Closed', 'swtor-recruitment') ?></option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; ><?php _e('Limited', 'swtor-recruitment') ?></option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; ><?php _e('Open', 'swtor-recruitment') ?></option>
                </select>
                </td>
            </tr>
        </table>
        
        <p class="submit">
        <input type="submit" class="button-primary" value="<?php _e('Update Status', 'swtor-recruitment') ?>" />
        </p>
        
    </form>
</div>

<?php
}

/* Validates the input as only integer values */
function swtor_recruitment_admin_validate($input) {

    foreach ($input as $spec_key => $status) {
        $input[$spec_key] = absint($status);
    }

    return $input;
}

?>