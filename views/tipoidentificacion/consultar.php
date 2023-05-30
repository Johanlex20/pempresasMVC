<main class="contenedor seccion">
        <div class="contenedor seccion">
            <div class="contabiden"> 
                <section id= "tablaIdentificacion" class="seccion"> 
                    <h1 class="admi-text-home">Consultar Tipos de Identificaicon</h1>
                        <table class="aprendiz">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>tipo identificacion</th>
                                    <th>acciones</th>
                                </tr>
                            </thead>

                            <tbody>  <!-- MOSTRAR LOS RESULTADOS -->
                                <?php foreach( $tipoidentificacion as $tipot ):?>
                                <tr>
                                    <td> <?php echo $tipot-> id; ?> </td>
                                    <td> <?php echo $tipot-> tipoId; ?> </td>
                                    <td>  
                                        <form method="POST" class="w-100">
                                            <input type="hidden" name="id" value="<?php echo $tipot->id; ?>">
                                                <!-- funcion para esconder el mensaje de eliminacion a usuarios -->
                                            <input type="hidden" name="tipo" value="tipoidentificacion"> 
                                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                                                <!-- funcion para eliminacion usuarios -->
                                        </form>
                                    <a href="/tipoidentificacion/actualizar?id=<?php echo $tipot->id; ?>" class="boton-green-block" >Actualizar</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>                          
                </section>
            </div>
        </div>
        <!-- boton Volver -->
        <a href="/admin/admin" class="boton-volver"> 
            <span class="texto-fondo">Volver</span>
        </a>
    </main> 