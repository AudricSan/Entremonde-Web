<?php

$social = env('SOCIAL');

echo "
</div>
</body>
<footer>";

if ($social['SOCIAL'] === true) {
    echo "<ul id='reseaux'>";
    foreach ($social as $key => $value) {
        if ($key != 'SOCIAL') {
            echo "
                <li> <a href='$value'>$key</a></li>
            ";
        }
    }

    echo '</ul>';
}

echo "
    <p>Mentions légales, ect. | &copy; Xavier Deleclos</p>
    <p>IFOSUP - Le 16 Juin 2021</p>

    <a href=#header class='fas fa-arrow-up arrowUp'></a>
    </footer>
    </html>
    ";
