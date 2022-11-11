use db_tienda_ropa;

ALTER TABLE prendas
	ADD CONSTRAINT chk_talla_valida
		CHECK (talla IN ('XS','S','M','L','XL'));
        
ALTER TABLE prendas
	ADD CONSTRAINT chk_categoria_valida
		CHECK (categoria IN ('Camisetas','Pantalones','Accesorios'));
        
select * from cliente;
ALTER TABLE cliente ADD `fechaRegistro` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;

ALTER TABLE cliente
	ADD COLUMN imagen VARCHAR(150);
    
DESCRIBE PRENDAS;

CREATE TABLE clientes_prendas(
	cliente_id INT,
    prenda_id INT,
    cantidad INT,
    fecha DATE,
    
    CONSTRAINT clientes_prendas_pk 
		PRIMARY KEY (cliente_id,prenda_id),
        
	CONSTRAINT clientes_prendas_cliente_fk
		FOREIGN KEY (cliente_id)
        REFERENCES cliente(id),
	
    CONSTRAINT clientes_prendas_prenda_fk 
		FOREIGN KEY (prenda_id)
        REFERENCES prendas(id),
        
	CONSTRAINT chk_cantidad_valida
		CHECK (cantidad>=1)	
);

INSERT INTO clientes_prendas
	VALUES (90,78,1,'2022-11-11');
    
INSERT INTO clientes_prendas
	VALUES (90,81,2,'2022-11-11');
    
    
INSERT INTO clientes_prendas
	VALUES (88,78,2,'2022-11-11');

SELECT * FROM clientes_prendas;

CREATE VIEW vw_clientes_prendas AS
SELECT c.usuario, p.nombre producto, cp.cantidad, p.precio, cp.fecha
	FROM cliente c
    JOIN clientes_prendas cp ON c.id = cp.cliente_id
    JOIN prendas p ON p.id = cp.prenda_id;
    
SELECT * FROM vw_clientes_prendas;

ALTER TABLE clientes_prendas
	ADD COLUMN talla VARCHAR(10);