<?php

// Public Books API endpoints will work with a blank API key
// Or create an API key in the Google Cloud Console
// https://console.cloud.google.com/

$key = '<GOOGLE_BOOK_API_KEY>';

?>
<!doctype html>
<html>
    <head>
        <title>Google Books API</title>
    </head>
    <body>

        <h1>Google Books API</h1>

        <hr>

        <h2>Search for a Book</h2>

        <?php

        // Define the endpoint to search the Books API using a keyword

        $url = 'https://www.googleapis.com/books/v1/volumes?q=alchemist&key='.$key;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($result, true);

        if(!isset($data['error']))
        {
            foreach($data['items'] as $value)
            {
                echo '<div>
                    <h3>'.$value['volumeInfo']['title'].'</h3>
                    <img src="'.$value['volumeInfo']['imageLinks']['smallThumbnail'].'">
                </div>';
            }
        }

        echo '<hr>';

        echo '<pre>';
        print_r($data);
        echo '</pre>';

        ?>


        <hr>

        <h2>Retrieve a Book Profile</h2>

        <?php

        // Define the endpoint to retrieve a book profile using the Books API
        
        $url = 'https://www.googleapis.com/books/v1/volumes/FzVjBgAAQBAJ?key='.$key;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($result, true);

        if(!isset($data['error']))
        {
            echo '<div>
                    <h3>'.$data['volumeInfo']['title'].'</h3>
                    <img src="'.$data['volumeInfo']['imageLinks']['smallThumbnail'].'">
                </div>';
        }

        echo '<hr>';

        echo '<pre>';
        print_r($data);
        echo '</pre>';

        ?>

    </body>

</html>
