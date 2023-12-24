<?php

use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Pages\BaytHomePage;
use Pages\RegistrationPage;

class TestLogInAndDelete extends BaseTestCase
{
    private $driver;
    private $dynamicEmail; // Assuming you have set this dynamically in the first test case
    
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
    
    public function testLogInAndDelete()
    {
        // Test Case 1: Apply for a Job, Register, and Verify Job Application
        $baytHomePage = new BaytHomePage($this->driver);
        // ... (Steps from Test Case 1)
        
        // Test Case 2: Log In, Delete Account, and Verify Deletion
        $registrationPage = new RegistrationPage($this->driver);
        
        // Step 1: Log In
        $homePage = $registrationPage->logIn($this->dynamicEmail, 'password123');
        
        // Add assertions to check if the login was successful
        $this->assertStringContainsString('home', $homePage->getCurrentUrl());
        $this->assertTrue($homePage->isUserLoggedIn());
        
        // Step 2: Verify that you logged in successfully
        $homePage->takeScreenshot('screenshots/logged_in_page.png');
        
        // Step 3: Delete the Account
        $registrationPage = $homePage->deleteAccount();
        
     
        // Step 4: Verify that the account was deleted
        $this->assertStringContainsString('account-deleted', $registrationPage->getCurrentUrl());
        $registrationPage->takeScreenshot('screenshots/account_deleted_page.png');
        
     
    }
}


?>
