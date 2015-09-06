<?php
namespace csvpearlbells;
class data {
        public $tableHeading;
        public function __construct() {
           add_shortcode('pearl_csv_to_webpage_display', array($this,'csv_to_webpage'));
        }
    
	public function csv_to_webpage($atts ,$content = null )
	{		
		extract( shortcode_atts( array(
		'filename' => 'score.csv'		
		), $atts ) );
		
		$dir = plugin_dir_path(dirname(__FILE__));
                $filepath = $dir."upload/".$filename;
                $filename = $filename;
		
                try {
                    if(file_exists($filepath)) {

                        if (($handle = fopen($dir."/upload/".$filename, "r")) !== FALSE)
                        {
                            $row =0;
                            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
                            {
                                $read_csv_content[$row] = $data;
                                $row++;		
                            }

                            $display_csv_file_content = $this->DisplayData($read_csv_content);

                            fclose($handle);
                        }
                    }
                    else {
                        echo 'File not found';
                    }
                }
                catch (Exception $e) {
                    echo "Error (File: ".$e->getFile().", line ".$e->getLine()."): ".$e->getMessage();
                }
		
		return $display_csv_file_content;		
	}
	// Arrange Data in a Table
	
	public function DisplayData($arrdat)
	{
		$num = count($arrdat);
		$numinside = count($arrdat[0]);
		$html = '<table class="pearl_tblstyle" ><thead>';
		for( $i=0; $i<$num; $i++ )
		{
                    $html .= '<tr>';

                    for( $j=0; $j<$numinside; $j++ )
                    {
                        if( $i == 0 )
                        {
                            $html .= '<th data-content="'.$arrdat[$i][$j].'">'.$arrdat[$i][$j].'</th>';
                            $head[$j] = $arrdat[$i][$j];
                        }
                        else
                        $html .=  '<td data-content="'.$head[$j].'">'.$arrdat[$i][$j].'</td>';
                    }
                    $html .= '</tr>';
                    if ($i == 0 ) $html .= '</thead><tbody>';
		}
		
		$html .=  '</tbody></table>';
		
		return $html;
	}      
}
?>
