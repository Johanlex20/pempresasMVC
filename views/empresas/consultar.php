<main class="contenedor seccion">
        <div class="contenedor seccion">
            <div class="contabapren"> 
                <section id= "tablaAprendiz" class="seccion">
                    <h1 class="admi-text-home">Consultar Empresa</h1>
                <!-- TABLA DE CONSULTA INDEX ADMIN-->
                    <table class="aprendiz">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Razon Social</th>
                                <th>identificacion</th>
                                <th>Logo</th>
                                <th>email</th>
                                <th>telefono</th>
                                <th>Dirección</th>
                                <th>acciones</th>
                            </tr>
                        </thead>

                        <tbody>  <!-- MOSTRAR LOS RESULTADOS -->
                            <?php foreach( $empresa as $empre ):?>
                            <tr>
                                <td> <?php echo $empre-> id; ?> </td>
                                <td> <?php echo $empre-> razonsocial; ?> </td>
                                <td> <?php echo $empre-> identificacionemp; ?></td>
                                <td> <img src="/imagenes/<?php echo $empre->imagen; ?>" class="imagen-tabla"> </td>
                                <td> <?php echo $empre-> emailemp; ?> </td>
                                <td> <?php echo $empre-> telefonoemp; ?> </td>
                                <td> <?php echo $empre-> direccionemp; ?> </td>
                                <td>

                                <form method="POST" class="w-100" action="/empresas/eliminar" enctype="multipart/form-data" >
                                    <input type="hidden" name="id" value="<?php echo $empre->id; ?>">
                                    <input type="hidden" name="tipo" value= "empresas" >    
                                    <input type="submit" class="boton-rojo-block" value="Eliminar">
                                <!-- funcion para eliminacion usuarios -->
                                </form>
                                <a href="/empresas/actualizar?id=<?php echo $empre->id; ?>" class="boton-green-block" >Actualizar</a>
                                </td>                
                            </tr>
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