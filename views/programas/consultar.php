<main class="contenedor seccion">
        <div class="contenedor seccion">
            <div class="contabprog"> 
                <section id= "tablaPrograma" class="seccion"> 
                    <h1 class="admi-text-home">Consultar Tipos De Programas</h1>
                        <table class="aprendiz">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>tipo Programa</th>
                                    <th>acciones</th>
                                </tr>
                            </thead>

                            <tbody>  <!-- MOSTRAR LOS RESULTADOS -->
                                <?php foreach( $programa  as $tipop ):?>
                                <tr>
                                    <td> <?php echo $tipop-> id; ?> </td>
                                    <td> <?php echo $tipop-> tipoPrograma; ?> </td>
                                    <td>  
                                        <form method="POST" class="w-100" action="/programas/eliminar">
                                            <input type="hidden" name="id" value="<?php echo $tipop->id; ?>">
                                                <!-- funcion para esconder el mensaje de eliminacion a usuarios -->
                                            <input type="hidden" name="tipo" value="tipoprograma"> 
                                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                                                <!-- funcion para eliminacion usuarios -->
                                        </form>
                                        <a href="/programas/actualizar?id=<?php echo $tipop->id; ?>" class="boton-green-block" >Actualizar</a>
                                    </td>
                                <?php endforeach; ?>
                            </tbody>
                        </table>                          
                </section>
        </div>
        <!-- boton Volver -->
        <a href="/perfil/admin" class="boton-volver"> 
            <span class="texto-fondo">Volver</span>
        </a>
</main> 