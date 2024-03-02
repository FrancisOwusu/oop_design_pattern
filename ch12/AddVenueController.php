<?php

namespace ch12;
require_once 'PageController.php';
class AddVenueController extends PageController
{
    public function process(): void
{
    $request = $this->getRequest();
    try {
        $name = $request->getProperty('venue_name');
        if (is_null($request->getProperty('submitted'))){
            $request->addFeedback("choose a name for thevenue");
            $this->render(__DIR__ .'/view/add_venue.php', $request);
        } elseif (is_null($name)) {
            $request->addFeedback("name is a requiredfield");
            $this->render(__DIR__ .'/view/add_venue.php', $request);
            return;
        } else {
// add to database
            $this->forward('listvenues.php');
        }
    } catch (Exception) {
        $this->render(__DIR__ . '/view/error.php',$request);
    }
}
}