<?php

use PHPUnit\Framework\TestSuite;

class MainTestSuite
{
    public static function suite()
    {
        $suite = new TestSuite('Bayt.com Test Suite');

        // Add Test Case 1: Apply for a Job, Register, and Verify Job Application
        require_once 'PartOne_JobApplication.php';
        $suite->addTestSuite(PartOne_JobApplication::class);

        // Add Test Case 2: Log In, Delete Account, and Verify Deletion
        require_once 'PartTwo_DeleteAccount.php';
        $suite->addTestSuite(PartTwo_DeleteAccount::class);

        // Add Test Case 3: Mobile Site Test
        require_once 'PartThree_MobileTestScript.php';
        $suite->addTestSuite(PartThree_MobileTestScript::class);

        return $suite;
    }
}

?>