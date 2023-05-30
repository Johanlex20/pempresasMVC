<main>
    <div class="contenerdor_formulario">
        <div class="formulario">
                <div class="cuadro">
                    <h3>Actualizar Oferta</h3>
                   <!-- mensaje de validacion complete los datos -->
                    <?php foreach($errores as $error): ?>  
                        <div class="alerta error">
                            <?php echo $error; ?>
                        </div>
                    <?php endforeach;?> 
                    <form class="formulario-oferta" method ="POST" enctype="multipart/form-data">
                        <?php include __DIR__ . '/formulario_ofertas.php' ?>
                        <button type="submit" class="boton">Actualizar Oferta</button>
                    </form>
                </div>
        </div>
    </div>
           <!-- boton Volver -->
           <a href="/ofertas/consultar" class="boton-volver"> 
            <span class="texto-fondo">Volver</span>
           </a>
</main>