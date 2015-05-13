<?php
/**
 * Created by IntelliJ IDEA.
 * User: Naram Kim (a.k.a. Unknown) unknown@grotesq.com
 * Date: 15. 4. 23.
 * Time: 오전 6:37
 */

namespace Unk;

class IEChecker {
	private $MAX_VERSION = 11;
	private $ua;

	public $isIE = false;
	public $version = -1;

	private function checkIE11() {
		if( strrpos( $this->ua, 'trident' ) !== false && strrpos( $this->ua, 'msie' ) === false ) :
			$this->isIE = true;
			$this->version = 11;
			return true;
		endif;

		return false;
	}

	private function checkIE() {
		if( strrpos( $this->ua, 'msie' ) !== false ) :
			$this->isIE = true;
			$result = array();
			preg_match( "/msie ([0-9]{1,}[\.0-9]{0,})/", $this->ua, $result );
			if( count( $result ) > 1 ) :
				$this->version = intval( $result[ 1 ] );
			endif;
		else :
			$this->isIE = false;
		endif;
	}

	public function __construct() {
		$this->ua = $_SERVER[ 'HTTP_USER_AGENT' ];
		$this->ua = strtolower( $this->ua );

		if( $this->checkIE11() === false ) :
			$this->checkIE();
		endif;
	}

	public function getClass() {
		if( !$this->isIE ) :
			return '';
		endif;

		$className = ' is-ie ie-'.$this->version;

		for( $i = $this->version + 1; $i <= $this->MAX_VERSION; $i++ ) :
			$className .=  ' lt-ie' . $i;
		endfor;

		return $className;
	}
}