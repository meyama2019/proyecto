<?php
   
    $mysqli = mysqli_connect('localhost', 'socio', 'socio', 'marte');
	
    $no = $_POST['getresult'];
    $result = mysqli_query($mysqli, "SELECT * FROM noticias, usuarios
																 WHERE userid =id_usuario
																 ORDER BY fechainicio DESC
																 LIMIT $no,5");
    while ($news_data = mysqli_fetch_assoc($result))
	{?>
        <tr class="item">
									<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" accept-charset="utf-8">
										<td class="form-group">
											<textarea type="text" class="form-control" name ="titulo" value="" ><?php echo utf8_encode($news_data['titulo']); ?></textarea>
										</td>
										<td class="form-group">
											<textarea type="text" class="form-control" name ="descripcion" value="" ><?php echo utf8_encode($news_data['descripcion']); ?></textarea>
										</td>
										<td class="form-group">
											<?php echo utf8_encode($news_data['usuario']); ?>
										</td>
										<td class="form-group">
											<input type="date" class="form-control" name ="fechainicio" value="<?php echo $news_data['fechainicio']; ?>">
										</td>
										<td class="form-group">
											<input type="date" class="form-control" name ="fechafin" value="<?php echo $news_data['fechafin']; ?>">
										</td>
										<td>
											<input type="hidden" class="form-control" name ="id_noticia" value="<?php echo utf8_encode($news_data['id_noticia']); ?>">
											<button type="submit" class="btn btn-outline-danger btn-sm" name="updatenews">Editar</button>
											<br> <br>
											<button type="submit" class="btn btn-outline-danger btn-sm" name="deletenews">Eliminar</button>
											
										</td>

									</form>
		</tr>
    <?php }
?>