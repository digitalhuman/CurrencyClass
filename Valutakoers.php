<?php
/**
 * Description of Valutakoers
 *
 * @author Victor Angelier
 */

/**
 * Get realtime currency rates
 */
class Valutakoers {
    
    /**
     * URL xml currency exchange
     * @var string 
     */
    protected static $url = "http://www.ecb.int/stats/eurofxref/eurofxref-daily.xml";
    
    public function __construct() {        
    }
    
    /**
     * Get the current rate for specified currency
     * @param type $valuta Currency ISO 3 characters
     * @return boolean | float
     */
    static function get($valuta = "SEK"){
        $xml = simplexml_load_file(self::$url);
        foreach($xml->Cube->Cube->Cube as $koers){
            if((string)$koers["currency"] == strtoupper($valuta)){
                return (float)$koers["rate"];
            }
        }
        return false;
    }    
}
