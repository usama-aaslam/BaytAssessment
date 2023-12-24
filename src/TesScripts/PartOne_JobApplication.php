<?php

require_once('vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Pages\BaytHomePage;

class TestJobApplication extends BaseTestCase
{
    private $driver;
    
    public function setUp(): void
    {
        $host = 'http://localhost:4444/wd/hub'; // Selenium Server
        $capabilities = ['platform' => 'ANY', 'browserName' => 'chrome'];
        $this->driver = RemoteWebDriver::create($host, $capabilities);
    }
    
    public function tearDown(): void
    {
        $this->driver->quit();
    }
    
    public function testJobApplication()
    {
        $baytHomePage = new BaytHomePage($this->driver);
        
        // Step 1: Open Bayt.com website
        $baytHomePage->open()->takeScreenshot('screenshots/homepage.png');
        
        // Step 2: Scroll down to the page footer
        $baytHomePage->scrollToFooter();
        
        // Step 3: Click on the "About Us" link
        $aboutUsPage = $baytHomePage->clickAboutUsLink()->takeScreenshot('screenshots/about_us_page.png');
        
        // Step 4: Go back to the homepage
        $this->driver->navigate()->back();
        
        // Step 5: Click on a job under the "Apply to Bayt.com" section
        $jobDetailsPage = $baytHomePage->clickJobLink()->takeScreenshot('screenshots/job_details_page.png');
        
        // Step 6: Apply for the job and fill out the registration form
        $dynamicEmail = 'testuser' . time() . '@example.com';
        $registrationPage = $jobDetailsPage->applyForJob()->fillRegistrationForm($dynamicEmail, 'password123')->submitRegistrationForm();
        
        // Add assertions to check if the registration was successful
        $this->assertStringContainsString('registration', $registrationPage->getCurrentUrl());
        $this->assertTrue($registrationPage->isValidationMessageDisplayed());
        
        
    }
}


?>
