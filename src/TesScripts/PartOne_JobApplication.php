<?php


require_once('vendor/autoload.php');

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Pages\BaytHomePage;

$host = 'http://localhost:4444/wd/hub'; // Selenium Server
$capabilities = ['platform' => 'ANY', 'browserName' => 'chrome'];

$driver = RemoteWebDriver::create($host, $capabilities);

try {
    $baytHomePage = new BaytHomePage($driver);
    
    // Step 1: Open Bayt.com website
    $baytHomePage->open()->takeScreenshot('screenshots/homepage.png');
    
    // Step 2: Scroll down to the page footer
    $baytHomePage->scrollToFooter();
    
    // Step 3: Click on the "About Us" link
    $aboutUsPage = $baytHomePage->clickAboutUsLink()->takeScreenshot('screenshots/about_us_page.png');
    
    // Step 4: Go back to the homepage
    $driver->navigate()->back();
    
    // Step 5: Click on a job under the "Apply to Bayt.com" section
    $jobDetailsPage = $baytHomePage->clickJobLink()->takeScreenshot('screenshots/job_details_page.png');
    
    // Step 6: Apply for the job and fill out the registration form
    $dynamicEmail = 'testuser' . time() . '@example.com';
    $registrationPage = $jobDetailsPage->applyForJob()->fillRegistrationForm($dynamicEmail, 'password123')->submitRegistrationForm();
    
   
} catch (Exception $e) {
    echo 'Exception: ' . $e->getMessage();
} finally {
    $driver->quit();
}
?>