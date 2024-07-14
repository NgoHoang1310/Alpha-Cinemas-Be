# Sử dụng hình ảnh PHP chính thức
FROM arm64v8/php:7.4-apache

# Cài đặt các phần mở rộng PHP cần thiết (nếu có)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Sao chép mã nguồn của bạn vào thư mục web của Apache
COPY . /var/www/html/

# Cấp quyền cho thư mục web
RUN chown -R www-data:www-data /var/www/html

# Mở cổng 80 để truy cập web
EXPOSE 80