<div class="wrap">
<h1>CUSTOMER LEGO  options</h1> 
    <form method="post" action="options.php">   
        <?php settings_fields( 'WPInsertCode_options_group' ); ?>
    <table class="form-table">
        <tr>
        <th scope="row"><label for="WPInsertCode_options1">Option 1</label></th>
        <td><input name="WPInsertCode__options[option1]" type="text" id="WPInsertCode__options1" value="<?php echo esc_attr($options['option1']); ?>" class="regular-text" /></td>
        </tr>
        <tr>
        <th scope="row"><label for="WPInsertCode__options2">Option 2</label></th>
        <td><input name="WPInsertCode__options[option2]" type="text" id="WPInsertCode__options2" value="<?php echo esc_attr($options['option2']); ?>" class="regular-text" />
        
        </tr>
    </table>
    	<?php submit_button(); ?>
    </form>
</div>