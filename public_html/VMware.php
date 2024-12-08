<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="Content-Style-Type" content="text/css">
  <title></title>
  <meta name="Generator" content="Cocoa HTML Writer">
  <meta name="CocoaVersion" content="1038.36">
  <style type="text/css">
    p.p1 {margin: 0.0px 0.0px 0.0px 0.0px; font: 12.0px Helvetica}
    p.p2 {margin: 0.0px 0.0px 0.0px 0.0px; font: 12.0px Helvetica; min-height: 14.0px}
    span.Apple-tab-span {white-space:pre}
  </style>
</head>
<body>
<p class="p1">&lt;?php</p>
<p class="p1">&nbsp;</p>
<p class="p1">$SVQuerystring = "svgroup=vmware_showcase&amp;";</p>
<p class="p1">foreach (($_GET) as $SVGetKey =&gt; $SVGetValue) {</p>
<p class="p1"><span class="Apple-converted-space">  </span>$SVQuerystring = $SVQuerystring.$SVGetKey."=".$SVGetValue."&amp;";</p>
<p class="p1">}</p>
<p class="p1">$SVURL = "http://vmware.sharedvue.net/Sharedvue/pull/";</p>
<p class="p1">$SVURL = $SVURL."?svhost=".$_SERVER["HTTP_HOST"];</p>
<p class="p2"><br></p>
<p class="p1">if (!empty($_SERVER["PHP_SELF"])) {</p>
<p class="p1"><span class="Apple-converted-space">  </span>if ((isset($_SERVER['REDIRECT_URL'])) &amp;&amp; (strpos($_SERVER['REDIRECT_URL'], $_SERVER['PHP_SELF']) === FALSE)) $SVURL = $SVURL . $_SERVER['REDIRECT_URL'];</p>
<p class="p1"><span class="Apple-converted-space">  </span>else $SVURL = $SVURL . $_SERVER['PHP_SELF'];</p>
<p class="p1">}</p>
<p class="p1">else if (!empty($_SERVER['SCRIPT_NAME'])) {</p>
<p class="p1"><span class="Apple-converted-space">  </span>if ((isset($_SERVER['REDIRECT_URL'])) &amp;&amp; (strpos($_SERVER['REDIRECT_URL'], $_SERVER['SCRIPT_NAME']) === FALSE)) $SVURL = $SVURL . $_SERVER['REDIRECT_URL'];</p>
<p class="p1"><span class="Apple-converted-space">  </span>else $SVURL = $SVURL . $_SERVER['SCRIPT_NAME'];</p>
<p class="p1">}</p>
<p class="p2"><br></p>
<p class="p1">if (strlen($SVQuerystring) &gt; 0) {</p>
<p class="p1"><span class="Apple-converted-space">  </span>$SVURL = $SVURL.urlencode("?".$SVQuerystring);</p>
<p class="p1">}</p>
<p class="p2"><br></p>
<p class="p1">if (function_exists('curl_init')) {</p>
<p class="p1"><span class="Apple-converted-space">  </span>$SVCurl = curl_init();</p>
<p class="p1"><span class="Apple-converted-space">  </span>curl_setopt($SVCurl, CURLOPT_RETURNTRANSFER, 1);</p>
<p class="p1"><span class="Apple-converted-space">  </span>curl_setopt($SVCurl, CURLOPT_URL, $SVURL);</p>
<p class="p1"><span class="Apple-converted-space">  </span>$SVContent = curl_exec($SVCurl);</p>
<p class="p1"><span class="Apple-converted-space">  </span>$SVHTTPStatusCode = curl_getinfo($SVCurl, CURLINFO_HTTP_CODE);</p>
<p class="p1"><span class="Apple-converted-space">  </span>curl_close($SVCurl);</p>
<p class="p1">}</p>
<p class="p1">else {</p>
<p class="p1"><span class="Apple-tab-span">	</span>$SVContent = file_get_contents($SVURL);</p>
<p class="p1"><span class="Apple-tab-span">	</span>list($SVHTTPVersion,$SVHTTPStatusCode,$SVHTTPMsg) = explode(' ',$http_response_header[0], 3);</p>
<p class="p1">}</p>
<p class="p2"><br></p>
<p class="p1">switch($SVHTTPStatusCode) {</p>
<p class="p1"><span class="Apple-converted-space">  </span>case 200:</p>
<p class="p1"><span class="Apple-converted-space">    </span>echo ($SVContent);</p>
<p class="p1"><span class="Apple-converted-space">    </span>break;</p>
<p class="p1"><span class="Apple-converted-space">  </span>default:</p>
<p class="p1"><span class="Apple-converted-space">    </span>echo "&lt;!-- SharedVue Output: Could not reach SharedVue server: $SVHTTPMsg ($SVHTTPStatusCode) --&gt;";</p>
<p class="p1"><span class="Apple-converted-space">    </span>break;</p>
<p class="p1">}</p>
<p class="p1">&nbsp;</p>
<p class="p1">?&gt;</p>
</body>
</html>
