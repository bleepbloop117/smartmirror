<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Smart Mirror</title>
    <link rel="stylesheet" href="css/weather-icons.min.css">
  </head>
  <body>


    <?php
      $imap = imap_open("{mail.webfaction.com:143}INBOX", "mom_swissfish", "mommirror");
      $message_count = imap_num_msg($imap);

    for ($i = 1; $i <= $message_count; ++$i) {
        $header = imap_header($imap, $i);
        $body = imap_fetchbody($imap, $i, "1.1");

        if ($body == "") {
            $body = imap_fetchbody($imap, $i, "1");
        }

        $body = trim(substr(quoted_printable_decode($body), 0, 100));

        $prettydate = date("jS F Y", $header->udate);

        if (isset($header->from[0]->personal)) {
            $personal = $header->from[0]->personal;
        } else {
            $personal = $header->from[0]->mailbox;
        }

        $email = "$personal <{$header->from[0]->mailbox}@{$header->from[0]->host}>";
        echo "On $prettydate, $email said \"$body\".\n";
    }

    imap_close($imap);
?>


    <div class="date-day"></div>

    <div class="weather-temp"></div>
    <div class="weather-temp-icon"></div>
    <div class="weather-temp-high"></div>
    <div class="weather-temp-low"></div>

    <script src="js/lib/jquery-1.12.0.min.js"></script>
    <script src="js/app.js"></script>

  </body>
</html>
