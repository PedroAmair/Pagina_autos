<footer class="footer contenedor-maximo">
        <div class="contenido-footer">
            <div class="menu-inferior">
                <nav class="navegacion">
                    <a class="<?php echo isset($_SESSION["login"]) ? 'invisible' : ''; ?>" href="/login.php">Iniciar sesión</a>
                    <a class="<?php echo isset($_SESSION["login"]) ? '' : 'invisible'; ?>" href="/admin/principalAdministracion.php">Administración</a>
                    <a href="/nosotros.php">Nosotros</a>
                    <a href="/galeria.php">Galería</a>
                    <a href="/contacto.php">Contacto</a>
                    <a class="<?php echo isset($_SESSION["login"]) ? '' : 'invisible'; ?>" href="/cerrar-sesion.php">Cerrar sesión</a>
                </nav>
            </div>

            <div class="redes-sociales">
                <h3>Nuestras redes sociales</h3>
                <div class="redes-sociales-iconos">
                    <a href="https://www.youtube.com">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-youtube" width="48" height="48" viewBox="0 0 24 24" stroke-width="1.5" stroke="#0c42ad" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <rect x="3" y="5" width="18" height="14" rx="4" />
                            <path d="M10 9l5 3l-5 3z" />
                        </svg>
                    </a>
                    <a href="https://www.facebook.com">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-facebook" width="48" height="48" viewBox="0 0 24 24" stroke-width="1.5" stroke="#0c42ad" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                        </svg>
                    </a>
                    <a href="https://www.instagram.com">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-instagram" width="48" height="48" viewBox="0 0 24 24" stroke-width="1.5" stroke="#0c42ad" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <rect x="4" y="4" width="16" height="16" rx="4" />
                            <circle cx="12" cy="12" r="3" />
                            <line x1="16.5" y1="7.5" x2="16.5" y2="7.501" />
                        </svg>
                    </a>
                    <a href="https://www.twitter.com">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-twitter" width="48" height="48" viewBox="0 0 24 24" stroke-width="1.5" stroke="#0c42ad" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="copyright">
            <p>&copy; 2022 - Pedro Amair</p>
        </div>
    </footer>
    
    <?php 
        $ubicacionActual = $_SERVER["PHP_SELF"];

        if($ubicacionActual == "/index.php") {
            echo "<script src= '/js/mapa.js'></script>";
            echo "<script src= '/js/leaflet.js'></script>";
        } 
        if($ubicacionActual == "/contacto.php") {
            echo "<script src= '/js/formularioContacto.js'></script>";
        } 
        if($ubicacionActual == "/admin/usuarios/index.php") {
            echo "<script src= '/js/notificacionesBD.js'></script>";
        }
        if($ubicacionActual == "/admin/vehiculos/index.php") {
            echo "<script src= '/js/notificacionesBD.js'></script>";
        } 
        if($ubicacionActual == "/admin/usuarios/index.php") {
            echo "<script src= '/js/eliminarUsuario.js'></script>";
        }
    ?>
    <script src="/js/modernizr.js"></script>
    <script src="/js/main.js"></script>
</body>
</html>