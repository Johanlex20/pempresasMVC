<main class="contenedor seccion">
        <div class="contenedor seccion">
            <div class="contabapren"> 
                <section id= "tablaAprendiz" class="seccion">
                    <h1 class="admi-text-home">Consultar aprendiz</h1>
                <!-- TABLA DE CONSULTA INDEX ADMIN-->
                    <table class="aprendiz">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>nombre</th>
                                <th>identificacion</th>
                                <th>email</th>
                                <th>telefono</th>
                                <th>acciones</th>
                            </tr>
                        </thead>
                        <tbody>  <!-- MOSTRAR LOS RESULTADOS -->
                            <?php foreach( $aprendiz as $aprendi ):?>
                            <tr>
                                <td> <?php echo $aprendi-> id; ?> </td>
                                <td> <?php echo $aprendi-> nombre; ?> </td>
                                <td> <?php echo $aprendi-> identificacion; ?></td>
                                <td> <?php echo $aprendi-> email; ?> </td>
                                <td> <?php echo $aprendi-> telefono; ?> </td>
                                <td>
                                <form method="POST" class="w-100" action="/admin/propiedades/consultar.php">
                                    <input type="hidden" name="id" value="<?php echo $aprendi->id; ?>">
                                    <!-- funcion para esconder el mensaje de eliminacion a usuarios -->
                                    <input type="hidden" name="tipo" value="aprendiz">    
                                    <input type="submit" class="boton-rojo-block" value="Eliminar">
                                <!-- funcion para eliminacion usuarios -->
                                </form>
                                <a href="/admin/propiedades/actualizar.php?id=<?php echo $aprendi->id; ?>" class="boton-green-block" >Actualizar</a>
                                </td>                                
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>
            </div>
        <!-- boton Volver -->
        <a href="/admin" class="boton-volver"> 
            <span class="texto-fondo">Volver</span>
        </a>
    </main> 