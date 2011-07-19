<?php
/*
Plugin Name: CSV to Webpage Pearlbells
Plugin URI: http://pearlbells.co.uk/
Description:  CSV to Webpage Pearlbells
Version:  1.0
Author:Pearlbells
Author URI: http://pearlbells.co.uk/contact.html
License: GPL2
*/
/*
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version. 

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details. 

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.

*/
$pearl_csv_to_webpage_class = new pearl_csv_to_webpage_class();
class pearl_csv_to_webpage_class
{
	function pearl_csv_to_webpage_css()
	{
		$myStyleUrl = WP_PLUGIN_URL . '/pearl_csv_to_webpage/css/pearl_csv_to_webpage_css.css';
        $myStyleFile = WP_PLUGIN_DIR . '/pearl_csv_to_webpage/css/pearl_csv_to_webpage_css.css';
        if ( file_exists($myStyleFile) ) 
		{
            wp_register_style('myStyleSheets', $myStyleUrl);
            wp_enqueue_style( 'myStyleSheets');
        }
	}
	
	function pearl_csv_to_webpage_script()
	{
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js');
		wp_enqueue_script( 'jquery' );?>
		<script type="text/javascript">
		var $jquery = jQuery.noConflict(); 
		$jquery(document).ready(function(){
		
		setStyleTable();	
		
		
		});
		function setStyleTable()
		{
			var pearl_csv_to_webpage_bg_color ='<?php echo get_option('pearl_csv_to_webpage_bg_color');?>';
	        var pearl_csv_to_webpage_alt_bg_color ='<?php echo get_option('pearl_csv_to_webpage_alt_bg_color');?>';
			var pearl_csv_to_webpage_font_color ='<?php echo get_option('pearl_csv_to_webpage_font_color');?>';
			var pearl_csv_to_webpage_alt_font_color ='<?php echo get_option('pearl_csv_to_webpage_alt_font_color');?>';
			var pearl_csv_to_webpage_border_width ='<?php echo get_option('pearl_csv_to_webpage_border_width');?>';
			var pearl_csv_to_webpage_border_color ='<?php echo get_option('pearl_csv_to_webpage_border_color');?>';			
			var pearl_csv_to_webpage_padding ='<?php echo get_option('pearl_csv_to_webpage_padding');?>';
			var pearl_csv_to_webpage_fontsize ='<?php echo get_option('pearl_csv_to_webpage_fontsize');?>';
			var pearl_csv_to_webpage_mouseover_color ='<?php echo get_option('pearl_csv_to_webpage_mouseover_color');?>';
			var pearl_csv_to_webpage_alt_mouseover_color ='<?php echo get_option('pearl_csv_to_webpage_alt_mouseover_color');?>';
			
		   $jquery('.pearl_tblstyle').css({
		   "border-width":pearl_csv_to_webpage_border_width,
		   "border-style":"solid",
		   "border-color": pearl_csv_to_webpage_border_color,
		   "font-size":pearl_csv_to_webpage_fontsize,
		   "margin":"10px"
		  });
		   
		
		 $jquery('#pearl_tbl tr:even').css({
			   "background-color":pearl_csv_to_webpage_alt_bg_color,"color":pearl_csv_to_webpage_alt_font_color});
		 $jquery('#pearl_tbl tr:odd').css({
			   "background-color":pearl_csv_to_webpage_bg_color,"color":pearl_csv_to_webpage_font_color});
		 $jquery('#pearl_tbl tr td').css({
			   "padding":pearl_csv_to_webpage_padding});
		 $jquery('#pearl_tbl tr').hover(
		function(){
			 $jquery(this).css({"background-color":pearl_csv_to_webpage_mouseover_color,"color":pearl_csv_to_webpage_alt_mouseover_color,"cursor":"pointer"}); //mouseover
		},
		function(){
			 $jquery('#pearl_tbl tr:even').css({"background-color":pearl_csv_to_webpage_alt_bg_color,"color":pearl_csv_to_webpage_alt_font_color});
			 $jquery('#pearl_tbl tr:odd').css({"background-color":pearl_csv_to_webpage_bg_color,"color":pearl_csv_to_webpage_font_color});
		}
	);}
		
	 
		</script>
		<?php
		
	}
	
