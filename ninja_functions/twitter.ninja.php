<?php
/*
- - - - - - - - - - - - - - - - - -
-  _   _  _  _   _   _____   _    -
-  |\  |  |  |\  |     |    / \   -
-  | \ |  |  | \ |     |   /___\  -
-  |  \|  |  |  \|  [__|  /     \ -
- _______________________________ -
-          INFO RETRIVE           -
- - - - - - - - - - - - - - - - - -
-  (c) 2021. Ninja Info Retrive   -
- - - - - - - - - - - - - - - - - -
This code is open-source follow by
GNU-APL V3 License. Check GitHub
official project page to know more.

Created by Arthur "ArT_DsL" Dias
dos Santos Lasso.
___________________________________
(BE AWARE!)
MADE FOR EDUCATIONAL PROPOUSES  ONLY
IF  YOU USE THIS CODE ON COMMERCIAL/
PERSONAL  OR   ANY  OTHER   PRIVATE/
COMERCIAL/GOV APPLICATION IS AT YOUR
OWN RISK, AND FULL RESPONSABILITIES!
___________________________________
*/
require_once(dirname(__FILE__).'/otherFunctions.ninja.php');
class NinjaOnTwitter{
	
	public $profileName;
	function spoof_start_twitter($profileName){
		/* -- EXPLANATION --
		----------------------------------------------------------
		| Ok, for retrive this type of info we gonna spoof a     |
		| online tool name Social Blade, with with this we can   |
		| retrive basically a lot of public info by saving       |
		| the page in a temp file. Is there where we gonna       |
		| search and retrive the info that we need.              |
		|                                                        |
        | Change Headers and Referer URL are critical for this,  |
        | because before connect we need to Bypass CloudFlare    |
        | protection.                                            |
		|________________________________________________________|
		*/
		$url = 'https://socialblade.com/twitter/user/'.$profileName;
		$header[0] = "Accept-Language: en-us,en;q=0.5";
	    $curl = curl_init();
	    curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1; rv:2.0.1) Gecko/20100101 Firefox/4.0.1');
		curl_setopt($curl, CURLOPT_REFERER, 'http://www.google.com/');
		curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_TIMEOUT, 10);
		$content = curl_exec($curl);
		curl_close($curl);
		$filePath = dirname(__FILE__).'/temp/twitter-'.$profileName.'-'.date('Y-m-d').'.html';
		//save page as temp file
		file_put_contents($filePath, $content);
		return 1;
	}
	function WakeUpTwitterNinja($profileName){
		$filePath = dirname(__FILE__).'/temp/twitter-'.$profileName.'-'.date('Y-m-d').'.html';
		//check if temp file already exist.
		if(!file_exists($filePath)){
			$this->spoof_start_twitter($profileName);
		}
		$twitter_infoFile = fopen($filePath, 'r');
		//open file as text.
		$twitter_infoFile_read = fread($twitter_infoFile, filesize($filePath));
		fclose($twitter_infoFile);
		return $twitter_infoFile_read;
	}
	function GetTwitterAvatar($profileName){
		//start ninja
		$ninjaText = $this->WakeUpTwitterNinja($profileName);
		//get profile link picture between strings
		$twitter_profile_picture = get_string_between($ninjaText, '<img id="YouTubeUserTopInfoAvatar" src="', '" alt="');
		//return link in text format
		return $twitter_profile_picture;
	}
	function GetTwitterNickname($profileName){
		//start ninja
		$ninjaText = $this->WakeUpTwitterNinja($profileName);
		//get name between strings
		$twitter_profile_name = get_string_between($ninjaText, '<div title="Favorite ', '" id="fav-bubble" class');
		//return link in text format
		return $twitter_profile_name;
	}

	function GetTwitterAt($profileName){
		$add_at = '@'.$profileName;
		return $add_at;
	}
	function GetTwitterFollowers($profileName){
		//start ninja
		$ninjaText = $this->WakeUpTwitterNinja($profileName);
		//get followers between strings and clear all
		$twitter_profile_followers = str_replace("\t", '', str_replace("\n", '', str_replace(' ', '', str_replace('<span style="font-weight: bold;">', '',get_string_between($ninjaText, '<span class="YouTubeUserTopLight">Followers</span><br>', '</span>')))));
		//return link in text format
		return $twitter_profile_followers;
	}
	function GetTwitterFollowing($profileName){
		//start ninja
		$ninjaText = $this->WakeUpTwitterNinja($profileName);
		//get following between strings and clear all
		$twitter_profile_following = str_replace("\t", '', str_replace("\n", '', str_replace(' ', '', str_replace('<span style="font-weight: bold;">', '',get_string_between($ninjaText, '<span class="YouTubeUserTopLight">Following</span><br>', '</span>')))));
		//return link in text format
		return $twitter_profile_following;
	}
	function GetTwitterLikes($profileName){
		//start ninja
		$ninjaText = $this->WakeUpTwitterNinja($profileName);
		//get likes between strings and clear all
		$twitter_profile_likes = str_replace("\t", '', str_replace("\n", '', str_replace(' ', '', str_replace('<span style="font-weight: bold;">', '',get_string_between($ninjaText, '<span class="YouTubeUserTopLight">Likes</span><br>', '</span>')))));
		//return link in text format
		return $twitter_profile_likes;
	}
	function GetTwitterTweets($profileName){
		//start ninja
		$ninjaText = $this->WakeUpTwitterNinja($profileName);
		//get tweets between strings and clear all
		$twitter_profile_tweets = str_replace("\t", '', str_replace("\n", '', str_replace(' ', '', str_replace('<span style="font-weight: bold;">', '',get_string_between($ninjaText, '<span class="YouTubeUserTopLight">Tweets</span><br>', '</span>')))));
		//return link in text format
		return $twitter_profile_tweets;
	}
	function GetTwitterUserCreatedDate($profileName){
		//start ninja
		$ninjaText = $this->WakeUpTwitterNinja($profileName);
		//get user created date between strings and clear
		$twitter_profile_userCreated_clear = str_replace("\t", '', str_replace("\n", '', str_replace(' ', '', str_replace('<span style="font-weight: bold;">', '',get_string_between($ninjaText, '<span class="YouTubeUserTopLight">User Created</span><br>', '</span>')))));
		//adjust data spaces for a better view
		if(strlen($twitter_profile_userCreated_clear) == 11){
			$twitter_profile_userCreated = substr($twitter_profile_userCreated_clear, 0, 3).' '.substr($twitter_profile_userCreated_clear, 3, 4).' '.substr($twitter_profile_userCreated_clear, 7, 4);
		}else{
			$twitter_profile_userCreated = substr($twitter_profile_userCreated_clear, 0, 3).' '.substr($twitter_profile_userCreated_clear, 3, 5).' '.substr($twitter_profile_userCreated_clear, 8, 4);
		}
		//return link in text format
		return $twitter_profile_userCreated;
	}

	function GetTwitterUserCreatedDateInDateTime($profileName){
		//start ninja
		$ninjaText = $this->WakeUpTwitterNinja($profileName);
		//get user created date between strings and clear
		$twitter_profile_userCreated = str_replace("\t", '', str_replace("\n", '', str_replace(' ', '', str_replace('<span style="font-weight: bold;">', '',get_string_between($ninjaText, '<span class="YouTubeUserTopLight">User Created</span><br>', '</span>')))));
		//convert date to Y-M-D
		$convert_userCreated_to_dateTime = date('Y-m-d', strtotime($twitter_profile_userCreated));
		//return link in text format
		return $convert_userCreated_to_dateTime;
	}
	function GetTwitterURL($profileName){
		$makeUrl = 'https://twitter.com/'.$profileName;
		return $makeUrl;
	}
	function GetTwitterJsonInfo($profileName){
		//create the json values
		$twitterInfo['twitter_profile_picture'] = $this->GetTwitterAvatar($profileName);
		$twitterInfo['twitter_profile_nickname'] = $this->GetTwitterNickname($profileName);
		$twitterInfo['twitter_profile_at'] = $this->GetTwitterAt($profileName);
		$twitterInfo['twitter_profile_followers'] = $this->GetTwitterFollowers($profileName);
		$twitterInfo['twitter_profile_following'] = $this->GetTwitterFollowing($profileName);
		$twitterInfo['twitter_profile_likes'] = $this->GetTwitterLikes($profileName);
		$twitterInfo['twitter_profile_tweets'] = $this->GetTwitterTweets($profileName);
		$twitterInfo['twitter_profile_user_created_text'] = $this->GetTwitterUserCreatedDate($profileName);
		$twitterInfo['twitter_profile_user_created_date'] = $this->GetTwitterUserCreatedDateInDateTime($profileName);
		$twitterInfo['twitter_profile_url'] = $this->GetTwitterURL($profileName);
		//generate json
		$tw_info_json = json_encode($twitterInfo, JSON_PRETTY_PRINT, true);
		return $tw_info_json;
	}
	function SendTwitterNinjaToBed($profileName){
		$filePath = dirname(__FILE__).'/temp/twitter-'.$profileName.'-'.date('Y-m-d').'.html';
		//check if temp file already exist.
		if(!unlink($filePath)){
			unlink($filePath);
		}
		return true;
	}
}