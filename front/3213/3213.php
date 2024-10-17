<?php
$url_host = 'http://' . $_SERVER['HTTP_HOST'];
$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');
$pattern_uri = '/' . preg_quote($pattern_document_root, '/') . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);

if (isset($matches[1][0])) {
    $url_path = $url_host . $matches[1][0];
    $url_path = str_replace('\\', '/', $url_path);
} else {
    $url_path = $url_host;
}

$lessc_path = __DIR__ . '/libs/lessc.inc.php';
if (file_exists($lessc_path)) {
    require_once($lessc_path);
} else {
    die('The lessc.inc.php file is missing.');
}

$less = new lessc;
$less->compileFile('less/3213.less', 'css/3213.css');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>3213 - Course Information</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/3213.css">
    <link rel="stylesheet" href="./css//bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row row-wrapper">
            <div class="col-lg-5 col-md-4 part-primary">
                <span>01 Departments</span>
                <h2 class="heading-secondary">The Courses</h2>
                <p>Lorem ispum dolor sit amet, consectetur adipiscing elit seeiusmod tempor incididunt ut labore et
                    dolore magna asin lute enim ad minim veniam quis</p>
                <button type="button" class="btn btn-show">
                    <span class="text-sub">Show more</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>

            <div class="col-lg-7 col-md-8">
                <div class="col-lg-6 sub-wrapper">
                    <span>Maketing</span>
                    <h3 class="heading-sub">Build your media and public presence</h3>
                    <p>Lorem ispum dolor sit amet, consectetur adipiscing elit seeiusmod tempor in ci did</p>
                    <a href="#" class="link-show">
                        <span class="text-sub">View more</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <hr class="border-right-col">
                </div>

                <div class="col-lg-6">
                    <span>Languages</span>
                    <h3 class="heading-sub">Creative writing through storytelling</h3>
                    <p>Lorem ispum dolor sit amet, consectetur adipiscing elit seeiusmod tempor in ci did</p>
                    <a href="#" class="link-show">
                        <span class="text-sub">View more</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/bootstrap.min.js"></script>
</body>

</html>