SELECT evento.idevento, evento.codigo, objetivo_anual.objetivo_anual, macrocurricula.macrocurricula, tematica.tematica, 
evento.fecha_inicio, evento.fecha_fin, publicacion.publicacion, evento.cupo_min, evento.cupo_max, modalidad.modalidad,
departamento.departamento, municipios.municipio, provincias.provincia, nombre.nombre, nombre.paterno, nombre.materno
FROM evento, objetivo_anual, macrocurricula, microcurricula, tematica, publicacion, modalidad, departamento, municipios, provincias, nombre, usuarios 
WHERE evento.idobjetivo_anual=objetivo_anual.idobjetivo_anual AND evento.idmacrocurricula=macrocurricula.idmacrocurricula 
AND evento.idmicrocurricula=microcurricula.idmicrocurricula AND microcurricula.idtematica=tematica.idtematica 
AND evento.idpublicacion=publicacion.idpublicacion AND evento.idmodalidad=modalidad.idmodalidad 
AND evento.iddepartamento=departamento.iddepartamento AND evento.idprovincia=provincias.idprovincia 
AND evento.idmunicipio=municipios.idmunicipio AND evento.iddocente=usuarios.idusuario 
AND usuarios.idnombre=nombre.idnombre AND microcurricula.idtematica=tematica.idtematica AND evento.idevento='1'