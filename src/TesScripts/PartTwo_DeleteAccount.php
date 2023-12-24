<?php
<?php

require_once('vendor/autoload.php');

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Pages\BaytHomePage;
use Pages\RegistrationPage;

$host = 'http://localhost:4444/wd/hub'; // Selenium Server
$capabilities = ['platform' => 'ANY', 'browserName' => 'chrome'];

$driver = RemoteWebDriver::create($host, $capabilities);

try {
    // Test Case 1: Apply for a Job, Register, and Verify Job Application
    $baytHomePage = new BaytHomePage($driver);
    // ... (Steps from Test Case 1)
    
    // Test Case 2: Log In, Delete Account, and Verify Deletion
    $registrationPage = new RegistrationPage($driver);
    
    // Step 1: Log In
    $homePage = $registrationPage->logIn($dynamicEmail, 'password123');
    
    // Step 2: Verify that you logged in successfully
    $homePage->takeScreenshot('screenshots/logged_in_page.png');
    
    // Step 3: Delete the Account
    $registrationPage = $homePage->deleteAccount();
    
    // Additional steps to complete the deletion flow
    // ...
    
    // Step 4: Verify that the account was deleted
    $registrationPage->takeScreenshot('screenshots/account_deleted_page.png');
    
} catch (Exception $e) {
    echo 'Exception: ' . $e->getMessage();
} finally {
    $driver->quit();
}
