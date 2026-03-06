INSERT INTO plans (slug, name, price_monthly, monthly_conversions, max_file_mb, batch_conversion, api_access, created_at)
VALUES
('free', 'Free', 0, 25, 25, 0, 0, NOW()),
('pro', 'Pro', 19, 1000, 250, 1, 1, NOW()),
('agency', 'Agency', 79, 10000, 1024, 1, 1, NOW());
