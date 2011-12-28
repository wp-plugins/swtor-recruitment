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
    <h2>SW:TOR Recruitment Status</h2>
    <form method="post" action="options.php">
        <?php settings_fields('swtor_recruitment_settings'); ?>
        <?php $swtor_admin_options = get_option('swtor_recruitment_options'); ?>
        
        <table class = "form-table" style = "max-width: 20%" >
            
            <!-- Empire Header -->
            <tr style = "background-color: #dddddd;">
                <td colspan = "4"><label for = "<?php echo _e('Empire'); ?>" ><h3><?php _e('Empire'); ?></h3></label></td>
            </tr>
            <!-- Imperial Agent Settings -->
            <tr style = "background-color: #ddcccc;">
                <td colspan = "4"><label for = "<?php echo _e('Imperial Agent'); ?>" ><span style = "font-weight: bold" ><?php _e('Imperial Agent'); ?></span></label></td>
            </tr>
            <tr>
                <td><?php echo _e('Operative:'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[empclass0-spec0-status]"; >
                    <?php $current_status = $swtor_admin_options['empclass0-spec0-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; >Closed</option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; >Limited</option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; >Open</option>
                </select>
                </td>
                <td><?php echo _e('Sniper:'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[empclass0-spec1-status]"; >
                    <?php $current_status = $swtor_admin_options['empclass0-spec1-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; >Closed</option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; >Limited</option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; >Open</option>
                </select>
                </td>
            </tr>
            <!-- Bounty Hunter Settings -->
            <tr style = "background-color: #ddcccc;">
                <td colspan = "4"><label for = "<?php echo _e('Bounty Hunter'); ?>" ><span style = "font-weight: bold" ><?php _e('Bounty Hunter'); ?></span></label></td>
            </tr>
            <tr>
                <td><?php echo _e('Mercenary:'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[empclass1-spec0-status]"; >
                    <?php $current_status = $swtor_admin_options['empclass1-spec0-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; >Closed</option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; >Limited</option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; >Open</option>
                </select>
                </td>
                <td><?php echo _e('Powertech:'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[empclass1-spec1-status]"; >
                    <?php $current_status = $swtor_admin_options['empclass1-spec1-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; >Closed</option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; >Limited</option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; >Open</option>
                </select>
                </td>
            </tr>
            <!-- Sith Inquisitor Settings -->
            <tr style = "background-color: #ddcccc;">
                <td colspan = "4"><label for = "<?php echo _e('Sith Inquisitor'); ?>" ><span style = "font-weight: bold" ><?php _e('Sith Inquisitor'); ?></span></label></td>
            </tr>
            <tr>
                <td><?php echo _e('Assassin:'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[empclass2-spec0-status]"; >
                    <?php $current_status = $swtor_admin_options['empclass2-spec0-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; >Closed</option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; >Limited</option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; >Open</option>
                </select>
                </td>
                <td><?php echo _e('Sorcerer:'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[empclass2-spec1-status]"; >
                    <?php $current_status = $swtor_admin_options['empclass2-spec1-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; >Closed</option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; >Limited</option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; >Open</option>
                </select>
                </td>
            </tr>
            <!-- Sith Warrior Settings -->
            <tr style = "background-color: #ddcccc;">
                <td colspan = "4"><label for = "<?php echo _e('Sith Warrior'); ?>" ><span style = "font-weight: bold" ><?php _e('Sith Warrior'); ?></span></label></td>
            </tr>
            <tr>
                <td><?php echo _e('Juggernaut:'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[empclass3-spec0-status]"; >
                    <?php $current_status = $swtor_admin_options['empclass3-spec0-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; >Closed</option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; >Limited</option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; >Open</option>
                </select>
                </td>
                <td><?php echo _e('Marauder:'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[empclass3-spec1-status]"; >
                    <?php $current_status = $swtor_admin_options['empclass3-spec1-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; >Closed</option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; >Limited</option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; >Open</option>
                </select>
                </td>
            </tr>
            <!-- Republic Header -->
            <tr style = "background-color: #dddddd;">
                <td colspan = "4"><label for = "<?php echo _e('Republic'); ?>" ><h3><?php _e('Republic'); ?></h3></label></td>
            </tr>
            <!-- Jedi Knight Settings -->
            <tr style = "background-color: #ccccff;">
                <td colspan = "4"><label for = "<?php echo _e('Jedi Knight'); ?>" ><span style = "font-weight: bold" ><?php _e('Jedi Knight'); ?></span></label></td>
            </tr>
            <tr>
                <td><?php echo _e('Guardian:'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[repclass0-spec0-status]"; >
                    <?php $current_status = $swtor_admin_options['repclass0-spec0-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; >Closed</option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; >Limited</option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; >Open</option>
                </select>
                </td>
                <td><?php echo _e('Sentinel:'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[repclass0-spec1-status]"; >
                    <?php $current_status = $swtor_admin_options['repclass0-spec1-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; >Closed</option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; >Limited</option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; >Open</option>
                </select>
                </td>
            </tr>
            <!-- Jedi Consular Settings -->
            <tr style = "background-color: #ccccff;">
                <td colspan = "4"><label for = "<?php echo _e('Jedi Consular'); ?>" ><span style = "font-weight: bold" ><?php _e('Jedi Consular'); ?></span></label></td>
            </tr>
            <tr>
                <td><?php echo _e('Sage:'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[repclass1-spec0-status]"; >
                    <?php $current_status = $swtor_admin_options['repclass1-spec0-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; >Closed</option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; >Limited</option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; >Open</option>
                </select>
                </td>
                <td><?php echo _e('Shadow:'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[repclass1-spec1-status]"; >
                    <?php $current_status = $swtor_admin_options['repclass1-spec1-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; >Closed</option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; >Limited</option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; >Open</option>
                </select>
                </td>
            </tr>
            <!-- Smuggler Settings -->
            <tr style = "background-color: #ccccff;">
                <td colspan = "4"><label for = "<?php echo _e('Smuggler'); ?>" ><span style = "font-weight: bold" ><?php _e('Smuggler'); ?></span></label></td>
            </tr>
            <tr>
                <td><?php echo _e('Gunslinger:'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[repclass2-spec0-status]"; >
                    <?php $current_status = $swtor_admin_options['repclass2-spec0-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; >Closed</option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; >Limited</option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; >Open</option>
                </select>
                </td>
                <td><?php echo _e('Scoundrel:'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[repclass2-spec1-status]"; >
                    <?php $current_status = $swtor_admin_options['repclass2-spec1-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; >Closed</option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; >Limited</option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; >Open</option>
                </select>
                </td>
            </tr>
            <!-- Trooper Settings -->
            <tr style = "background-color: #ccccff;">
                <td colspan = "4"><label for = "<?php echo _e('Trooper'); ?>" ><span style = "font-weight: bold" ><?php _e('Trooper'); ?></span></label></td>
            </tr>
            <tr>
                <td><?php echo _e('Commando:'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[repclass3-spec0-status]"; >
                    <?php $current_status = $swtor_admin_options['repclass3-spec0-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; >Closed</option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; >Limited</option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; >Open</option>
                </select>
                </td>
                <td><?php echo _e('Vanguard:'); ?></td>
                <td>
                <select name = "swtor_recruitment_options[repclass3-spec1-status]"; >
                    <?php $current_status = $swtor_admin_options['repclass3-spec1-status']; ?>
                    <option value = '0' <?php if ($current_status == '0') { echo 'selected="selected"'; } ?> style = 'background-color: #ff0000'; >Closed</option>
                    <option value = '1' <?php if ($current_status == '1') { echo 'selected="selected"'; } ?> style = 'background-color: #ffff00'; >Limited</option>
                    <option value = '2' <?php if ($current_status == '2') { echo 'selected="selected"'; } ?> style = 'background-color: #00ff00'; >Open</option>
                </select>
                </td>
            </tr>
        </table>
        
        <p class="submit">
        <input type="submit" class="button-primary" value="<?php _e('Update Status') ?>" />
        </p>
        
    </form>
</div>

<?php
}

/* Validates the input as only integer values */
function swtor_recruitment_admin_validate($input) {

    foreach ($input as $spec_key => $status) {
        $input[$spec_key] = intval($status);
    }

    return $input;
}

?>