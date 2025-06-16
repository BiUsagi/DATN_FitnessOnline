# Fitness Online

**Dự Án Tốt Nghiệp - Nền tảng tập luyện thể thao trực tuyến**

---

## 👥 Thành viên nhóm

-   Nguyễn Phước Luân
-   Trương Bá Sơn
-   Lương Tiến Đạt
-   Phan Hữu Chiến
-   Hoàn Minh Tuấn
-   Nguyễn Thanh Rin

---

## 🚀 Giới thiệu

**Fitness Online** là nền tảng web hỗ trợ người dùng tập luyện thể thao trực tuyến, cung cấp các khóa học, hướng dẫn tập luyện và quản lý sức khỏe mọi lúc, mọi nơi.

---

## 🌟 Tính năng nổi bật

-   Đăng ký, đăng nhập và quản lý tài khoản người dùng
-   Xem và đăng ký các khóa học tập luyện trực tuyến
-   Theo dõi tiến trình tập luyện cá nhân
-   Quản lý bài tập, lịch tập, huấn luyện viên
-   Tích hợp trình soạn thảo văn bản (CKEditor, TinyMCE) cho nội dung động
-   Hệ thống phân quyền: quản trị viên và người dùng
-   Giao diện thân thiện, tối ưu cho cả máy tính và thiết bị di động

---

## 🛠️ Công nghệ sử dụng

-   **Backend:** Laravel PHP Framework
-   **Frontend:** Blade Template, HTML5, CSS3, JavaScript, Bootstrap
-   **Database:** MySQL
-   **WYSIWYG Editors:** CKEditor 4, TinyMCE
-   **Khác:** Vite, Composer, npm

---

## ⚙️ Hướng dẫn cài đặt

### Yêu cầu hệ thống

-   PHP >= 8.0
-   Composer
-   Node.js & npm
-   MySQL/MariaDB

### Các bước cài đặt

1. **Clone dự án**

    ```sh
    git clone <repository-url>
    cd DATN_FitnessOnline
    ```

2. **Cài đặt các package PHP**

    ```sh
    composer install
    ```

3. **Cài đặt các package JS**

    ```sh
    npm install
    ```

4. **Cấu hình môi trường**

    - Sao chép file `.env.example` thành `.env` và cập nhật thông tin kết nối database, mail, v.v.

5. **Tạo key ứng dụng**

    ```sh
    php artisan key:generate
    ```

6. **Chạy migrate và seed dữ liệu**

    - Vào thư mục `database/migrations`
    - Xóa file permission (nếu có)
    - Chạy:
        ```sh
        php artisan migrate
        ```
    - Khôi phục lại file permission (nếu cần)
    - Chạy lại migrate nếu cần

7. **Build frontend**

    ```sh
    npm run build
    ```

8. **Khởi động server**

    ```sh
    php artisan serve
    ```

9. **Truy cập ứng dụng:**  
   [http://localhost:8000](http://localhost:8000)

---

## 📁 Cấu trúc thư mục quan trọng

| Thư mục            | Mô tả                                   |
| ------------------ | --------------------------------------- |
| `app/`             | Mã nguồn backend Laravel                |
| `resources/views/` | Giao diện Blade                         |
| `public/assets/`   | Tài nguyên tĩnh (ảnh, JS, CSS, plugins) |
| `routes/`          | Định nghĩa route                        |
| `config/`          | Cấu hình hệ thống                       |

---

## 🤝 Đóng góp

Mọi đóng góp đều được hoan nghênh!  
Vui lòng tạo pull request hoặc liên hệ trực tiếp để thảo luận thêm.

---

## 📄 Giấy phép

Dự án sử dụng các thành phần mã nguồn mở như CKEditor, TinyMCE, tuân thủ giấy phép của từng thành phần.  
Vui lòng xem chi tiết trong thư mục `public/assets/backend/plugins/` và `public/assets/backend/vendor/`.

---

> **Fitness Online** - Giải pháp tập luyện thể thao trực tuyến cho mọi người.

---

> Dự án phục vụ mục đích học tập, demo ASM môn học. Mọi dữ liệu chỉ là minh họa.
