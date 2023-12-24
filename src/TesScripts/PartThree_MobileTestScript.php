<?php

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Pages\Mobile\BaytMobileHomePage;

class PartThree_MobileTestScript extends BaseTestCase
{
    private $driver;
    
    public function setUp(): void
    {
        $host = 'http://localhost:4444/wd/hub'; // Selenium Server
        $capabilities = [
            'platformName' => 'Android', // Adjust based on your mobile platform
            'browserName' => 'chrome',
            'deviceName' => 'emulator-5554', // Adjust based on your device
        ];
        $this->driver = RemoteWebDriver::create($host, $capabilities);
    }
    
    public function tearDown(): void
    {
        $this->driver->quit();
    }
    
    public function testMobileJobApplication()
    {
        // Test Case for Mobile Site: Apply for a Job on Mobile
        $baytMobileHomePage = new BaytMobileHomePage($this->driver);
        
        // Step 1: Open Bayt.com home page on mobile
        $baytMobileHomePage->open()->takeScreenshot('screenshots/mobile_homepage.png');
        
        // Step 2: Search for "Quality Assurance Engineer" in the United Arab Emirates
        $baytMobileHomePage->searchJobs('Quality Assurance Engineer', 'United Arab Emirates')->takeScreenshot('screenshots/mobile_search_results.png');
        
        // Step 3: Apply for a job and verify the Applicant registration page
        $applicantRegistrationPage = $baytMobileHomePage->applyForJobAndVerifyRegistrationPage();
        
        // Add assertions to check if the registration was successful
        $this->assertStringContainsString('registration', $applicantRegistrationPage->getCurrentUrl());
        $this->assertTrue($applicantRegistrationPage->isValidationMessageDisplayed());
      
    }
}


?>
