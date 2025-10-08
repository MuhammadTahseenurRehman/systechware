<?php
// Simple health check test
// This file can be used to test the health check endpoint locally

echo "Testing health check endpoint...\n";

// Test the health check endpoint
$url = 'http://localhost:8000/health';
$response = file_get_contents($url);

if ($response) {
    $data = json_decode($response, true);
    if ($data && $data['status'] === 'ok') {
        echo "✅ Health check passed!\n";
        echo "Response: " . $response . "\n";
    } else {
        echo "❌ Health check failed - invalid response\n";
        echo "Response: " . $response . "\n";
    }
} else {
    echo "❌ Health check failed - no response\n";
}
?>
