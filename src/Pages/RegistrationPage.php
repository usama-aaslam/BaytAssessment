<?php

// RegistrationPage.php
namespace Pages;

use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;

class RegistrationPage
{
    private $driver;
    
    public function __construct(RemoteWebDriver $driver)
    {
        $this->driver = $driver;
    }
    
    public function fillRegistrationForm($email, $password)
    {
        $this->driver->findElement(WebDriverBy::xpath('//input[@type="text"][@name="first_name"]'))->sendKeys(JobApplicant);
        $this->driver->findElement(WebDriverBy::xpath('//input[@type="text"][@name="last_name"]'))->sendKeys(BaytAssessment);
        $this->driver->findElement(WebDriverBy::xpath('//input[@type="text"][@name="email"]'))->sendKeys($email);
        $this->driver->findElement(WebDriverBy::xpath('//input[@type="text"][@name="password"]'))->sendKeys($password);
        $this->driver->findElement(WebDriverBy::id('id-birthdate_day'))->click();
        $this->selectOptionByValue( 04)->click();
        $this->driver->findElement(WebDriverBy::id('id-birthdate_month'))->click();
        $this->selectOptionByValue( 07)-click();
        $this->driver->findElement(WebDriverBy::id('id-birthdate_year'))->click();
        $this->selectOptionByValue(02)->click();
        $this->driver->findElement(WebDriverBy::xpath('//*[@class="grid-10 req error-input custom-error-input"]'))->click();
        $this->selectOptionByValue(579)->click();
        $this->driver->findElement(WebDriverBy::xpath('//input[@type="checkbox"]'))->click();
        return $this;
    }
    
    public function submitRegistrationForm()
    {
        $this->driver->findElement(WebDriverBy::xpath('//*[text() = 'Create Account']'))->click();
        return $this;
    }
    
   
    
    public function takeScreenshot($filename)
    {
        $this->driver->takeScreenshot($filename);
        return $this;
    }
}

?>