function editar(id){
	var titulo = $("#titulo"+id).val();
	var descripcion = $("#descripcion"+id).val();
				
	$("#mod_idtareas").val(id);
	$("#mod_titulo").val(titulo);
	$("#mod_descripcion").val(descripcion);
}

function desactivar(id){
	$("#mod").val(id);
}