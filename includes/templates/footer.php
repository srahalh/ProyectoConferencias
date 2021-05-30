<footer class="site-footer ">
        <div class="contenedor ">
            <div class="footer-informacion ">
                <h3>Sobre <span>GDLWEBCAMP</span></h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eum nostrum natus facere, corrupti ipsam corporis consequuntur facilis odio commodi, a assumenda fugiat quas autem. Perspiciatis veniam exercitationem alias aliquid velit.</p>
            </div>
            <div class="ultimos-tweets ">
                <h3>Utimos <span>Tweets</span></h3>
                <ul>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati odio officiis quidem quisquam molestiae. Iste nihil vitae fugit sed minima velit.
                    </li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati odio officiis quidem quisquam molestiae. Iste nihil vitae fugit sed minima velit.
                    </li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati odio officiis quidem quisquam molestiae. Iste nihil vitae fugit sed minima velit.
                    </li>
                </ul>
            </div>
            <div class="menu ">
                <h3>Redes <span>Sociales</span></h3>
                <nav class="redes-sociales ">
                    <a href="# "><i class="fab fa-facebook-f "></i></a>
                    <a href="# "><i class="fab fa-twitter "></i></a>
                    <a href="# "><i class="fab fa-pinterest-p "></i></a>
                    <a href="# "><i class="fab fa-youtube "></i></a>
                    <a href="# "><i class="fab fa-instagram "></i></a>
                </nav>
            </div>
        </div>
    </footer>
    <p class="copy-r ">
        Todos los derechos reservado &copy;
    </p>
    <!-- Footer -->
    <script src="js/vendor/modernizr-3.8.0.min.js "></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js " integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin=" anonymous "></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js "><\/script>');
    </script>
    <script src="js/plugins.js "></script>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js "></script>
    <script src="https://kit.fontawesome.com/59898b4a58.js " crossorigin="anonymous "></script>
    <script src="js/jquery.animateNumber.js"></script>
    <script src="js/jquery.countdown.js"></script>
    
    <?php 
        //Para cargar los archivos solo si son necesarios, se coloca en el header porque es lo que carga primero
        $archivo = basename($_SERVER['PHP_SELF']);//Te devuelve el nombre del archivo que estas cargando.
        $pagina = str_replace('.php', '', $archivo);
        
        switch ($pagina) {
            case 'invitados':
                echo '<script src="js/jquery.colorbox.js "></script>';
                break;
            case 'conferencia':
                echo '<script src="js/lightbox.js"></script>';
                break;
            case 'calendario':
                break;
        }
        ?>
    <script src="js/main.js "></script>


    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
    <script>
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('set', 'transport', 'beacon');
        ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js " async></script>
</body>

</html>