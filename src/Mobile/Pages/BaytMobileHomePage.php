<?php

namespace Pages\Mobile;

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;

class BaytMobileHomePage
{
    private $driver;
    
    public function __construct(RemoteWebDriver $driver)
    {
        $this->driver = $driver;
    }
    
    public function open()
    {
        $this->driver->get('https://www.bayt.com/en/pakistan/');
        return $this;
    }
    
    public function takeScreenshot($filename)
    {
        $this->driver->takeScreenshot($filename);
        return $this;
    }
    
    public function searchJobs($jobTitle, $location)
    {
        // Assuming there's a search bar with the id 'searchBar'
        $searchBar = $this->driver->findElement(WebDriverBy::id('searchBar'));
        $searchBar->sendKeys($jobTitle);
        
        // Assuming there's a location field with the id 'locationField'
        $locationField = $this->driver->findElement(WebDriverBy::id('locationField'));
        $locationField->sendKeys($location);
        
        // Assuming there's a search button with the id 'searchButton'
        $searchButton = $this->driver->findElement(WebDriverBy::id('searchButton'));
        $searchButton->click();
        
        // Assuming there's a page element indicating search results with the class 'search-results'
        $this->driver->wait()->until(
            WebDriverExpectedCondition::visibilityOfElementLocated(WebDriverBy::cssSelector('.search-results'))
            );
        
        return $this;
    }
    
    public function applyForJobAndVerifyRegistrationPage()
    {
        // Assuming there's a job listing with the class 'job-listing'
        $jobListing = $this->driver->findElement(WebDriverBy::cssSelector('.job-listing'));
        $jobListing->click();
        
        // Assuming there's an apply button with the id 'applyButton'
        $applyButton = $this->driver->findElement(WebDriverBy::id('applyButton'));
        $applyButton->click();
        
        // Assuming there's a registration form with the id 'registrationForm'
        $this->driver->wait()->until(
            WebDriverExpectedCondition::visibilityOfElementLocated(WebDriverBy::id('registrationForm'))
            );
        
        return new MobileRegistrationPage($this->driver);
    }
  
}
