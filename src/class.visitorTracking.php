<?php
/**
 * A simple PHP class to gather visitor information, and store it in a database using MYSQLi
 *
 * visitorTracking
 *
 * LICENSE: THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 * EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
 * OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE
 * FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF
 * CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 * WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * @category   HTML,PHP5,Databases,Geography
 * @author     Tyler Heshka <tyler@heshka.com>
 * @see        http://keybase.io/theshka
 * @license    http://opensource.org/licenses/MIT
 * @version    1.2.1
 * @link       http://tyrexi.us/visitorTracking
*/

/**
 * The visitorTracking class
 *
 * This PHP class gathers detailed visitor information,
 * and stores the visit in a database using MYSQLi.
 */
class visitorTracking
{
	/**
	 * Stores "thisVisit" array
	 */
	var $thisVisit = null;
    var $comment = null;
    
//    function visitorTracking($comment)
//    {
//        $this->comment=$comment;
//    }

	/**
	 * MYSQLi connection
	 */
	private $link = null;

   /**
    * The constructor method
    *
    * This method calls the db_connect method, which constructs
    * and initializes the conection to the database. Once established,
    * the track method is called. This method gathers the data to insert.
    *
    * @access public
    */
	public function __construct($comment)
	{

        $this->comment=$comment;
        
		//Call the db_connect method
		$this->db_connect();

		//Call the track method
		$this->track();

	}

   /**
    * The destructor method
    *
    * This method tests for a connection to the database,
    * if the connection is active, this method will close
    * the connection to the MYSQLi database.
    *
    * @access private
    */
	private function __destruct()
	{

		//Test for database connection
		if( $this->link )
		{
			//Disconnect the database
			$this->link->close();
		}

	}

