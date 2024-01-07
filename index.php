<?php 
    require_once "includes/app.php";

    session_start();

    $conn = conectarBD();

    $query = "SELECT * FROM vehiculos LIMIT 3; ";
    $resultado = mysqli_query($conn, $query);

    invocarTemplate("header", true);
?>

    <main class="main contenedor-grande">
        <h2>¿Por qué preferirnos?</h2>
        <section class="elegirnos-razones">
            <div class="vehiculos">
                <div class="icono">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-car" width="100" height="100" viewBox="0 0 24 24" stroke-width="1.5" stroke="#0c42ad" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <circle cx="7" cy="17" r="2" />
                        <circle cx="17" cy="17" r="2" />
                        <path d="M5 17h-2v-6l2 -5h9l4 5h1a2 2 0 0 1 2 2v4h-2m-4 0h-6m-6 -6h15m-6 0v-5" />
                      </svg>
                </div>
                <h3>Vehículos</h3>
                <div class="contenido">
                    <p>
                        Contamos con los modelos de carros más exclusivos. 
                        Ofrecemos alternativas de las marcas más reconocidas 
                        del mundo automovilístico, así podremos cubrir todas 
                        las necesidades de nuestros clientes y garantizar su 
                        satisfacción.
                    </p>
                </div>
            </div>
           
            <div class="responsabilidad">
                <div class="icono">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-certificate" width="100" height="100" viewBox="0 0 24 24" stroke-width="1.5" stroke="#0c42ad" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <circle cx="15" cy="15" r="3" />
                        <path d="M13 17.5v4.5l2 -1.5l2 1.5v-4.5" />
                        <path d="M10 19h-5a2 2 0 0 1 -2 -2v-10c0 -1.1 .9 -2 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -1 1.73" />
                        <line x1="6" y1="9" x2="18" y2="9" />
                        <line x1="6" y1="12" x2="9" y2="12" />
                        <line x1="6" y1="15" x2="8" y2="15" />
                      </svg>
                </div>
                <h3>Responsabilidad</h3>
                <div class="contenido">
                    <p>
                        Todos nuestros vehículos, tanto nuevos como usados tienen sus 
                        documentos al día. De este modo usted tendrá toda la tranquilidad 
                        de no tener que hacer trámites engorrosos. Una vez hecha la compra 
                        podrá irse de inmediato.
                    </p>
                </div>
            </div>
    
            <div class="precios">
                <div class="icono">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-coin" width="100" height="100" viewBox="0 0 24 24" stroke-width="1.5" stroke="#0c42ad" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <circle cx="12" cy="12" r="9" />
                        <path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 0 0 0 4h2a2 2 0 0 1 0 4h-2a2 2 0 0 1 -1.8 -1" />
                        <path d="M12 6v2m0 8v2" />
                    </svg>
                </div>
                <h3>Precios</h3>
                <div class="contenido">
                    <p>
                        Ofrecemos los precios más competitivos del mercado. Cuando llegue a 
                        nuestro establecimiento no solo quedará impresionado por la belleza 
                        de nuestros vehículos, sino por el costo tan generoso que pueden llegar
                        a tener.
                    </p>
                </div>
            </div>
        </section>
    </main>

    <section class="galeria contenedor-grande">
        <h2>Los más vendidos</h2>
        <div class="galeria-seleccionados">
            <?php while($vehiculo = mysqli_fetch_assoc($resultado)): ?>
                <div class="seleccionado">
                    <div class="imagen">
                        <img loading="lazy" src="/img/imagenesSubidas/<?php echo $vehiculo["imagen"]; ?>" alt="imagen seleccionado">
                    </div>
                            
                    <div class="modelo">
                        <h3><?php echo $vehiculo["marca"]." ".$vehiculo["modelo"]; ?></h3>
                        <p>Año: <?php echo $vehiculo["ano"]; ?></p>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <div class="alinear-derecha">
            <a  class="boton boton-amarillo opaco" href="galeria.php">Ver todos</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra el auto ideal</h2>
        <p>
            Comunícate con uno de nuestros agentes de venta para que pueda 
            ayudarte a conseguir tu vehículo soñado
        </p>
        <a href="contacto.php" class="boton boton-amarillo opaco">Contáctanos</a>
    </section>

    <section class="testimonios contenedor-grande">
        <h2>Testimonios de nuestros compradores</h2>
        <div class="testimonios-seleccionados">
            <div class="testimonio">
                <div class="testimonio-texto">
                    <blockquote>
                       <span>"</span>Excelente atención del agente de venta, aclaró
                       todas mis dudas. Satisfecha con mi lujoso auto nuevo<span>"</span>.
                    </blockquote>
                    <p>Alana Torres</p>
                </div>
            </div>
    
            <div class="testimonio">
                <div class="testimonio-texto">
                    <blockquote>
                        <span>"</span>Estoy feliz con mi compra. Todo fue rápido y transparente.
                        Disfruto de la potencia de mi carro deportivo<span>"</span>.
                    </blockquote>
                    <p>Manuel Plasencia</p>
                </div>
            </div>
    
            <div class="testimonio">
                <div class="testimonio-texto">
                    <blockquote>
                        <span>"</span> Es una compañia seria que te brinda una muy buena asesoría y ofrece
                        solo vehículos de calidad. Estoy muy feliz<span>"</span>.
                    </blockquote>
                    <p>Indira Rodríguez</p>
                </div>
            </div>
        </div>
    </section>

    <section class="ubicanos">
        <h2>Ubícanos</h2>
        <div class="mapa" id="mapa"></div>
    </section>

    <?php mysqli_close($conn); ?>
<?php invocarTemplate("footer"); ?>