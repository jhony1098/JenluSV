CREATE DATABASE IF NOT EXISTS jenlu_sv CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE jenlu_sv;

CREATE TABLE admins (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(60) NOT NULL UNIQUE,
  password_hash VARCHAR(255) NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

INSERT INTO admins (username, password_hash)
SELECT 'admin', '$2y$10$qG32DXAfALYYlJIt.Z7FceM6UvV78kYprQKYKkhpnHDGasnoHgmBW'
WHERE NOT EXISTS (SELECT 1 FROM admins WHERE username = 'admin');

CREATE TABLE categories (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(80) NOT NULL,
  slug VARCHAR(80) NOT NULL UNIQUE
) ENGINE=InnoDB;

CREATE TABLE products (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  category_id INT UNSIGNED NOT NULL,
  name VARCHAR(120) NOT NULL,
  description TEXT NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  is_active TINYINT(1) NOT NULL DEFAULT 1,
  featured TINYINT(1) NOT NULL DEFAULT 0,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_products_category FOREIGN KEY (category_id) REFERENCES categories(id)
) ENGINE=InnoDB;

CREATE TABLE product_images (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product_id INT UNSIGNED NOT NULL,
  image_url VARCHAR(500) NOT NULL,
  label VARCHAR(100) DEFAULT NULL,
  position TINYINT UNSIGNED NOT NULL DEFAULT 1,
  CONSTRAINT fk_images_product FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE product_reviews (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product_id INT UNSIGNED NOT NULL,
  customer_name VARCHAR(80) NOT NULL,
  rating TINYINT UNSIGNED NOT NULL,
  comment VARCHAR(500) NOT NULL,
  is_visible TINYINT(1) NOT NULL DEFAULT 1,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_reviews_product FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE orders (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  customer_name VARCHAR(120) NOT NULL,
  customer_phone VARCHAR(30) NOT NULL,
  delivery_address VARCHAR(255) NOT NULL,
  notes TEXT DEFAULT NULL,
  total DECIMAL(10,2) NOT NULL,
  status ENUM('nuevo','confirmado','en_preparacion','entregado','cancelado') NOT NULL DEFAULT 'nuevo',
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

CREATE TABLE order_items (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  order_id INT UNSIGNED NOT NULL,
  product_id INT UNSIGNED NOT NULL,
  product_name VARCHAR(120) NOT NULL,
  unit_price DECIMAL(10,2) NOT NULL,
  quantity SMALLINT UNSIGNED NOT NULL,
  CONSTRAINT fk_order_items_order FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
  CONSTRAINT fk_order_items_product FOREIGN KEY (product_id) REFERENCES products(id)
) ENGINE=InnoDB;

INSERT INTO categories (name, slug) VALUES
('Damas', 'damas'), ('Caballeros', 'caballeros'), ('San Valentín', 'san-valentin'),
('Día de las Madres', 'madres'), ('Día del Padre', 'padres'),
('Fechas especiales', 'fechas-especiales'), ('Personalizables', 'personalizables');

INSERT INTO products (category_id, name, description, price, featured) VALUES
(7, 'Caja a tu manera', 'Fresas cubiertas de chocolate y macarons, armada con lo que tú elijas.', 38.00, 1),
(1, 'Ramo abril', 'Ramo de tonos suaves para consentir a alguien especial.', 46.00, 1),
(6, 'Dulce abrazo', 'Selección de fresas, flores y detalles dulces para cualquier ocasión.', 32.00, 1),
(3, 'Jardín en rosa', 'Rosas frescas presentadas en una caja de regalo, ideal para el amor.', 54.00, 1),
(2, 'Set caballero', 'Chocolates finos y un detalle clásico pensado para él.', 42.00, 0),
(4, 'Ternura para mamá', 'Un arreglo floral con dedicatoria, pensado para decir gracias.', 48.00, 0),
(5, 'Fuerza y gratitud', 'Combo de dulces y un detalle robusto para celebrar a papá.', 44.00, 0);

INSERT INTO product_images (product_id, image_url, label, position) VALUES
(1, 'https://images.unsplash.com/photo-1563729784474-d77dbb933a9e?auto=format&fit=crop&w=1000&q=80', 'Vista frontal', 1),
(1, 'https://images.unsplash.com/photo-1571115177098-24ec42ed204d?auto=format&fit=crop&w=1000&q=80', 'Detalle de fresas', 2),
(2, 'https://images.unsplash.com/photo-1523438885200-e635ba2c371e?auto=format&fit=crop&w=1000&q=80', 'Ramo completo', 1),
(2, 'https://images.unsplash.com/photo-1518895949257-7621c3c786d7?auto=format&fit=crop&w=1000&q=80', 'Vista superior', 2),
(3, 'https://images.unsplash.com/photo-1562440499-64c9a111f713?auto=format&fit=crop&w=1000&q=80', 'Set completo', 1),
(4, 'https://images.unsplash.com/photo-1490750967868-88aa4486c946?auto=format&fit=crop&w=1000&q=80', 'Vista frontal', 1),
(4, 'https://images.unsplash.com/photo-1518709268805-4e9042af2176?auto=format&fit=crop&w=1000&q=80', 'Rosas de cerca', 2),
(5, 'https://images.unsplash.com/photo-1563729784474-d77dbb933a9e?auto=format&fit=crop&w=1000&q=80', 'Vista frontal', 1),
(6, 'https://images.unsplash.com/photo-1523438885200-e635ba2c371e?auto=format&fit=crop&w=1000&q=80', 'Ramo completo', 1),
(7, 'https://images.unsplash.com/photo-1562440499-64c9a111f713?auto=format&fit=crop&w=1000&q=80', 'Set completo', 1);
