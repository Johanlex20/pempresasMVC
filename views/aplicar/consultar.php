 
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
                                <th>hora</th>
                                <th>fecha</th>
                                <th>aprendizId</th>
                                <th>empresasId</th>
                                <th>ofertasId</th>
                            </tr>
                        </thead>
                        <tbody>  <!-- MOSTRAR LOS RESULTADOS -->
                            <?php foreach( $aplicar as $apli ):?>
                            <tr>
                                <td> <?php echo $apli-> id; ?> </td>
                                <td> <?php echo $apli-> hora; ?> </td>
                                <td> <?php echo $apli-> fecha; ?></td>
                                <td> <?php echo $apli-> aprendizId; ?> </td>
                                <td> <?php echo $apli-> empresasId; ?> </td>
                                <td> <?php echo $apli-> ofertasId; ?> </td>
                               
                            </tr>
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