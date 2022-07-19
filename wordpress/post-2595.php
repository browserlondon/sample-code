<?php
    // Asset version number - change when CSS needs updating
    $version = '20150829';

    // If cookie has been set and matches the version above, load CSS normally
    if (!empty( $_COOKIE[ 'csscached' ]) && $_COOKIE[ 'csscached' ] === $version) :
?>
    <link rel="stylesheet" href="/assets/styles/main.min.css?v=<?php echo $version;?>">
<?php
    else :
?>
    <style>
        <?php include 'critical-css.php'; ?>
    </style>
    <script>
        /*!
            loadCSS: load a CSS file asynchronously.
            [c]2014 @scottjehl, Filament Group, Inc.
            Licensed MIT
        */
        function loadCSS(e,t,n,r){...};
        function onloadCSS(e,t){...};

        var ss = loadCSS( "/assets/styles/main.min.css?v=<?php echo $version;?>" );

        onloadCSS(ss, function() {
            var root = document.documentElement;

            // Add class to HTML element when full stylesheet has downloaded
            root.className += " full-css";

            if (root.classList) {
                // For modern browsers, remove the 'no-full-css' class (set on the HTML element) the modern way
                root.classList.remove('no-full-css');
            } else {
                // Otherwise remove the 'no-full-css' class the archaic way
                rootclassName = root.className.replace(new RegExp('(^|\\b)' + no-full-css.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
            }
        });

        // Set cookie with far expiry date after first load
        document.cookie = 'csscached=<?php echo $version;?>;expires="Wed, 20 Jan 2040 10:20:10 GMT";path=/';
    </script>

    // Load stylesheet conventionally for users with JavaScript switched off
    <noscript>
        <link rel="stylesheet" href="/assets/styles/main.min.css?v=<?php echo $version;?>">
    </noscript>
<?php
    endif;
?>