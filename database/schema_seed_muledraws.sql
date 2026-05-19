-- Combined schema and seed data for Muledraws
-- Run this file to create tables and seed homepage/admin data.

SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `setting_profile_business`;
CREATE TABLE `setting_profile_business` (
  `id` int unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(64) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `setting_profile_business_socmed`;
CREATE TABLE `setting_profile_business_socmed` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` int unsigned NOT NULL,
  `name` varchar(128) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_id` (`profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `setting_profile_business_account`;
CREATE TABLE `setting_profile_business_account` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` int unsigned NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `account_number` varchar(128) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_id` (`profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `setting_users`;
CREATE TABLE `setting_users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_logged_in` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `master_awwards`;
CREATE TABLE `master_awwards` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `master_carousels`;
CREATE TABLE `master_carousels` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `master_clients`;
CREATE TABLE `master_clients` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `master_features`;
CREATE TABLE `master_features` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `master_works`;
CREATE TABLE `master_works` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS `master_works_detail`;
CREATE TABLE `master_works_detail` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `artwork_id` int unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `artwork_id` (`artwork_id`),
  CONSTRAINT `fk_master_works_detail_artwork` FOREIGN KEY (`artwork_id`) REFERENCES `master_works` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `setting_profile_business` (`id`, `name`, `email`, `phone`, `address`, `logo`, `status`) VALUES
  (0, 'Muledraws', 'info@muledraws.com', '+62 94892305123', NULL, 'default.png', 1);

INSERT INTO `setting_profile_business_socmed` (`profile_id`, `name`, `url`) VALUES
  (1, 'Instagram', 'https://www.instagram.com/muledraws'),
  (1, 'Dribbble', 'https://dribbble.com/muledraws'),
  (1, 'Behance', 'https://www.behance.net/muledraws');

INSERT INTO `setting_users` (`name`, `username`, `password`, `status`) VALUES
  ('Gunali Rezqi Mauludi', 'gunalirezqi', 'e10adc3949ba59abbe56e057f20f883e', 1),
  ('Muledraws', 'muledraws', 'c8837b23ff8aaa8a2dde915473ce0991', 1);

INSERT INTO `master_carousels` (`description`, `image`, `status`) VALUES
  ('Slide 1', 'carousel-01.jpg', 1),
  ('Slide 2', 'carousel-02.jpg', 1),
  ('Slide 3', 'carousel-01.jpg', 1);

INSERT INTO `master_clients` (`name`, `status`) VALUES
  ('The Guardian', 1),
  ('Pepsi', 1),
  ('USPS', 1),
  ('Blink 182', 1),
  ('Pabs Blue Ribbon', 1),
  ('Der Spiegel/Speigel Wissen', 1),
  ('Sony Music Entertainment', 1),
  ('Jim Beam', 1),
  ('The Economist', 1),
  ('Columbia Records', 1),
  ('Captain Morgan', 1),
  ('Pearl Jam', 1),
  ('Suddeutsche Zeitung', 1),
  ('Sports Illustrated', 1),
  ('San Diego State University', 1);

INSERT INTO `master_awwards` (`name`, `status`) VALUES
  ('Awwards', 1),
  ('Americal Illustration 37 Winner', 1),
  ('Red Dot Award', 1),
  ('German Design Award', 1),
  ('Illustrative Nominee', 1),
  ('British Book Design Award', 1),
  ('ADC Student Of The Year', 1),
  ('ADC Gold', 1),
  ('ADC Silver', 1),
  ('ADC Bronze', 1),
  ('ADC Audience Award', 1),
  ('ADC *E Nominee', 1),
  ('Annual Multimedia Award', 1);

INSERT INTO `master_features` (`name`, `status`) VALUES
  ('Juxtapoz', 1),
  ('Supersonic Art', 1),
  ('Novum Magazine', 1),
  ('Wired Magazine', 1),
  ('Keenley', 1),
  ('Beelerose', 1),
  ('Fonts In Use', 1);

INSERT INTO `master_works` (`id`, `name`, `description`, `image`, `status`) VALUES
  (1, 'Work 01', 'Creative direction, illustration, and branding system for a global publishing house.', '01hero.jpg', 1),
  (2, 'Work 02', 'Contemporary visual design and bespoke packaging system designed for premium coffee brand.', '02hero.jpg', 1),
  (3, 'Work 03', 'Editorial cover design and custom typography for a leading European design magazine.', '03hero.jpg', 1),
  (4, 'Work 04', 'Branding and identity design for a contemporary contemporary art exhibition.', '04hero.jpg', 1),
  (5, 'Work 05', 'Promotional illustration and layout design for live contemporary music tour.', '05hero.jpg', 1),
  (6, 'Work 06', 'Minimalist poster art and conceptual illustration series celebrating modernist architecture.', '06hero.jpg', 1),
  (7, 'Work 07', 'Packaging design, typographic layout and photography art direction for craft brewery.', '07hero.jpg', 1),
  (8, 'Work 08', 'Visual storytelling and editorial illustrations for a special feature about modern technology.', '08hero.jpg', 1),
  (9, 'Work 09', 'Bespoke illustrations and UI design system for a creative art agency.', '09hero.jpg', 1),
  (10, 'Work 10', 'Brand design and custom geometric patterns for an indie apparel brand.', '10hero.jpg', 1),
  (11, 'Work 11', 'Limited edition silk screen posters and identity for a local independent film festival.', '11hero.jpg', 1),
  (12, 'Work 12', 'Typography guidelines, identity design and logo assets for a tech startup.', '12hero.jpg', 1);

INSERT INTO `master_works_detail` (`artwork_id`, `name`, `image`, `status`) VALUES
  (1, 'Hero Showcase', '01hero.jpg', 1),
  (1, 'Typography Details', '02hero.jpg', 1),
  (2, 'Bottle Packaging Showcase', '02hero.jpg', 1),
  (2, 'Logo Application Detail', '03hero.jpg', 1),
  (2, 'Box Packaging Concept', '04hero.jpg', 1),
  (3, 'Magazine Cover Close-up', '03hero.jpg', 1),
  (3, 'Grid Layout Specs', '04hero.jpg', 1),
  (4, 'Exhibition Room Mockup', '04hero.jpg', 1),
  (4, 'Banner Close-up', '05hero.jpg', 1),
  (5, 'Band Merch Close-up', '05hero.jpg', 1),
  (5, 'Vector Line Art Details', '06hero.jpg', 1),
  (6, 'Poster Print Details', '06hero.jpg', 1),
  (6, 'Color Palette Swatches', '07hero.jpg', 1),
  (7, 'Label Design Close-up', '07hero.jpg', 1),
  (7, 'Glass Print Details', '08hero.jpg', 1),
  (8, 'Digital Illustration Zoom', '08hero.jpg', 1),
  (8, 'Sketch Stage', '09hero.jpg', 1),
  (9, 'Interface Mockup Details', '09hero.jpg', 1),
  (9, 'Icon Set Design', '10hero.jpg', 1),
  (10, 'Fabric Print Pattern Zoom', '10hero.jpg', 1),
  (10, 'Tag Design Specs', '11hero.jpg', 1),
  (11, 'Screen Print Texture Close-up', '11hero.jpg', 1),
  (11, 'Lobby Poster Placement', '12hero.jpg', 1),
  (12, 'Brand Assets Overview', '12hero.jpg', 1),
  (12, 'Alternative Logo Versions', '01hero.jpg', 1);

SET FOREIGN_KEY_CHECKS = 1;
