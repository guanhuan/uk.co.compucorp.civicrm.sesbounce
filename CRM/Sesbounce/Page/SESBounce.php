<?php

require_once 'CRM/Core/Page.php';

class CRM_Sesbounce_Page_SESBounce extends CRM_Core_Page {
  public function run() {

    $header = $_SERVER['HTTP_X_AMZ_SNS_MESSAGE_TYPE'];

    if ($header == null) {
      CRM_Utils_System::civiExit();
    }

    fetchNotifications();


    CRM_Utils_System::civiExit();
  }

  public function fetchNotifications() {
    $snsNotification = file_get_contents('php://input');
    $snsMsg = json_decode($snsNotification, TRUE);

    //CRM_Utils_Type::escape($_POST['something'], 'String');
    if ($snsMsg['Type'] === 'SubscriptionConfirmation') {

      // Send a request to the SubscribeURL to complete subscription
      verifySubscription($snsMsg['SubscribeURL']);
    } elseif ($message->get('Type') === 'Notification') {

      // Do something with the notification
      CRM_Core_Error::debug_var('SNS_Msg', print_r($message,true));
    }
  }

  public function verifySubscription($subscriptionURL) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $subscriptionURL);
    $content = curl_exec($ch);
    CRM_Core_Error::debug_var('SNS_Subscription', print_r('Subscribed to AWS SNS',true));
  }

  public function processBounce($bounces) {
    $bounces = $bounces;
  }

  public function processComplaints($complaints) {
    $complaints = $complaints;
  }

}
