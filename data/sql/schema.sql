CREATE TABLE Desti_Remi (id INT UNSIGNED AUTO_INCREMENT, descripcion VARCHAR(50) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE Folio_Otros (id INT UNSIGNED AUTO_INCREMENT, descripcion VARCHAR(50) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE Movimientos (id BIGINT UNSIGNED AUTO_INCREMENT, usuario_id BIGINT NOT NULL, remitente_id INT UNSIGNED, responsable_id INT UNSIGNED NOT NULL, destinatario_id INT UNSIGNED, fecha_recepcion datetime, fecha_elevacion datetime, referencia_id INT UNSIGNED, referencia_nro INT UNSIGNED, fecha_documento DATE, cnrt_pendiente TINYINT(1) NOT NULL, tramite_pendiente TINYINT(1) NOT NULL, cudap VARCHAR(21) NOT NULL, cantidad_folios BIGINT UNSIGNED, comentarios TEXT, vinculo_exp VARCHAR(20), asunto TEXT, folio_fep BIGINT, folio_nca BIGINT, folio_fsr BIGINT, folio_soe BIGINT, folio_allc BIGINT, folio_allm BIGINT, folio_sgld BIGINT, folio_otros_id INT UNSIGNED, nro_folio_otros BIGINT, INDEX destinatario_id_idx (destinatario_id), INDEX remitente_id_idx (remitente_id), INDEX responsable_id_idx (responsable_id), INDEX referencia_id_idx (referencia_id), INDEX folio_otros_id_idx (folio_otros_id), INDEX usuario_id_idx (usuario_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE Referencia (id INT UNSIGNED AUTO_INCREMENT, descripcion VARCHAR(50) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE Responsables (id INT UNSIGNED AUTO_INCREMENT, usuario_id BIGINT NOT NULL, INDEX usuario_id_idx (usuario_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE Subtitulo (id BIGINT UNSIGNED AUTO_INCREMENT, descripcion VARCHAR(50) NOT NULL, titulo_id BIGINT UNSIGNED NOT NULL, INDEX titulo_id_idx (titulo_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE SubtitulosxMov (movimiento_id BIGINT UNSIGNED, subtitulo_id BIGINT UNSIGNED, PRIMARY KEY(movimiento_id, subtitulo_id)) ENGINE = INNODB;
CREATE TABLE Titulo (id BIGINT UNSIGNED AUTO_INCREMENT, descripcion VARCHAR(45) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255), last_name VARCHAR(255), email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
ALTER TABLE Movimientos ADD CONSTRAINT Movimientos_usuario_id_sf_guard_user_id FOREIGN KEY (usuario_id) REFERENCES sf_guard_user(id);
ALTER TABLE Movimientos ADD CONSTRAINT Movimientos_responsable_id_Responsables_id FOREIGN KEY (responsable_id) REFERENCES Responsables(id);
ALTER TABLE Movimientos ADD CONSTRAINT Movimientos_remitente_id_Desti_Remi_id FOREIGN KEY (remitente_id) REFERENCES Desti_Remi(id);
ALTER TABLE Movimientos ADD CONSTRAINT Movimientos_referencia_id_Referencia_id FOREIGN KEY (referencia_id) REFERENCES Referencia(id);
ALTER TABLE Movimientos ADD CONSTRAINT Movimientos_folio_otros_id_Folio_Otros_id FOREIGN KEY (folio_otros_id) REFERENCES Folio_Otros(id);
ALTER TABLE Movimientos ADD CONSTRAINT Movimientos_destinatario_id_Desti_Remi_id FOREIGN KEY (destinatario_id) REFERENCES Desti_Remi(id);
ALTER TABLE Responsables ADD CONSTRAINT Responsables_usuario_id_sf_guard_user_id FOREIGN KEY (usuario_id) REFERENCES sf_guard_user(id);
ALTER TABLE Subtitulo ADD CONSTRAINT Subtitulo_titulo_id_Titulo_id FOREIGN KEY (titulo_id) REFERENCES Titulo(id);
ALTER TABLE SubtitulosxMov ADD CONSTRAINT SubtitulosxMov_subtitulo_id_Subtitulo_id FOREIGN KEY (subtitulo_id) REFERENCES Subtitulo(id);
ALTER TABLE SubtitulosxMov ADD CONSTRAINT SubtitulosxMov_movimiento_id_Movimientos_id FOREIGN KEY (movimiento_id) REFERENCES Movimientos(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
