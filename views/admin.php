<div class="wrap">
<h1>CUSTOMER LEGO  options</h1> 
    <form method="post" action="options.php">   
        <?php settings_fields( 'WPInsertCode_options_group' ); ?>
    <table class="form-table">
        <tr>
        <th scope="row"><label for="WPInsertCode_options1"><?php _e( 'Option 1', 'wp-insert-code') ?></label></th>
        <td><input name="WPInsertCode_options[option1]" type="text" id="WPInsertCode_options1" value="<?php echo esc_attr($options['option1']); ?>" class="regular-text" /></td>
        </tr>
        <tr>
        <th scope="row"><label for="WPInsertCode__options2"><?php _e( 'Option 1', 'wp-insert-code') ?></label></th>
        <td><input name="WPInsertCode_options[option2]" type="text" id="WPInsertCode_options2" value="<?php echo esc_attr($options['option2']); ?>" class="regular-text" />
        
        </tr>
    </table>
    	<?php submit_button(); ?>
    </form>
</div>