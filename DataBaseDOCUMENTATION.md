# DATA BASE-DELIVERY

## RECONOCIMIENTOS DE ENTIDADES

### Entidad Login

- id_login **_(PK)_ ---INT AUTO INCREMENT UNIQUE**
- usuario **---VARCHAR(50)**--->Nombre de usuario por el cual ingresara al sistema
- password **---VARCHAR(300)**--->su contraseña
- id_cliente **_(FK)_ ---INT** --->identificador si es cliente, si no lo es sera null
- id_personal **_(FK)_ ---INT** --->identificador si es personal, si no lo es sera null
- nivel **---INT** --->nivel de usuario dependiendo de su cargo (1-2-3) 1= administrador, 2=personal, 3=usuario

### Entidad Clientes

- id_cliente **_(PK)_ ---INT AUTO INCREMENT UNIQUE**
- nombres **---VARCHAR(50)**
- apellidos **---VARCHAR(50)**
- dni **---INT UNIQUE**
- telefono **---INT UNIQUE**
- direccion **---VARCHAR(60)**--->direccion de su local(tienda)
- correo **---VARCHAR(60)**

### Entidad Personal

- id_personal **_(PK)_ ---INT AUTO INCREMENT UNIQUE**
- nombres **---VARCHAR(50)**
- apellidos **---VARCHAR(50)**
- dni **---INT UNIQUE**
- telefono **---INT UNIQUE**
- direccion **---VARCHAR(50)**
- estado **---INT** --->activo o inactico 1=activo 0=inactivo
- cargo **---VARCHAR(10)**--->gerente o personal

### Entidad Productos

- id_producto **_(PK)_ ---INT AUTO INCREMENT UNIQUE**
- nombre **---VARCHAR(50)**--->nombre del producto
- descripcion **---VARCHAR(80)**--->descripcion del producto
- marca **---VARCHAR(50)**--->Que marca es
- contenido **---VARCHAR(30)**--->cuando contiene cada producto por ejemplo 1pack=6 unidades
- precio **---DOUBLE(8,2)**--->precio del producto

### Entidad Almacen

- id_almacen **_(PK)_ ---INT AUTO INCREMENT UNIQUE**
- id_producto **_(FK)_**--->que producto esta en el almacen
- cantidad **---INT**---> cantidad disponible en el almacen
- fecha_ultima_actuzalicacion **---Date** ---> ultima fecha en la cual se actualizo el almacen(en el que llegaron mas productos)

### Entidad Inventario

- id_inventario **_(PK)_ ---INT AUTO INCREMENT UNIQUE**
- id_producto **_(FK)_ ---VARCHAR(50)** --->que productos llegaron
- fecha_entrega **---DATE** --->que dia se hizo la entrega
- cantidad **---INT**---> cantidad del producto que llego al almacen
- id_repartidor **_(FK)_** --->quien lo entrego

### Entidad Repartidor

- id_repartidor **_(PK)_ ---INT AUTO INCREMENT UNIQUE**
- nombres **---VARCHAR(50)**
- apellidos **---VARCHAR(50)**
- dni **---INT UNIQUE**
- telefono **---INT UNIQUE**
- vehiculo **---VARCHAR(50)**---> que tipo ed vehiculo utilizo para la entrega

### Entidad Pedido

- id_pedido **_(PK)_ ---INT AUTO INCREMENT UNIQUE**
- id_personal **_(FK)_ ---INT** --->Encargado del pedido 
- id_cliente **_(FK)_ ---INT** --->Cliente que hizo el pedido
- descripcion **---VARCHAR(80)** --->descripcion del pedido si es necesario
- destino **---VARCHAR(80)** --->Lugar de destino, se puede tomar como direccion del cliente que hizo el pedido
- estado **---VARCHAR(15)** --->pendiente o entregado
- fecha **---DATE Y-m-d** --->fecha de efectuado el pedido
- hora **---TIME H-i-s** --->hora de efectuado el pedido
- opcion_pago **---VARCHAR(20)** --->boleta, efectivo, tarjeta

### Entidad DetallePedido

- id_detalle **_(PK)_---INT AUTO INCREMENT UNIQUE**
- id_pedido **_(FK)_---INT** ---> id del pedido al cual pertenecera los productos
- id_producto **_(FK)_---INT**  ---> productos pertenecientes del pedido hecho
- cantidad **---INT** ---> cantidad hecho del pedido del cual tambien se descontara del almacen
- subtotal **---DOUBLE(8,2)** --->precio de la cantidad comprada segun el precio del producto


### Vistas

### Vista PedidosAll
- Se recolectara todos los datos del pedido unico de un usuario para mostrar, con todos sus productos pedidos y el total a pagar y mas.

#### Vista Boleta
- se recolectara datos de las demas tablas para generar una boleta, con el total del costo y demas datos