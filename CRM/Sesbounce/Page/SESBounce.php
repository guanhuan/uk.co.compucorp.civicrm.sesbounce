<?php

require_once 'CRM/Core/Page.php';

class CRM_Sesbounce_Page_SESBounce extends CRM_Core_Page {
  public function run() {

    fetchNotifications();

    CRM_Utils_System::civiExit()
  }

  public function fetchNotifications() {
    $snsNotification = CRM_Utils_Type::escape($_POST['something'], 'String');
    processBounce();
    processComplaints();
  }

  public function processBounce($bounces) {
    $bounces = $bounces;
  }

  public function processComplaints($complaints) {
    $complaints = $complaints;
  }

}
