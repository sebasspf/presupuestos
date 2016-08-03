<!-- Emails use the XHTML Strict doctype -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <!-- The character set should be utf-8 -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width"/>
  <!-- Link to the email's CSS, which will be inlined into the email -->
  <link rel="stylesheet" href="css/foundation-emails.css">
  <style>
    .header {
    background: #8a8a8a;
  }
  .header .columns {
    padding-bottom: 0;
  }
  .header p {
    color: #fff;
    padding-top: 15px;
  }
  .header .wrapper-inner {
    padding: 20px;
  }
  .header .container {
    background: transparent;
  }
  table.button.facebook table td {
    background: #3B5998 !important;
    border-color: #3B5998;
  }
  table.button.twitter table td {
    background: #1daced !important;
    border-color: #1daced;
  }
  table.button.google table td {
    background: #DB4A39 !important;
    border-color: #DB4A39;
  }
  .wrapper.secondary {
    background: #f3f3f3;
  }
  </style>
</head>

<body>
  <!-- Wrapper for the body of the email -->
  <wrapper class="header">
  <container>
    <row class="collapse">
      <columns small="6">
        <img src="http://placehold.it/200x50/663399">
      </columns>
      <columns small="6">
        <p class="text-right">HERO</p>
      </columns>
    </row>
  </container>
</wrapper>

<container>

  <spacer size="16"></spacer>

  <row>
    <columns small="12">
      <h1>Hi, Elijah Baily</h1>
      <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi impedit sapiente delectus molestias quia.</p>
      <img src="http://placehold.it/580x300" alt="">
      <callout class="primary">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam assumenda, praesentium qui vitae voluptate dolores. <a href="#">Click it!</a></p>
      </callout>
      <h2>Title Ipsum <small>This is a note.</small></h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi repellat, harum. Quas nobis id aut, aspernatur, sequi tempora laborum corporis cum debitis, ullam, dolorem dolore quisquam aperiam! Accusantium, ullam, nesciunt. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus consequuntur commodi, aut sed, quas quam optio accusantium recusandae nesciunt, architecto veritatis. Voluptatibus sunt esse dolor ipsum voluptates, assumenda quisquam.</p>
      
      <button class="large secondary" href="#">Click Me!</button>

    </columns>
  </row>
  
  <wrapper class="secondary">

    <spacer size="16"></spacer>

    <row>
      <columns large="6">
        <h5>Connect With Us:</h5>
        <button class="facebook expand" href="#">Facebook</button>
        <button class="twitter expand" href="#">Twitter</button>
        <button class="google expand" href="#">Google+</button>
      </columns>
      <columns large="6">
        <h5>Contact Info:</h5>
        <p>Phone: 408-341-0600</p>
        <p>Email: <a href="mailto:foundation@zurb.com">foundation@zurb.com</a></p>
      </columns>
    </row>
  </wrapper>
      
  <center>
    <menu>
      <item href="#">Terms</item>
      <item href="#">Privacy</item>
      <item href="#">Unsubscribe</item>
    </menu>
  </center>

</container>
</body>
</html>