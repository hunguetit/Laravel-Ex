<h1>Hi, {{ $name }}!</h1>
<p>We'd like to personally. Welcome you to Bicycle Sport Shop. Thank you for registering!</p>

<p>To activate this account, please copy the link below into your browser:.</p>
<?php
$href = "http://localhost/HungNH/public/register/" . $username . "/" . $key_active;
echo $href;
?>