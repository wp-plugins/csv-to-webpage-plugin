<?php
/*
Plugin Name: CSV to Webpage Pearlbells
Plugin URI: http://pearlbells.co.uk/
Description:  Display Excel files to Wordpress Website 
Version:  4.0
Author:Pearlbells
Author URI: http://pearlbells.co.uk/contact-page
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
namespace csvpearlbells;
include_once 'includes/form.php';
include_once 'includes/data.php';
include_once 'includes/optionsValues.php';
include_once 'includes/functions.php';
include_once 'includes/style.php';

class cvsToWebpage {
   
     private $objOptions;
 
     public function __construct() {
         add_action( 'admin_menu', array( $this, 'menu' ) );
         $this->objOptions = new optionsValues;
         $this->objOptions->add_options();
         new data;
         new styleData;
         register_deactivation_hook(__FILE__, array( $this, 'pearl_uninstall' ));
     }
     
     public function pearl_uninstall() {
         $this->objOptions->delete_options();
     }
     
     public function menu() {
        add_options_page('CSV to Webpage','CSV to Webpage','manage_options',__FILE__,array($this,'opt_page')); 
         
     }
  
     public function opt_page() {
        
         $this->postData();
     }
     
     public function postData() {
         
        $objFunc = new func();
        
        if($_REQUEST['upload']) {
            $objFunc->uploadFile();
        }
        if($_REQUEST['submit']) {
            $this->objOptions->update_options();
           
        }
        
         new displayForm;
    }
     
}

new cvsToWebpage;

?>
