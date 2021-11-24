<?php

class usuarioModel extends Model
{
	public function __construct(){
		parent::__construct();
	}

	public function getUsuarios()
	{
		$usu = $this->_db->query("SELECT u.id, u.nombre, u.email, u.activo, u.direccion, u.telefono, c.nombre as ciudad, r.nombre as role FROM usuarios u INNER JOIN roles r ON u.role_id = r.id LEFT JOIN ciudades c ON u.ciudad_id = c.id ORDER BY nombre ASC");
		return $usu->fetchall();	
	}

	public function getUsuarioId($id){
		$id = (int) $id;

		$usu = $this->_db->prepare("SELECT u.id, u.nombre, u.email, u.role_id, u.activo, u.direccion, u.ciudad_id, u.telefono, c.nombre as ciudad, r.nombre as role FROM usuarios u INNER JOIN roles r ON u.role_id = r.id LEFT JOIN ciudades c ON u.ciudad_id = c.id WHERE u.id = ?");
		$usu->bindParam(1, $id);
		$usu->execute();

		return $usu->fetch();
	}

	public function getUsuarioEmail($email)
	{
		$usu = $this->_db->prepare("SELECT id FROM usuarios WHERE email = ?");
		$usu->bindParam(1, $email);
		$usu->execute();
		
		return $usu->fetch();
	}

	public function verificarUsuario($email, $password)
	{
		$password = Hash::getHash('sha1', $password, HASH_KEY);

		$usu = $this->_db->prepare("SELECT u.id, u.nombre, u.email, u.role_id, r.nombre as role FROM usuarios u INNER JOIN roles r ON u.role_id = r.id WHERE u.email = ? AND u.password = ? AND u.activo = 1");
		$usu->bindParam(1, $email);
		$usu->bindParam(2, $password);
		$usu->execute();

		return $usu->fetch();
	}

	public function getUsuariosRole($role){
		$role = (int) $role;

		$usu = $this->_db->prepare("SELECT DISTINCT id, nombre, email FROM usuarios WHERE role_id = ?");
		$usu->bindParam(1, $role);
		$usu->execute();

		return $usu->fetchall();
	}

	public function getUsuarioDocente(){
		$usu = $this->_db->query("SELECT DISTINCT u.id, u.nombre FROM usuarios u INNER JOIN roles r ON u.role_id = r.id WHERE r.nombre = 'Docente'");

		return $usu->fetchall();
	}

	public function getUsuariosEstudiantes(){
		$usu = $this->_db->query("SELECT DISTINCT u.id, u.nombre FROM usuarios u INNER JOIN roles r ON u.role_id = r.id WHERE r.nombre = 'Estudiante'");

		return $usu->fetchall();
	}

	public function addUsuarios($nombre, $email, $role, $password, $direccion, $ciudad, $telefono)
	{
		#print_r($role);exit;
		$password = Hash::getHash('sha1', $password, HASH_KEY);
		$role = (int) $role;
		#print_r($password);exit;

		$usu = $this->_db->prepare("INSERT INTO usuarios VALUES(null, ?, ?, ?, ?, 1, ?, ?,now(), ?, now())");
		$usu->bindParam(1, $nombre);
		$usu->bindParam(2, $email);
		$usu->bindParam(3, $password);
		$usu->bindParam(4, $role);
		$usu->bindParam(5, $direccion);
		$usu->bindParam(6, $ciudad);
		$usu->bindParam(7, $telefono);
		$usu->execute();

		$row = $usu->rowCount();
		return $row;
	}

	public function editUsuario($id, $nombre, $email, $role, $activo, $direccion, $ciudad, $telefono){
		$id = (int) $id;
		$role = (int) $role;
		$activo = (int) $activo;

		$usu = $this->_db->prepare("UPDATE usuarios SET nombre = ?, email = ?, role_id = ?, activo = ?, direccion = ?, ciudad = ?, telefono = ? WHERE id = ?");
		$usu->bindParam(1, $nombre);
		$usu->bindParam(2, $email);
		$usu->bindParam(3, $role);
		$usu->bindParam(4, $activo);
		$usu->bindParam(5, $direccion);
		$usu->bindParam(6, $ciudad);
		$usu->bindParam(7, $telefono);
		$usu->bindParam(8, $id);
		$usu->execute();

		$row = $usu->rowCount();
		return $row;
	}

	public function deleteUsuario($id){
		$id = (int) $id;

		$usu = $this->_db->prepare("DELETE FROM usuarios WHERE id = ? AND role_id != 1");
		$usu->bindParam(1, $id);
		$usu->execute();

		$row = $usu->rowCount();
		return $row;
	}

}