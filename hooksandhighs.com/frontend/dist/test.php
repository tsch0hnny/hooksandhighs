<?php
// Define your API key here
define("API_KEY", "USR-f2d25347a1445d35430201fb41c1a5645deeabfe");

// Define the API URL
$url = "https://admin.hooksandhighs.cyon.site/api/content/items/episodes";

// Initialize the curl
$ch = curl_init();

// Set the options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . API_KEY)); // Adjust this according to the API documentation

// Execute the curl and get the response
$response = curl_exec($ch);

// Close the curl
curl_close($ch);

// Convert the response into an array
$data = json_decode($response, true);

// Loop through the data to generate the HTML
foreach($data as $item){
    echo '<button
    aria-current="true"
    aria-release-datetime="' . htmlspecialchars($item['releasedate']) . '"
    aria-id="' . htmlspecialchars($item['_id']) . '"
    aria-duration=""  // This value is missing from the provided data
    aria-description="' . htmlspecialchars($item['description']) . '"
    aria-file-url="' . htmlspecialchars($item['audio']['path']) . '"
    type="button"
    class="border border-barely-purple-dark/[0.3] mt-px block w-full cursor-pointer rounded-lg p-4 text-left transition duration-500 hover:border-barely-purple-dark hover:text-neutral-500 focus:bg-neutral-100 focus:text-neutral-500 focus:ring-0 dark:hover:bg-neutral-600 dark:hover:text-neutral-200">
    ' . htmlspecialchars($item['title']) . '
    </button>';
}
?>
