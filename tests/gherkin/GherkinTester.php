<?php


class GherkinTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;

    /**
     * @Given I have a new book named :name
     */
    public function iHaveANewBookNamed($name)
    {
        return $name;
    }

    /**
     * @When fill input with string :name
     */
    public function fillInputWithStringname($name)
    {
        $this->fillField('name', $name);
    }

    /**
     * @When click save button
     */
    public function clickSaveButton()
    {
        $this->click('save');
    }

    /**
     * @Then I see OK
     */
    public function iSeeOK()
    {
        $this->see('OK');
    }


}