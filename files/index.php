<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Your IP</title>
    </head>
    <body>
        <?php
        $ip_address = getenv('HTTP_CLIENT_IP') ?:
                getenv('HTTP_X_FORWARDED_FOR') ?: getenv('HTTP_X_FORWARDED') ?:
                getenv('HTTP_FORWARDED_FOR') ?: getenv('HTTP_FORWARDED') ?:
                getenv('REMOTE_ADDR');

        echo "Your IP address is: " . $ip_address . "<br>";
        $jsondata = file_get_contents("http://ip-api.com/json/" . $ip_address);
        $data = json_decode($jsondata, true);
        if ($data['status'] == "success")
        {
            $date = new DateTime("now", new DateTimeZone($data['timezone']));
            echo "Local time: " . $date->format('Y-m-d H:i:s');
        }
        else
        {
            echo "Could not get local time for this IP. Is it a local address?";
        }
        ?>
    </body>
</html>
