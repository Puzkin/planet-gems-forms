<?php

use GuzzleHttp\Client;

require 'vendor/autoload.php';

// Check if the form was submitted via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get form data
    $editingDuration = isset($_POST["editingDuration"]) ? $_POST["editingDuration"] : "";
    $editingApp = isset($_POST["editingApp"]) ? $_POST["editingApp"] : "";
    $bestEdit = isset($_POST["bestEdit"]) ? $_POST["bestEdit"] : "";

    // Discord webhook URL
    $webhookUrl = 'https://discord.com/api/webhooks/1147013168233713735/xe4_yV9MW0uc9XQi1O59HSLBvUmOjJ9UKAoCon2a83nF_8vVfODnk8kXTOaacCz7GWFA';

    // Prepare the message to send to Discord
    $message = "Editing Duration: $editingDuration\nEditing App: $editingApp\nBest Edit: $bestEdit";

    // Send the message to Discord using GuzzleHTTP
    $client = new Client();
    $response = $client->post($webhookUrl, [
        'json' => ['content' => $message]
    ]);

    // Check if the message was sent successfully
    if ($response->getStatusCode() === 204) {
        echo 'Form data sent to Discord successfully!';
    } else {
        echo 'Error sending form data to Discord.';
    }
} else {
    echo 'Form not submitted.';
}
?>