   /**
    * Connect to the databse
    *
    * This method sets the character encoding for the databse,
    * then trys to connect to the databse using MYSQLi. The
    * constants are defined in a seperate file and included at runtime.
    * If the method fails to connect with the database, the script dies,
    * and a unable to connect error is shown to the user.
    *
    * @access private
    */
	private function db_connect()
	{

		//Establish MYSQLi link
		mb_internal_encoding( 'UTF-8' );
		mb_regex_encoding( 'UTF-8' );
		mysqli_report( MYSQLI_REPORT_STRICT );

		try
		{
			$this->link = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );
			$this->link->set_charset( "utf8" );
		}
		catch ( Exception $e )
		{
			die( 'Unable to connect to database' );
		}

	}

	/**
	 * Tracking Method
	 *
	 * This is the main tracking method. It gathers all of the
	 * other methods in the class in to an array, and then inserts
	 * the array in to the database. If a connection to the database
	 * cannot be established, an error is shown to the user.
	 *
	 * @access protected
	 */
	protected function track()
	{
		//TODO: rewrite geoCheckIP function, consolidate variables with array.
        
        $date=getdate();
        
        //Prepare variables
		$visitor_ip 		= $this->getIP(TRUE);
        
        if($visitor_ip!=null){
            $ip_location		= $this->geoCheckIP($this->getIP());
            $visitor_city		= $ip_location['town'];
            $visitor_state		= $ip_location['state'];
            $visitor_country	= explode('-', $ip_location['country']);
            $visitor_cname		= trim($visitor_country[1]);
            
        }
        else{            
            $visitor_ip 		= "localhost".rand(10,99);
            $visitor_city		= "kolkata";
            $visitor_state		= "WB";
            $visitor_cname		= "India";
        }
        
        $visitor_browser	= $this->getBrowserType();
        $visitor_OS			= $this->getOS();
        $visitor_date		= date("d/m/y g:i:s a e",time());
        $visitor_day		= $date['mday'];
        $visitor_month		= $date['mon'];
        $visitor_year		= $date['year'];
        $visitor_hour		= $date['hours'];
        $visitor_minute     = $date['minutes'];
        $visitor_seconds	= $date['seconds'];

		//Gather variables in array
		$visitor = array(
            'visitor_comment'   => $this->comment,
			'visitor_ip' 		=> $visitor_ip,
			'visitor_city' 		=> $visitor_city,
			'visitor_state' 	=> $visitor_state,
			'visitor_country' 	=> $visitor_cname,
			'visitor_browser' 	=> $visitor_browser,
			'visitor_OS' 		=> $visitor_OS,
			'visitor_date' 		=> $visitor_date,
			'visitor_day' 		=> $visitor_day,
			'visitor_month' 	=> $visitor_month,
			'visitor_year' 		=> $visitor_year,
			'visitor_hour' 		=> $visitor_hour,
			'visitor_minute' 	=> $visitor_minute,
			'visitor_seconds' 	=> $visitor_seconds
		);

		//Make sure the array isn't empty
        	if( empty( $visitor ) )
        	{
            		return false;
        	}

        	//Insert the data
        	$sql = "INSERT INTO `visitors`";
        	$fields = array();
        	$values = array();

        	foreach( $visitor as $field => $value )
        	{
            		$fields[] = $field;
            		$values[] = "'".$value."'";
        	}
        	$fields = ' (' . implode(', ', $fields) . ')';
        	$values = '('. implode(', ', $values) .')';

        	$sql .= $fields .' VALUES '. $values;

        	$query = $this->link->query( $sql );

        	if( $this->link->error )
        	{
        		
//         		echo $this->link->error_list;
//        		$list=$this->link->error_list;
//        		echo mysqli_error($this->link);
//        		foreach($list as $field => $value )
//        		{
//        			echo $field ." = ".$value;
//        		}
                
                die ( 'DB ERROR! Unable to track visit.' );
        		return false;
        	}
        	else
        	{
        		//set thisVisit variable equal to visitor array
        		$this->thisVisit = $visitor;
                
        		return true;

        	}

	}

	/**
	 * Get visitor IP address
	 *
	 * This method tests rigorously for the current users IP address
	 * It tests the $_SERVER vars to find IP addresses even if they
	 * are being proxied, forwarded, or otherwise obscured.
	 *
	 * @param boolean $getHostByAddr the IP address with hostname
	 * @return string $ip the formatted IP address
	 */
	private function getIP($getHostByAddr=FALSE)
	{

		foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key)
		{
			if (array_key_exists($key, $_SERVER) === true)
			{
				foreach (array_map('trim', explode(',', $_SERVER[$key])) as $ip)
				{
					if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false)
					{
						if ($getHostByAddr === TRUE)
						{
							return getHostByAddr($ip);
						}
						else
						{
							return $ip;
						}
					}
				}
			}
		}

	}

	/**
	 * Geo-locate visitor IP address
	 *
	 * This method accepts an IP address. It then tests the address
	 * for validity, connects to the netip.de geo server, and user
	 * a set of regex patterns to scrape the location results.
	 * The method then returns an array of the geolocation information.
	 *
	 * @param string $ip the IPv4 address to lookup on netip.de
	 * @return array geolocation data: country, state, town
	 */
	private function geoCheckIP($ip)
	{

		//check, if the provided ip is valid
		if(!filter_var($ip, FILTER_VALIDATE_IP) || $ip == 'localhost')
		{
			//throw new InvalidArgumentException("IP is not valid");
			return false;
		}

		//contact ip-server
		$response=@file_get_contents('http://www.netip.de/search?query='.$ip);
		if (empty($response))
		{
			//throw new InvalidArgumentException("Error contacting Geo-IP-Server");
			return false;
		}

		//Array containing all regex-patterns necessary to extract ip-geoinfo from page
		$patterns=array();
		$patterns["domain"] 	= '#Domain: (.*?)&nbsp;#i';
		$patterns["country"] 	= '#Country: (.*?)&nbsp;#i';
		$patterns["state"] 		= '#State/Region: (.*?)<br#i';
		$patterns["town"] 		= '#City: (.*?)<br#i';

 		//Array where results will be stored
		$ipInfo=array();

		//check response from ipserver for above patterns
		foreach ($patterns as $key => $pattern)
		{
			//store the result in array
			$ipInfo[$key] = preg_match($pattern,$response,$value) && !empty($value[1]) ? $value[1] : 'not found';
		}

		   return $ipInfo;

	}

	/**
	 * Get the visitor browser-type
	 *
	 * This method tests the $_SERVER vars for an HTTP_USER_AGENT entry.
	 * Through a series of if statements, preg_match, and regex patterns,
	 * a browser-type will be returned. If a browser-type is unable to be
	 * determined 'other' will be used in it's place.
	 *
	 * @param null
	 * @return string|null $browser_agent the formatted browser-type string
	 */
	private function getBrowserType ()
	{

		if (!empty($_SERVER['HTTP_USER_AGENT']))
		{
			$HTTP_USER_AGENT = $_SERVER['HTTP_USER_AGENT'];
		}
		else if (!empty($HTTP_SERVER_VARS['HTTP_USER_AGENT']))
		{
			$HTTP_USER_AGENT = $HTTP_SERVER_VARS['HTTP_USER_AGENT'];
		}
		else if (!isset($HTTP_USER_AGENT))
		{
			$HTTP_USER_AGENT = '';
		}
		if (preg_match('#Opera(/| )([0-9].[0-9]{1,2})#', $HTTP_USER_AGENT, $log_version))
		{
			$browser_version = $log_version[2];
			$browser_agent = 'Opera';
		}
		else if (preg_match('#MSIE ([0-9].[0-9]{1,2})#', $HTTP_USER_AGENT, $log_version))
		{
			$browser_version = $log_version[1];
			$browser_agent = 'IE';
		}
		else if (preg_match('#OmniWeb/([0-9].[0-9]{1,2})#', $HTTP_USER_AGENT, $log_version))
		{
			$browser_version = $log_version[1];
			$browser_agent = 'OmniWeb';
		}
		else if (preg_match('#Netscape([0-9]{1})#', $HTTP_USER_AGENT, $log_version))
		{
			$browser_version = $log_version[1];
			$browser_agent = 'Netscape';
		}
		else if (preg_match('#Mozilla/([0-9].[0-9]{1,2})#', $HTTP_USER_AGENT, $log_version))
		{
			$browser_version = $log_version[1];
			$browser_agent = 'WebKit';
		}
		else if (preg_match('#Konqueror/([0-9].[0-9]{1,2})#', $HTTP_USER_AGENT, $log_version))
		{
			$browser_version = $log_version[1];
			$browser_agent = 'konqueror';
		}
		else
		{
			$browser_version = 0;
			$browser_agent = 'other';
		}

		return $browser_agent;

	}

	/**
	 * Get the visitor operating system
	 *
	 * This method tests the $_SERVER vars for an HTTP_USER_AGENT entry
	 * Through a series of if statements, preg_match, and regex patterns,
	 * the users OS will be returned. If a OS is unable to be determined
	 * the string 'other' will be used in it's place.
	 *
	 * @param null
	 * @return string $os_platform the formatted os-type string
	 */
	private function getOS()
	{

		$user_agent	=	$_SERVER['HTTP_USER_AGENT'];
		$os_platform	=	"Unknown OS Platform";
		$os_array	=	array(
						'/windows nt 6.3/i'     =>  'Windows 8.1',
						'/windows nt 6.2/i'     =>  'Windows 8',
						'/windows nt 6.1/i'     =>  'Windows 7',
						'/windows nt 6.0/i'     =>  'Windows Vista',
						'/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
						'/windows nt 5.1/i'     =>  'Windows XP',
						'/windows xp/i'         =>  'Windows XP',
						'/windows nt 5.0/i'     =>  'Windows 2000',
						'/windows me/i'         =>  'Windows ME',
						'/win98/i'              =>  'Windows 98',
						'/win95/i'              =>  'Windows 95',
						'/win16/i'              =>  'Windows 3.11',
						'/macintosh|mac os x/i' =>  'Mac OS X',
						'/mac_powerpc/i'        =>  'Mac OS 9',
						'/linux/i'              =>  'Linux',
						'/ubuntu/i'             =>  'Ubuntu',
						'/iphone/i'             =>  'iPhone',
						'/ipod/i'               =>  'iPod',
						'/ipad/i'               =>  'iPad',
						'/android/i'            =>  'Android',
						'/blackberry/i'         =>  'BlackBerry',
						'/webos/i'              =>  'Mobile'
					);

		foreach ($os_array as $regex => $value)
		{
			if (preg_match($regex, $user_agent))
			{
				$os_platform    =   $value;
			}
		}

		return $os_platform;

	}

	/**
	* Return the current visit array
	*
	* This method simply returns the compiled visitor information
	* in an array. You can use this to capture the current visit data
	* and display it, or use it for another purpose in your application.
	*
	* @param null
	* @return array $this->thisVisit() the compiled visitor information
	*/
	public function getThisVisit()
	{

		return($this->thisVisit);

	}

}
