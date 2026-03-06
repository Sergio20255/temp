CREATE TABLE users (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL,
  email VARCHAR(190) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role ENUM('admin','user') DEFAULT 'user',
  plan_id BIGINT UNSIGNED NULL,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE files (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id BIGINT UNSIGNED NULL,
  original_name VARCHAR(255) NOT NULL,
  mime_type VARCHAR(120) NOT NULL,
  size_bytes BIGINT UNSIGNED NOT NULL,
  path VARCHAR(255) NOT NULL,
  scan_status ENUM('pending','clean','blocked') DEFAULT 'pending',
  created_at TIMESTAMP NULL,
  INDEX idx_files_user_id (user_id)
);

CREATE TABLE conversions (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id BIGINT UNSIGNED NULL,
  file_id BIGINT UNSIGNED NULL,
  from_format VARCHAR(20) NOT NULL,
  to_format VARCHAR(20) NOT NULL,
  status ENUM('queued','processing','completed','failed') DEFAULT 'queued',
  output_path VARCHAR(255) NULL,
  error_message TEXT NULL,
  created_at TIMESTAMP NULL,
  completed_at TIMESTAMP NULL,
  INDEX idx_conversions_user_id (user_id),
  INDEX idx_conversions_status (status)
);

CREATE TABLE plans (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  slug VARCHAR(80) UNIQUE NOT NULL,
  name VARCHAR(120) NOT NULL,
  price_monthly DECIMAL(10,2) DEFAULT 0,
  monthly_conversions INT DEFAULT 0,
  max_file_mb INT DEFAULT 25,
  batch_conversion TINYINT(1) DEFAULT 0,
  api_access TINYINT(1) DEFAULT 0,
  created_at TIMESTAMP NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE settings (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `key` VARCHAR(190) UNIQUE NOT NULL,
  `value` TEXT NULL,
  updated_at TIMESTAMP NULL
);

CREATE TABLE logs (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  level VARCHAR(20) NOT NULL,
  message TEXT NOT NULL,
  context JSON NULL,
  created_at TIMESTAMP NULL
);
