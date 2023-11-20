<html>
    <head>
	    <link rel="stylesheet" href="assets/css/map.css" />
        <link rel="stylesheet" href="assets/css/main.css" />
    </head>
    <h1>
        <?php require './db-requests/map-request.php';?> 
    </h1>
    <body>
    <nav id="nav">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="search-cave.html">Caves</a></li>
            <li class="current"><a href="map.php">Map</a></li>
            <li><a href="">About Us</a></li>
            <li><a href="admin-caves.html">Admin</a></li>
            <li><a href="cave-creation.html">Cave Creation</a></li>
            <li><a href="login-admin.html">Login</a></li>
        </ul>
    </nav>
    
        <canvas id="prmap" width="1300" height="500" href="cueva-template.html"></canvas>  
    
    <div id="modal" class="modal">
        <div class="modal-content">
            <span id="close" class="close">&times;</span>
            <h2>Caves in <a id="town-name">TOWN</a>:</h2>
            <p id="cave-list">cave1</p>
        </div>
    </div>

    <div id="footer">
        <div class="container">
            <div class="row">
                <section class="col-3 col-6-narrower col-12-mobilep">
                    <h3>Related Websites</h3>
                    <ul class="links">
                        <li><a href="#">UPRA</a></li>
                        <li><a href="#">Angel Acosta</a></li>
                        <li><a href="#">CaveGeoMap</a></li>
                    </ul>
                </section>
                <section class="col-6 col-12-narrower">
                    <h3>Get In Touch</h3>
                    <form>
                        <div class="row gtr-50">
                            <div class="col-6 col-12-mobilep">
                                <input type="text" name="name" id="name" placeholder="Name" />
                            </div>
                            <div class="col-6 col-12-mobilep">
                                <input type="email" name="email" id="email" placeholder="Email" />
                            </div>
                            <div class="col-12">
                                <textarea name="message" id="message" placeholder="Message" rows="5"></textarea>
                            </div>
                            <div class="col-12">
                                <ul class="actions">
                                    <li><input type="submit" class="button alt" value="Send Message" /></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
        <!-- Icons -->
        <ul class="icons">
            <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
            <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
            <li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
            <li><a href="#" class="icon brands fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
            <li><a href="#" class="icon brands fa-google-plus-g"><span class="label">Google+</span></a></li>
        </ul>
        <!-- Copyright -->
        <div class="copyright">
            <ul class="menu">
                <li>&copy; Puerto Rico Cave Visualization. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>
        </div>
    </div>
        <script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.dropotron.min.js"></script>
		<script src="assets/js/browser.min.js"></script>
		<script src="assets/js/breakpoints.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>
        <script src="assets/js/map.js"></script>
    </body>
</html>