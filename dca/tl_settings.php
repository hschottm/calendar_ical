<?php 
/**

 * @copyright  Christian Muenster 2017 
 * @author     Christian Muenster 
 * @license    LGPL 
 * @filesource
*/


$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] .= ';{cm_ical_legend},cm_icalBasepath'; 

/**
 * Add fields
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['cm_icalBasepath'] = array(
	    'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['cm_icalBasepath'],
		'exclude'           => true,
		'inputType'         => 'fileTree',
		'eval'              => array('files'=>false, 'fieldType'=>'radio', 'tl_class'=>'clr w50'),
        'save_callback' => array(array('cm_ICalSettings', 'saveFile')),
        'load_callback' => array(array('cm_ICalSettings', 'loadFile'))
//		'sql'               => "binary(16) NULL"
 );

class cm_ICalSettings extends \Backend
{
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}
    
/*    public function saveFile($value)
    {
            if(version_compare(VERSION, '3.2', '>='))
        {
            $uuid    = String::binToUuid($value);
            $objFile = FilesModel::findByUuid($uuid);
            $value   = $objFile->path;
        }
        return $value;
    }

    public function loadFile($value)
    {
        if(version_compare(VERSION, '3.2', '>='))
        {
            $objFile = FilesModel::findByPath($value);
            $value   = $objFile->uuid;
        }
        return $value;
  }
*/
  public function saveFile($value)
  {
    //echo strlen($value) == 16 ? \String::binToUuid($value) : $value; 
    if(version_compare(VERSION, '3.2', '>='))
    {
        $uuid    = String::binToUuid($value);
        $objFile = \FilesModel::findByUuid($value);
        $value   = $objFile->path;
    }
     return $value;
  }
  
	/**
	 * Save path in file, not a uuid by load dca 
	 *
	 * @param uuid
	 */
  public function loadFile($value)
  {
    //return \String::uuidToBin($value);
    if($value && version_compare(VERSION, '3.2', '>='))
    {
    	$objFile = FilesModel::findByPath($value);
        if ($objFile->numRows<1) return '';
        $value   = $objFile->uuid;
    }
     return $value;
  }   
} 

?>