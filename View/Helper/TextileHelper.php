<?php
/**
 * TextileHelper
 *
 * @author: Marco Pegoraro <marco.pegoraro@gmail.com>
 * @info: 	http://movableapp.com/textile
 * @git:	https://github.com/thepeg/Textile/blob/master/View/Helper/TextileHelper.php
 */



// Import vendor's library
App::import( 'Vendor', 'Textile.classTextile' );

class TextileHelper extends AppHelper {
	
	private $Textile = null;
	
	public function __construct( $_View, $_Options ) {
		
		parent::__construct( $_View, $_Options );
		
		$this->Textile = new Textile;
		
	}
	
	
	
	
/**
 * Public access to the internal textile engine.
 */	
	public function engine() { return $this->Textile; }
	










/**
 * Parse a string using the Textile vendor's library
 */	
	public function parse( $str ) {
		
		return $this->Textile->TextileThis( $str);
		
	}
	
	
	
/**
 * It parse a text but remove block tags who can't fit inside a title
 */	
	public function title( $str ) {
		
		$allowed_tags = '<a><b><i><u><em><strong><sup><sub><small>';
		
		return strip_tags( $this->parse($str), $allowed_tags );
		
	}
	
}