<?php
/**
 * SH_Craftsy Class
 * @author 		Sarah Henderson
 * @date			2013-07-07
 */
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
	
// widget class
class SH_Craftsy extends SH_Social_Service {

	public function __construct($type, $settings, $key) {
		parent::__construct($type, $settings, $key);
		$this->service = "Craftsy";
	}

	public function shareButton($url, $title = '', $showCount = false) {		
		return '';
	}
	
	public function linkButton($username) {
		if (strpos($username, 'http://') === 0 || strpos($username, 'https://') === 0) {
			$url = $username;
		} else if (strpos($username, "instructors/") !== false) {
			$url = "http://craftsy.com/$username";
		} else if (strpos($username, "pattern-store") !== false) {
			$url = "http://craftsy.com/user/$username";
		} else if (is_numeric($username)) {
			$url = "http://craftsy.com/user/$username";
		} else {
			$url = "http://craftsy.com/instructors/$username";
		}

		$html = '<a class="' . $this->cssClass() . '" href="'. $url. '" ' . 
			($this->newWindow ? 'target="_blank"' : '') . '>';
	
		$html .= $this->buttonImage();	
		
		$html .= '</a>';
	
		return $html;
	}
	
	public static function canShare() {
	 	return false;	
	}
	
	public static function description() {
        return __('Hint','crafty-social-buttons').": www.craftsy.com/user/<strong>user-id</strong>/ ("
        . __('numbers','crafty-social-buttons') .')'
        . __('For more options see Help > Link Buttons (link top right of screen)','crafty-social-buttons');
	}
}
?>