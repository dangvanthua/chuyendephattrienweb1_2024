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
$less->compileFile('less/3098.less', 'css/3098.css');
?>

<!DOCTYPE html>
<html>

<head>
    <title>1354</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/3098.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <section class="newsletter-section text-center text-white">
        <div class="newsletter-container">
            <div class="newsletter-content">
                <div class="newsletter-title">
                    <h2 class="mb-4">Join Our Newsletter</h2>
                </div>
                <div class="newsletter-form-container">
                    <form class="newsletter-form">
                        <input type="email" class="form-control" placeholder="Your Email">
                        <button type="submit" class="btn">
                            <i class="fa fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <footer class="footer-section py-5">
        <div class="footer-container">
            <div class="footer-row">
                <div class="footer-column">
                    <div class="footer-logo">
                        <img src="./images/white-logo.png" alt="Logo">
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum diam quam, ultricies ut leo
                        non.</p>
                    <div class="social-icons">
                        <a href="#"><i class="social-icon fa-brands fa-facebook-f"></i></a>
                        <a href="#"><i class="social-icon fa-brands fa-twitter"></i></a>
                        <a href="#"><i class="social-icon fa-brands fa-instagram"></i></a>
                        <a href="#"><i class="social-icon fa-brands fa-pinterest-p"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h5>Services</h5>
                    <ul>
                        <li><a href="#">PC Repair</a></li>
                        <li><a href="#">Laptop Repair</a></li>
                        <li><a href="#">Smartphone Repair</a></li>
                        <li><a href="#">Tablet Repair</a></li>
                        <li><a href="#">Mac Repair</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h5>Useful Links</h5>
                    <ul>
                        <li><a href="#">Conditions</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Latest Blogs</a></li>
                        <li><a href="#">Testimonials</a></li>
                        <li><a href="#">Our Mechanics</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h5>Get In Touch</h5>
                    <ul>
                        <div class="column-touch">
                            <i class="fa fa-phone"></i>
                            <div class="footer-text">
                                <p>Phone</p>
                                <p class="touch-text">+123 456 778</p>
                            </div>
                        </div>
                        <div class="column-touch">
                            <i class="fa fa-envelope"></i>
                            <div class="footer-text">
                                <p>Email</p>
                                <p class="touch-text">info@repa.com</p>
                            </div>

                        </div>
                        <div class="column-touch">
                            <i class="fa fa-map-marker"></i>
                            <div class="footer-text">
                                <p>Location</p>
                                <p class="touch-text">Coral Way, Miami, Florida, 33169</p>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>

</html>