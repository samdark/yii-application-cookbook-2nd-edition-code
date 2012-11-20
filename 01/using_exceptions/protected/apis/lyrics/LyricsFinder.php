<?php
// create some custom exceptions to be able to catch them
// specifically if needed

// general lyrics finder exception
class LyricsFinderException extends CException {}

// used when there is a connection problem
class LyricsFinderHTTPException extends LyricsFinderException{}


class LyricsFinder
{
	private $apiUrl = 'http://example.com/lyricsapi&songtitle=%s';

	function getText($songTitle)
	{
		$url = $this->getUrl($songTitle);
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($curl);

		// if there is HTTP error we'll throw an exception				if($result===false)
		{
			$errorText = curl_error($curl);
			curl_close($url);
			throw new LyricsFinderHTTPException($errorText);
		}

		curl_close($curl);
		return $result;
	}

	private function getRequestUrl($songTitle)
	{
		return sprintf($this->apiUrl, urlencode($songTitle));
	}
}