	// Main plugin function
	
	function pearl_csv_to_webpage($atts, $content = null)
	{		
		extract( shortcode_atts( array(
		'filename' => 'score.csv'		
		), $atts ) );
		// Get the url
		$url = plugins_url();

	    $filename = $filename;
		
		if (($handle = fopen($url."/pearl_csv_to_webpage/upload/".$filename, "r")) !== FALSE)
		{
    	$row =0;
		
		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
		{
			 $read_csv_content[$row] = $data;
			 $row++;		
			
		}
		
		$display_csv_file_content = pearl_csv_to_webpage_class::pearl_DisplayData($read_csv_content);
    	
   		 fclose($handle);
		}
		
		return $display_csv_file_content;		
	}
	// Arrange Data in a Table
	
	function pearl_DisplayData($arrdat)
	{
		$num = count($arrdat);
		$numinside = count($arrdat[0]);
		
		$html = '<table class="pearl_tblstyle" id="pearl_tbl">';
		
		for($i=0;$i<$num;$i++)
		{
			$html .= '<tr>';
			
			for($j=0;$j<$numinside;$j++)
			{
				$html .= '<td>'.$arrdat[$i][$j].'</td>';
			}
			
			$html .= '</tr>';
		}
		
		$html .=  '</table>';
		
		return $html;
	}
	
	function pearl_csv_to_webpage_install()
	{
		
		add_option('pearl_csv_to_webpage_bg_color','#ffffff','','yes');
		add_option('pearl_csv_to_webpage_alt_bg_color','#cccccc','','yes');
		add_option('pearl_csv_to_webpage_font_color','#000000','','yes');
		add_option('pearl_csv_to_webpage_alt_font_color','#000000','','yes');		
		add_option('pearl_csv_to_webpage_border_color','#000000','','yes');
		add_option('pearl_csv_to_webpage_border_width','1px','','yes');
		add_option('pearl_csv_to_webpage_padding','5px','','yes');
		add_option('pearl_csv_to_webpage_fontsize','12px','','yes');
		add_option('pearl_csv_to_webpage_mouseover_color','#eeeeee','','yes');
		add_option('pearl_csv_to_webpage_alt_mouseover_color','#999999','','yes');
	}
	function pearl_csv_to_webpage_uninstall()
	{
		delete_option('pearl_csv_to_webpage_bg_color');
		delete_option('pearl_csv_to_webpage_alt_bg_color');
		delete_option('pearl_csv_to_webpage_font_color');
		delete_option('pearl_csv_to_webpage_alt_font_color');
		delete_option('pearl_csv_to_webpage_border_width');
		delete_option('pearl_csv_to_webpage_border_color');
		delete_option('pearl_csv_to_webpage_padding');
		delete_option('pearl_csv_to_webpage_fontsize');
		delete_option('pearl_csv_to_webpage_mouseover_color');
		delete_option('pearl_csv_to_webpage_alt_mouseover_color');
	}
	
	function pearl_csv_to_webpage_menu()
	{
		add_options_page('CSV to Webpage','CSV to Webpage','manage_options',__FILE__,array('pearl_csv_to_webpage_class','pearl_csv_to_webpage_menu_page'));  
	}
	function pearl_csv_to_webpage_menu_page()
	{
		?>
        <div class="wrap">
           <h2>Slideshow Settings</h2>
           <?php
		       if($_REQUEST['submit'])
			   {
				   pearl_csv_to_webpage_class::pearl_csv_to_webpage_update_option();
			   }
			       pearl_csv_to_webpage_class::pearl_csv_to_webpage_print_option();
		   ?>
        </div>
        <?php
	}
	
