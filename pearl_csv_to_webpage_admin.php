<?php $default_pearl_csv_to_webpage_bg_color = get_option('pearl_csv_to_webpage_bg_color');
      $default_pearl_csv_to_webpage_alt_bg_color = get_option('pearl_csv_to_webpage_alt_bg_color');
	  $default_pearl_csv_to_webpage_font_color = get_option('pearl_csv_to_webpage_font_color');
	  $default_pearl_csv_to_webpage_alt_font_color = get_option('pearl_csv_to_webpage_alt_font_color');
      $default_pearl_csv_to_webpage_border_width = get_option('pearl_csv_to_webpage_border_width');
	  $default_pearl_csv_to_webpage_border_color = get_option('pearl_csv_to_webpage_border_color');
	  $default_pearl_csv_to_webpage_padding = get_option('pearl_csv_to_webpage_padding');	  
	  $default_pearl_csv_to_webpage_fontsize = get_option('pearl_csv_to_webpage_fontsize');
	  $default_pearl_csv_to_webpage_mouseover_color = get_option('pearl_csv_to_webpage_mouseover_color');
	  $default_pearl_csv_to_webpage_alt_mouseover_color = get_option('pearl_csv_to_webpage_alt_mouseover_color');
		?>
      <form method="post">
           <label for="pearl_csv_to_webpage_bg_color">Bg Color :</label>
           <input type="text" name="pearl_csv_to_webpage_bg_color" value="<?php echo $default_pearl_csv_to_webpage_bg_color;?>"/>
           <label for="pearl_csv_to_webpage_alt_bg_color">Alt Bg Color :</label>
           <input type="text" name="pearl_csv_to_webpage_alt_bg_color" value="<?php echo $default_pearl_csv_to_webpage_alt_bg_color;?>"/><br/>
           <label for="pearl_csv_to_webpage_font_color">Font Color :</label>
           <input type="text" name="pearl_csv_to_webpage_font_color" value="<?php echo $default_pearl_csv_to_webpage_font_color;?>"/>
           <label for="pearl_csv_to_webpage_alt_font_color">Alt Font Color :</label>
           <input type="text" name="pearl_csv_to_webpage_alt_font_color" value="<?php echo $default_pearl_csv_to_webpage_alt_font_color;?>"/><br/>
           <label for="pearl_csv_to_webpage_border_width">Border Width :</label>
           <input type="text" name="pearl_csv_to_webpage_border_width" value="<?php echo $default_pearl_csv_to_webpage_border_width;?>"/>
           <label for="pearl_csv_to_webpage_border_color">Border Color :</label>
           <input type="text" name="pearl_csv_to_webpage_border_color" value="<?php echo $default_pearl_csv_to_webpage_border_color;?>"/>   <br/> 
           <label for="pearl_csv_to_webpage_padding">Padding :</label>
           <input type="text" name="pearl_csv_to_webpage_padding" value="<?php echo $default_pearl_csv_to_webpage_padding;?>"/>
           <label for="pearl_csv_to_webpage_fontsize">Font Size :</label>
           <input type="text" name="pearl_csv_to_webpage_fontsize" value="<?php echo $default_pearl_csv_to_webpage_fontsize;?>"/>
            <label for="pearl_csv_to_webpage_mouseover_color">Mousehover Color :</label>
           <input type="text" name="pearl_csv_to_webpage_mouseover_color" value="<?php echo $default_pearl_csv_to_webpage_mouseover_color;?>"/><br/>
           
           <label for="pearl_csv_to_webpage_alt_mouseover_color">Mousehover(Font) Color :</label>
           <input type="text" name="pearl_csv_to_webpage_alt_mouseover_color" value="<?php echo $default_pearl_csv_to_webpage_alt_mouseover_color;?>"/>
           
           <input type="submit" name="submit" value="Submit"/>
        </form>
        
         <p>Created by <a href="http://pearlbells.co.uk/" target="_blank">Pearlbells</a><br/> Follow me : <a href="http://twitter.com/#!/pearlbells" target="_blank">Twitter</a></p>
	<p>You are welcome to email me on lizeipe@gmail.com if you require any advice or have any suggestions.</p>