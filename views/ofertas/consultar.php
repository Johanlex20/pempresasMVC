<main class="contenedor seccion">
        <div class="contenedor seccion">
            <div class="contabprog"> 
                <section id= "tablaPrograma" class="seccion"> 
                    <h1 class="admi-text-home">Consultar Tipos De Ofertas</h1>
                        <table class="aprendiz">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Titulo Ofertas</th>
                                    <th>Tipo Programa</th>
                                    <th>Imagen</th>
                                    <th>Jornada</th>
                                    <th>Modalida</th>
                                    <th>Sueldo</th>
                                    <th>vacantes</th>
                                    <th>acciones</th>
                                </tr>
                            </thead>

                            <tbody>  <!-- MOSTRAR LOS RESULTADOS -->
                                <?php foreach( $oferta  as $ofer ):?>
                                <tr>
                                    <td> <?php echo $ofer-> id; ?> </td>
                                    <td> <?php echo $ofer-> titulo; ?> </td>
                                    <td> <?php echo $ofer-> tipoPrograma; ?> </td>
                                    <td> <img src="/imagenes/<?php echo $ofer->imagen; ?>" class="imagen-tabla"> </td>
                                    <td> <?php echo $ofer-> jornada; ?> </td>
                                    <td> <?php echo $ofer-> modatrabajo; ?> </td>
                                    <td> <?php echo $ofer-> sueldo; ?> </td>
                                    <td> <?php echo $ofer-> vacantes; ?> </td>
                                    <td>  
                                        <form method="POST" class="w-100" action="/ofertas/eliminar" enctype="multipart/form-data" >
                                            <input type="hidden" name="id" value="<?php echo $ofer->id; ?>">
                                                <!-- funcion para esconder el mensaje de eliminacion a usuarios -->
                                            <input type="hidden" name="tipo" value= "ofertas"> 
                                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                                                <!-- funcion para eliminacion usuarios -->
                                        </form>
                                        <a href="/ofertas/actualizar?id=<?php echo $ofer->id; ?>" class="boton-green-block" >Actualizar</a>
                                    </td>
                                <?php endforeach; ?>
                            </tbody>
                        </table>                          
                </section>
        </div>
        <!-- boton Volver -->
        <a href="/admin/admin" class="boton-volver"> 
            <span class="texto-fondo">Volver</span>
        </a>
    </main> 