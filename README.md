# NINJA INFO RETRIVER

## WHY THIS REPO HAS BEEN ACHIVED?
<hr>

This repo has been achived: Discontinuation.

<hr>

Ninja Info Retriver is a PHP script made to fetch public information from a social media without using API.

## REQUISITES
* PHP 7.4 +
* cURL enabled
* File Write/Read permissions on "/temp/" inside "/ninja_functions/"

## Ninja current supports:
* Twitter
* <strong>I plan to add more in future...</strong>

## Public License
This code is open-source follow by GNU-APL V3 License, you can fork, distribute, modify and also make your own version, but remember to follow the <a href="https://github.com/ArTDsL/ninja-info-retriver/blob/main/LICENSE">GNU-AGPL V3 LICENSE</a> and mantain both license (type, file), credits (type, file).

## Educational Only
Ninja is made for educational propouses only!

<strong>Be aware: </strong>The author of this script does not encourage the use of it for other means than educational, the use of this script in any other way is entirely your responsibility!

## How to use
```php
<?php
//Include ninja-autoload.php
include('ninja-autoload.php');

//Get a twitter Username, do not use @
$twitter_username = 'twitter';

//Call the class that you wan't to use [in this example i will use Twitter]
$NinjaOnTwitter = new NinjaOnTwitter();

//Now fetch the info you need [in this example i will use Twitter JSON that gives me all info at once]
$twitter_json = $NinjaOnTwitter->GetTwitterJsonInfo($twitter_username);

/* For the last, "Send Ninja To Bed" (This function gonna clear the temp file that Ninja Creates, 
if you want to log the original files just remove it) */
$NinjaOnTwitter->SendTwitterNinjaToBed($twitter_username);
?>
```

## LIKE IT?

You can find me on <a href="https://www.twitter.com/ArT_DsL">Twitter</a>.
