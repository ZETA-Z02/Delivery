# BASE DE DATOS

## ENTIDADES

### Entidad Login

- id_login **(PK): INT AUTO INCREMENT UNIQUE**
- usuario: **VARCHAR(50)**
- password: **VARCHAR(300)**
- id_cliente **(FK): INT**
- id_personal **(FK): INT**
- nivel: **INT**

### Entidad Clientes

- id_cliente **(PK): INT AUTO INCREMENT UNIQUE**
- nombres: **VARCHAR(50)**
- apellidos: **VARCHAR(50)**
- dni: **INT UNIQUE**
- telefono: **INT UNIQUE**
- direccion: **VARCHAR(60)**
- correo: **VARCHAR(60)**

### Entidad Personal

- id_personal **(PK): INT AUTO INCREMENT UNIQUE**
- nombres: **VARCHAR(50)**
- apellidos: **VARCHAR(50)**
- dni: **INT UNIQUE**
- telefono: **INT UNIQUE**
- direccion: **VARCHAR(50)**
- estado: **INT**
- cargo: **VARCHAR(10)**

### Entidad Productos

- id_producto **(PK): INT AUTO INCREMENT UNIQUE**
- nombre: **VARCHAR(50)**
- descripcion: **TEXT**
- marca: **VARCHAR(50)**
- contenido: **VARCHAR(30)**
- precio: **DOUBLE(8,2)**

### Entidad Almacen

- id_almacen **(PK): INT AUTO INCREMENT UNIQUE**
- id_producto **(FK): INT**
- cantidad: **INT**
- fecha_ultima_actualizacion: **Date**

### Entidad Inventario

- id_inventario **(PK): INT AUTO INCREMENT UNIQUE**
- id_producto **(FK): INT**
- fecha_entrega: **DATE**
- cantidad: **INT**
- id_repartidor **(FK): INT**

### Entidad Repartidor

- id_repartidor **(PK): INT AUTO INCREMENT UNIQUE**
- nombres: **VARCHAR(50)**
- apellidos: **VARCHAR(50)**
- dni: **INT UNIQUE**
- telefono: **INT UNIQUE**
- vehiculo: **VARCHAR(50)**

### Entidad Pedido

- id_pedido **(PK): INT AUTO INCREMENT UNIQUE**
- id_personal **(FK): INT**
- id_cliente **(FK): INT**
- descripcion: **VARCHAR(80)**
- destino: **VARCHAR(80)**
- estado: **VARCHAR(15)**
- fecha: **DATE Y-m-d**
- hora: **TIME H-i-s**
- opcion_pago: **VARCHAR(20)**

### Entidad DetallePedido

- id_detalle **(PK): INT AUTO INCREMENT UNIQUE**
- id_pedido **(FK): INT**
- id_producto **(FK): INT**
- cantidad: **INT**
- subtotal: **DOUBLE(8,2)**
