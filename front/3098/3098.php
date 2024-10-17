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
<html lang="en">

<head>
    <title>3098</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="./css/3098.css">
</head>

<body>
    <div class="newsletter">
        <h2>Join Our Newsletter</h2>
        <div class="input-container">
            <input type="email" placeholder="Your Email">
            <button><i class="fas fa-paper-plane"></i></button>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <img alt="Repa logo" class="mb-3" height="50" src="./images/white-logo.png" width="100">
                    <p>
                        Lorem ipsum dolor sit amet, conse ctetur adip iscing elit. Nt viverra eros euis mod Vestibu diam
                        suspendisse adi pisc diam quis. Et id volutpat sit odio.
                    </p>
                    <div class="social-icons">
                        <a href="#">
                            <i class="fab fa-facebook-f">
                            </i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter">
                            </i>
                        </a>
                        <a href="#">
                            <i class="fab fa-instagram">
                            </i>
                        </a>
                        <a href="#">
                            <i class="fab fa-pinterest">
                            </i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>
                        Services
                    </h5>
                    <ul>
                        <li>
                            <i class="fas fa-square">
                            </i>
                            PC Repair
                        </li>
                        <li>
                            <i class="fas fa-square">
                            </i>
                            Laptop Repair
                        </li>
                        <li>
                            <i class="fas fa-square">
                            </i>
                            Smartphone Repair
                        </li>
                        <li>
                            <i class="fas fa-square">
                            </i>
                            Tablet Repair
                        </li>
                        <li>
                            <i class="fas fa-square">
                            </i>
                            Mac Repair
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>
                        Useful Links
                    </h5>
                    <ul>
                        <li>
                            <i class="fas fa-square">
                            </i>
                            Conditions
                        </li>
                        <li>
                            <i class="fas fa-square">
                            </i>
                            Privacy Policy
                        </li>
                        <li>
                            <i class="fas fa-square">
                            </i>
                            Latest Blogs
                        </li>
                        <li>
                            <i class="fas fa-square">
                            </i>
                            Testimonials
                        </li>
                        <li>
                            <i class="fas fa-square">
                            </i>
                            Our Mechanics
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>
                        Get In Touch
                    </h5>
                    <ul>
                        <li class="flex-touch">
                            <i class="fas fa-phone icon-touch">
                            </i>
                            <div>
                                <span class="touch-head">Phone</span>
                                <span>+123 456 778</span>
                            </div>
                        </li>
                        <li class="flex-touch">
                            <i class="fas fa-envelope icon-touch">
                            </i>
                            <div>
                                <span class="touch-head">Email</span>
                                <span>info@repa.com</span>
                            </div>
                        </li>
                        <li class="flex-touch">
                            <i class="fas fa-map-marker-alt icon-touch">
                            </i>
                            <div>
                                <span class="touch-head">Location</span>
                                <span>Coral Way, Miami, Florida, 33169</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="copyright">
            <p class="copyright-text">Copyright @2024. Repa All Rights Reserved By <span>HiBootstrap</span></p>
        </div>
    </div>
</body>

</html>