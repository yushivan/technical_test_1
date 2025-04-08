## 📘 Laravel Task API - Dokumentasi

### 🚀 Menjalankan Project Laravel

1. **Clone Repository**
   ```bash
   git clone https://github.com/yushivan/technical_test_1
   cd technical_test_1
   ```

2. **Install Dependency**
   ```bash
   composer install
   npm install && npm run dev
   ```

3. **Buat File `.env`**
   ```bash
   cp .env.example .env
   ```

4. **Atur Environment**
   Edit `.env` dan sesuaikan koneksi database:
   ```
   DB_DATABASE=namadb
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Generate Key & Jalankan Migration**
   ```bash
   php artisan key:generate
   php artisan migrate
   ```

6. **Jalankan Server**
   ```bash
   php artisan serve
   ```
   Website bisa diakses di: [http://localhost:8000](http://localhost:8000)

---

### 👥 Register dan Login via Website

1. Buka halaman [http://localhost:8000/register](http://localhost:8000/register)
2. Buat akun baru
3. Setelah itu login di [http://localhost:8000/login](http://localhost:8000/login)

---

### 🔐 Login via API

```http
POST /api/login
```

**Body:**
```json
{
  "email": "email@example.com",
  "password": "password"
}
```

**Response:**
```json
{
  "token": "your-api-token"
}
```

Simpan token ini, dan gunakan untuk semua permintaan API berikutnya di header:

```
Authorization: Bearer your-api-token
```

---

### ✅ API Endpoints

Semua route API berikut menggunakan prefix `/api` dan **wajib login** menggunakan token Sanctum.

#### 📄 GET /api/tasks

Menampilkan semua tugas milik user yang sedang login.

**Headers:**
```
Authorization: Bearer your-api-token
```

**Response:**
```json
[
  {
    "id": 1,
    "title": "Belajar Laravel",
    "description": "Mengerjakan dokumentasi",
    "due_date": "2025-04-10"
  },
  ...
]
```

---

#### ➕ POST /api/tasks

Membuat task baru.

**Headers:**
```
Authorization: Bearer your-api-token
```

**Body:**
```json
{
  "title": "Belajar Laravel",
  "description": "Bikin CRUD API",
  "due_date": "2025-04-12"
}
```

---

#### 🔍 GET /api/tasks/{id}

Melihat detail task berdasarkan ID.

---

#### ✏️ PUT /api/tasks/{id}

Mengedit task.

**Body:**
```json
{
  "title": "Update Judul",
  "description": "Update deskripsi",
  "due_date": "2025-04-15"
}
```

---

#### ❌ DELETE /api/tasks/{id}

Menghapus task berdasarkan ID.

---

### 🧪 Cara Test API dengan Postman / REST Client

1. **Login dengan POST `/api/login`**
2. **Copy token dari response**
3. **Set header:**
   ```
   Authorization: Bearer {token}
   ```
4. **Gunakan endpoint seperti GET `/api/tasks`**

---

### 💡 Tips

- Jika token kadaluarsa, lakukan login ulang untuk mendapatkan token baru.
- Untuk register pengguna baru, gunakan form di website karena tidak disediakan endpoint API register.

