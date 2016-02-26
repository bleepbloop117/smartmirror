<!-- todo
1- make faster, currently loop through all emails, not effective, to slow should check for unread first.
2- set display time? display for one day? seems ok. think about other options. -->

<?php
  $imap = imap_open("{mail.webfaction.com:143}INBOX", "mom_swissfish", "mommirror");
  //Sort by newest
  $messages = imap_sort($imap, SORTDATE, 1);
  //Loop through all messages
  foreach ($messages as $message) {
    //search for unread messages
    if (imap_search($imap,'UNSEEN')) {
      //Set messages to read
      imap_setflag_full($imap, $message, "\\Seen \\Flagged");
      //Pull out header and body content
      $header = imap_headerinfo($imap, $message);
      $body = imap_fetchbody($imap, $message, "1.1");
      //Body email backup
      if ($body == "") {
        $body = imap_fetchbody($imap, $message, "1");
      }
      // Set timezone
      date_default_timezone_set('America/New_York');
      //Get time from email header
      $unixdate = $header->udate;
      //Prettify date
      $prettydate = date("F jS", $unixdate);
      //Get name or mailbox name is none
      if (isset($header->from[0]->personal)) {
        $personal = $header->from[0]->personal;
      } else {
        $personal = $header->from[0]->mailbox;
      }
      //Who it's from
      $email = "$personal <{$header->from[0]->mailbox}@{$header->from[0]->host}>";
      //display date, author and message
      echo "$prettydate, $email \"$body\"\n";
    }
  }
  imap_close($imap);
?>
