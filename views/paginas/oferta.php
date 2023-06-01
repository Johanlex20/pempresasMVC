<section>
    <div class="conte_cajas_ofe">
        <h2> OFERTA LABORAL</h2>
            <div class="cajas_ofe">
                <div class="caja_ofe_only">
                    <img loading="lazy" src="/imagenes/<?php echo $oferta->imagen; ?>" alt="anuncio">
                    <h3><?php echo $oferta->titulo; ?></h3>
                    <p class="precio">$<?php echo $oferta->sueldo; ?></p>

                    <div class="iconos-caja">
                        <div>
                            <img loading="lazy" src="/build/img/icono-empresa.webp"alt="icono-persona"> 
                            <p>Vacantes: <?php echo $oferta->vacantes; ?></p>   
                        </div>
                        <div>
                            <img loading="lazy" src="/build/img/icono-email.webp"alt="icono-email">
                            <p>google@gmail.com</p>
                        </div>
                        <div>
                            <img loading="lazy" src="/build/img/icono-telefono.webp"alt="icono-telefono">
                            <p>311010000</p>
                        </div>      
                    </div>
                        <h3>Sobre la oferta</h3>
                        <p><?php echo $oferta->descriempleo; ?></p>
                        <a href="/admin/propiedades/actualizar.php" class="boton-volver">
                            <span class="texto-fondo">APLICAR</span>
                        </a> 
                </div>            
            </div>    
    </div>
</section>