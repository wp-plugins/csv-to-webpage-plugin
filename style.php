<?php

class styleData {
    
        public function __construct() {
            
            add_action( 'wp_enqueue_scripts', array($this,'safely_add_stylesheet') );
            add_action('wp_head', array($this,'pearl_script'));
            
        }
    
        public function safely_add_stylesheet() {
             wp_enqueue_style( 'csv-to-webpage', plugins_url('css/pearl_csv_to_webpage_css.css', __FILE__) );
         }
         
	public function pearl_script()
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
		   
		
		 $jquery('.pearl_tblstyle tr:even').css({
			   "background-color":pearl_csv_to_webpage_alt_bg_color,"color":pearl_csv_to_webpage_alt_font_color});
		 $jquery('.pearl_tblstyle tr:odd').css({
			   "background-color":pearl_csv_to_webpage_bg_color,"color":pearl_csv_to_webpage_font_color});
		 $jquery('.pearl_tblstyle tr td').css({
			   "padding":pearl_csv_to_webpage_padding});
		 $jquery('.pearl_tblstyle tr').hover(
		function(){
			 $jquery(this).css({"background-color":pearl_csv_to_webpage_mouseover_color,"color":pearl_csv_to_webpage_alt_mouseover_color,"cursor":"pointer"}); //mouseover
		},
		function(){
			 $jquery('.pearl_tblstyle tr:even').css({"background-color":pearl_csv_to_webpage_alt_bg_color,"color":pearl_csv_to_webpage_alt_font_color});
			 $jquery('.pearl_tblstyle tr:odd').css({"background-color":pearl_csv_to_webpage_bg_color,"color":pearl_csv_to_webpage_font_color});
		}
	);}
		
	 
		</script>
		<?php
		
	}
	
	// Main plugin function
    
}
?>
