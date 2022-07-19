# ecom
// THE SCHEME IS NAMED ecom_db




CREATE TABLE categories (
cat_id 		INT(11) NOT NULL AUTO_INCREMENT,
cat_title   VARCHAR(30) NOT NULL,
PRIMARY KEY(cat_id)
);
//========================================
INSERT INTO `ecom_db`.`categories` (`cat_title`) VALUES ('CAT1');
INSERT INTO `ecom_db`.`categories` (`cat_title`) VALUES ('CAT2');

//=======================================
CREATE TABLE products (
	product_id     			INT(11) NOT NULL AUTO_INCREMENT,
    product_title			VARCHAR(255) NOT NULL,			
    product_category_id		INT(11) NOT NULL,
    product_price			FLOAT(11) NOT NULL,
    product_description		TEXT NOT NULL,
	PRIMARY KEY(product_id)
);

ALTER TABLE products ADD product_image VARCHAR(255) NOT NULL AFTER product_description;



INSERT INTO `ecom_db`.`products` (`product_title`, `product_category_id`, `product_price`, `product_description`, `product_image`) VALUES ('product 1', '1', '24.99', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas malesuada vehicula est, sit amet sodales metus. Nunc lacinia lorem et dictum tempus. Suspendisse id varius mi. Donec at urna at magna blandit hendrerit sed et augue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed aliquam sagittis nisi. Sed bibendum massa ac justo semper, sit amet commodo', 'https://picsum.photos/300/150');

INSERT INTO `ecom_db`.`products` (`product_title`, `product_category_id`, `product_price`, `product_description`, `product_image`) VALUES ('product 2', '1', '24.99', 'Etiam vel odio ac quam pellentesque mattis. Donec pulvinar facilisis turpis gravida elementum. Curabitur ut hendrerit urna. Proin congue feugiat nisi, a imperdiet massa vulputate non. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in pretium lacus, sit amet tincidunt lectus. Phasellus id nisl lobortis, tristique tortor ut, pharetra purus.', 'https://picsum.photos/320/150');

UPDATE `ecom_db`.`products` SET `product_title` = 'product 1', `product_image` = 'https://picsum.photos/300/150' WHERE (`product_id` = '1');