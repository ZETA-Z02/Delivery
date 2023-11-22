# Documentación de la Base de Datos - Sistema de Entrega de Gaseosas

## Entidades

### Entidad Login
- **id_login (PK)**: Identificador único del registro de inicio de sesión.
- usuario: Nombre de usuario utilizado para iniciar sesión.
- password: Contraseña hasheada y segura.
- id_personal (FK): Identificador de personal asociado al inicio de sesión (si aplica).
- id_cliente (FK): Identificador de cliente asociado al inicio de sesión (si aplica).
- nivel: Nivel de usuario (1 = administrador, 2 = personal, 3 = usuario).

### Entidad Clientes
- **id_usuario (PK)**: Identificador único del cliente.
- nombres: Nombres del cliente.
- apellidos: Apellidos del cliente.
- dni: Número de identificación único del cliente.
- telefono: Número de teléfono del cliente.
- direccion: Dirección de la tienda del cliente.
- correo: Dirección de correo electrónico del cliente.

### Entidad Personal
- **id_personal (PK)**: Identificador único del personal.
- nombres: Nombres del personal.
- apellidos: Apellidos del personal.
- dni: Número de identificación único del personal.
- telefono: Número de teléfono del personal.
- direccion: Dirección del personal.
- estado: Estado del personal (activo o inactivo).
- cargo: Cargo del personal (gerente o personal).

### Entidad Productos
- **id_producto (PK)**: Identificador único del producto.
- nombre: Nombre del producto.
- descripcion: Descripción del producto.
- marca: Marca del producto.
- contenido: Información sobre la cantidad de producto por paquete, etc.
- precio: Precio del producto.

### Entidad Almacen
- **id_almacen (PK)**: Identificador único del registro del almacén.
- id_producto (FK): Identificador del producto en el almacén.
- cantidad: Cantidad disponible en el almacén.
- fecha_ultima_actualizacion: Fecha de la última actualización del almacén.

### Entidad Inventario
- **id_inventario (PK)**: Identificador único del registro de inventario.
- id_producto (FK): Identificador del producto que llegó.
- fecha_entrega: Fecha de la entrega.
- cantidad: Cantidad del producto que llegó al almacén.
- id_repartidor (FK): Identificador del repartidor que realizó la entrega.

### Entidad Repartidor
- **id_repartidor (PK)**: Identificador único del repartidor.
- nombres: Nombres del repartidor.
- apellidos: Apellidos del repartidor.
- dni: Número de identificación único del repartidor.
- telefono: Número de teléfono del repartidor.
- vehiculo: Tipo de vehículo utilizado para la entrega.

### Entidad Pedido
- **id_pedido (PK)**: Identificador único del pedido.
- id_personal (FK): Identificador del personal encargado del pedido.
- id_cliente (FK): Identificador del cliente que realizó el pedido.
- descripcion: Descripción adicional del pedido.
- destino: Lugar de destino del pedido (dirección del cliente).
- estado: Estado del pedido (pendiente o entregado).
- fecha-hora: Fecha y hora en que se realizó el pedido.
- opcion_pago: Método de pago utilizado (boleta, efectivo, tarjeta).

### Entidad DetallePedido
- **id_detalle (PK)**: Identificador único del detalle del pedido.
- id_pedido (FK): Identificador del pedido al que pertenece el detalle.
- id_producto (FK): Identificador del producto en el pedido.
- cantidad: Cantidad del producto incluida en el pedido.
- subtotal: Precio subtotal de la cantidad comprada.

## Restricciones
- Las contraseñas en la entidad "Login" se almacenan de manera segura utilizando hash y salt para mayor seguridad.
- Se aplican restricciones UNIQUE en las columnas DNI y teléfono en las entidades "Clientes," "Personal," y "Repartidor" para evitar duplicados.
- Las relaciones entre tablas están definidas a través de claves foráneas (FK) para garantizar la integridad referencial de los datos.