	function pearl_csv_to_webpage_update_option()
	{
		$ok = false;
		
		if($_REQUEST['pearl_csv_to_webpage_alt_bg_color'])
		{
			update_option('pearl_csv_to_webpage_alt_bg_color',$_REQUEST['pearl_csv_to_webpage_alt_bg_color']);
			$ok = true;
			
		}
		if($_REQUEST['pearl_csv_to_webpage_alt_font_color'])
		{
			update_option('pearl_csv_to_webpage_alt_font_color',$_REQUEST['pearl_csv_to_webpage_alt_font_color']);
			$ok = true;
			
		}
		if($_REQUEST['pearl_csv_to_webpage_font_color'])
		{
			update_option('pearl_csv_to_webpage_font_color',$_REQUEST['pearl_csv_to_webpage_font_color']);
			$ok = true;
			
		}
		if($_REQUEST['pearl_csv_to_webpage_fontsize'])
		{
			update_option('pearl_csv_to_webpage_fontsize',$_REQUEST['pearl_csv_to_webpage_fontsize']);
			$ok = true;
			
		}
		
		if($_REQUEST['pearl_csv_to_webpage_mouseover_color'])
		{
			update_option('pearl_csv_to_webpage_mouseover_color',$_REQUEST['pearl_csv_to_webpage_mouseover_color']);
			$ok = true;
			
		}
		if($_REQUEST['pearl_csv_to_webpage_alt_mouseover_color'])
		{
			update_option('pearl_csv_to_webpage_alt_mouseover_color',$_REQUEST['pearl_csv_to_webpage_alt_mouseover_color']);
			$ok = true;
			
		}
		if($_REQUEST['pearl_csv_to_webpage_border_color'])
		{
			update_option('pearl_csv_to_webpage_border_color',$_REQUEST['pearl_csv_to_webpage_border_color']);
			$ok = true;
			
		}
		if($_REQUEST['pearl_csv_to_webpage_border_width'])
		{
			update_option('pearl_csv_to_webpage_border_width',$_REQUEST['pearl_csv_to_webpage_border_width']);
			$ok = true;
			
		}
		if($_REQUEST['pearl_csv_to_webpage_bg_color'])
		{
			update_option('pearl_csv_to_webpage_bg_color',$_REQUEST['pearl_csv_to_webpage_bg_color']);
			$ok = true;
			
		}
		if($_REQUEST['pearl_csv_to_webpage_padding'])
		{
			update_option('pearl_csv_to_webpage_padding',$_REQUEST['pearl_csv_to_webpage_padding']);
			$ok = true;
			
		}
		
		
		if($ok)
		{?>
           <div id="message" class="updated fade">
           <p>Options Saved</p>
           </div>
        <?php
		}
		else
		{
			?>
           <div id="message" class="error fade">
           <p>Failed to save options</p>
           </div>
        <?php
		}
	}
	
	function pearl_csv_to_webpage_print_option()
	{
		include 'pearl_csv_to_webpage_admin.php';
	}
	
}
add_action('admin_menu',array($pearl_csv_to_webpage_class,'pearl_csv_to_webpage_menu'));
add_action('wp_print_styles', array($pearl_csv_to_webpage_class,'pearl_csv_to_webpage_css'));
add_action('wp_head', array($pearl_csv_to_webpage_class,'pearl_csv_to_webpage_script'));
add_shortcode('pearl_csv_to_webpage_display', array($pearl_csv_to_webpage_class,'pearl_csv_to_webpage'));
register_activation_hook(__FILE__,array($pearl_csv_to_webpage_class,'pearl_csv_to_webpage_install'));
register_deactivation_hook(__FILE__,array($pearl_csv_to_webpage_class,'pearl_csv_to_webpage_uninstall'));
?>