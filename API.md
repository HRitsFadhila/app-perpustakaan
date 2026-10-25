# Dokumentasi API — Aplikasi Perpustakaan

> Dokumentasi endpoint API yang dibangun pada pertemuan perkuliahan.
> Total endpoint yang tercakup: **11 endpoint** — Books, Members, Loans, dan Stats.

**Base URL:** `http://localhost:8000/api`

---

## Tabel Endpoint

| Method | URL | Body (jika ada) | Contoh Response |
|---|---|---|---|
| GET | `/api/books` | - | **200** — `{ "data": [...], "links": { ... }, "meta": { ... } }` |
| GET | `/api/books/{id}` | - | **200** — `{ ...book... }` / **404** — `{ "message": "..." }` |
| POST | `/api/books` | `{ "judul": "...", "penulis": "...", "penerbit": "...", "tahun_terbit": ..., "isbn": "...", "stok": ..., "category_id": ... }` | **201** — `{ ...book... }` / **422** — `{ "message": "...", "errors": { ... } }` |
| PUT | `/api/books/{id}` | `{ "judul": "...", "penulis": "...", "penerbit": "...", "tahun_terbit": ..., "isbn": "...", "stok": ..., "category_id": ... }` | **200** — `{ ...book... }` / **422** — `{ "message": "...", "errors": { ... } }` / **404** — `{ "message": "..." }` |
| DELETE | `/api/books/{id}` | - | **200** — `{ "message": "Buku berhasil dihapus." }` / **404** — `{ "message": "..." }` |
| GET | `/api/members` | - | **200** — `{ "data": [...], "links": { ... }, "meta": { ... } }` |
| GET | `/api/members/{id}` | - | **200** — `{ ...member... }` / **404** — `{ "message": "..." }` |
| GET | `/api/loans` | - | **200** — `{ "data": [...], "links": { ... }, "meta": { ... } }` |
| POST | `/api/loans` | `{ "member_id": ..., "user_id": ..., "tanggal_pinjam": "...", "tanggal_kembali": "...", "book_ids": [...] }` | **201** — `{ ...loan... }` / **422** — `{ "message": "...", "errors": { ... } }` |
| PUT | `/api/loans/{id}/kembalikan` | - | **200** — `{ ...loan... }` / **404** — `{ "message": "..." }` |
| GET | `/api/stats` | - | **200** — `{ "total_buku": ..., "total_anggota": ..., "peminjaman_aktif": ... }` |

---

## Detail Endpoint

### Books

#### 1. GET /api/books

- **Method:** GET
- **URL:** `/api/books`
- **Body:** -
- **Status code sukses:** **200**
- **Contoh response:**

```json
{
  "data": [
    {
      "id": 1,
      "judul": "Clean Code",
      "penulis": "Robert C. Martin",
      "penerbit": "Prentice Hall",
      "tahun_terbit": 2008,
      "isbn": "9780132350884",
      "stok": 3,
      "sampul": null,
      "category": {
        "id": 1,
        "nama_kategori": "Pemrograman"
      },
      "created_at": "2026-10-25T08:30:00.000000Z",
      "updated_at": "2026-10-25T08:30:00.000000Z"
    }
  ],
  "links": {
    "first": "http://localhost:8000/api/books?page=1",
    "last": "http://localhost:8000/api/books?page=1"
  },
  "meta": {
    "current_page": 1,
    "data": 1,
    "per_page": 10,
    "total": 1
  }
}
```

#### 2. GET /api/books/{id}

- **Method:** GET
- **URL:** `/api/books/{id}`
- **Body:** -
- **Status code sukses:** **200**
- **Status code gagal:** **404** (buku tidak ditemukan)
- **Contoh response sukses (200):**

```json
{
  "id": 1,
  "judul": "Clean Code",
  "penulis": "Robert C. Martin",
  "penerbit": "Prentice Hall",
  "tahun_terbit": 2008,
  "isbn": "9780132350884",
  "stok": 3,
  "sampul": null,
  "category": {
    "id": 1,
    "nama_kategori": "Pemrograman"
  },
  "created_at": "2026-10-25T08:30:00.000000Z",
  "updated_at": "2026-10-25T08:30:00.000000Z"
}
```

- **Contoh response gagal (404):**

```json
{
  "message": "No query results for model [App\\Models\\Book] with key [id] (id: 999)"
}
```

#### 3. POST /api/books

- **Method:** POST
- **URL:** `/api/books`
- **Body:** Ada (form request `StoreBookRequest`)
- **Status code sukses:** **201**
- **Status code gagal:** **422** (validasi gagal)
- **Body (request):**

```json
{
  "judul": "Clean Code",
  "penulis": "Robert C. Martin",
  "penerbit": "Prentice Hall",
  "tahun_terbit": 2008,
  "isbn": "9780132350884",
  "stok": 3,
  "category_id": 1
}
```

- **Contoh response sukses (201):**

```json
{
  "id": 1,
  "judul": "Clean Code",
  "penulis": "Robert C. Martin",
  "penerbit": "Prentice Hall",
  "tahun_terbit": 2008,
  "isbn": "9780132350884",
  "stok": 3,
  "sampul": null,
  "category": {
    "id": 1,
    "nama_kategori": "Pemrograman"
  },
  "created_at": "2026-10-25T08:30:00.000000Z",
  "updated_at": "2026-10-25T08:30:00.000000Z"
}
```

- **Contoh response gagal (422):**

```json
{
  "message": "The judul field is required.",
  "errors": {
    "judul": [
      "Judul buku wajib diisi."
    ]
  }
}
```

#### 4. PUT /api/books/{id}

- **Method:** PUT
- **URL:** `/api/books/{id}`
- **Body:** Ada (validasi manual di controller)
- **Status code sukses:** **200**
- **Status code gagal:** **422** (validasi gagal) / **404** (buku tidak ditemukan)
- **Body (request):** sama field dengan `POST /api/books` (judul, penulis, penerbit, tahun_terbit, isbn, stok, category_id)

- **Contoh response sukses (200):**

```json
{
  "id": 1,
  "judul": "Clean Code",
  "penulis": "Robert C. Martin",
  "penerbit": "Prentice Hall",
  "tahun_terbit": 2008,
  "isbn": "9780132350884",
  "stok": 3,
  "sampul": null,
  "category": {
    "id": 1,
    "nama_kategori": "Pemrograman"
  },
  "created_at": "2026-10-25T08:30:00.000000Z",
  "updated_at": "2026-10-25T08:30:00.000000Z"
}
```

- **Contoh response gagal (422):**

```json
{
  "message": "The stok field must be an integer.",
  "errors": {
    "stok": [
      "Stok harus berupa angka."
    ]
  }
}
```

### Members

#### 1. GET /api/members

- **Method:** GET
- **URL:** `/api/members`
- **Body:** -
- **Status code sukses:** **200**
- **Contoh response:**

```json
{
  "data": [
    {
      "id": 1,
      "nama": "Budi Santoso",
      "nim": "20230001",
      "email": "budi@example.com",
      "nomor_telepon": "081234567890",
      "alamat": "Jl. Melati No. 12",
      "status": "aktif",
      "created_at": "2026-10-25T08:30:00.000000Z",
      "updated_at": "2026-10-25T08:30:00.000000Z"
    }
  ],
  "links": {
    "first": "http://localhost:8000/api/members?page=1",
    "last": "http://localhost:8000/api/members?page=1"
  },
  "meta": {
    "current_page": 1,
    "data": 1,
    "per_page": 10,
    "total": 1
  }
}
```

#### 2. GET /api/members/{id}

- **Method:** GET
- **URL:** `/api/members/{id}`
- **Body:** -
- **Status code sukses:** **200**
- **Status code gagal:** **404** (anggota tidak ditemukan)
- **Contoh response sukses (200):**

```json
{
  "id": 1,
  "nama": "Budi Santoso",
  "nim": "20230001",
  "email": "budi@example.com",
  "nomor_telepon": "081234567890",
  "alamat": "Jl. Melati No. 12",
  "status": "aktif",
  "created_at": "2026-10-25T08:30:00.000000Z",
  "updated_at": "2026-10-25T08:30:00.000000Z"
}
```

- **Contoh response gagal (404):**

```json
{
  "message": "No query results for model [App\\Models\\Member] with key [id] (id: 999)"
}
```

### Loans

#### 1. GET /api/loans

- **Method:** GET
- **URL:** `/api/loans`
- **Body:** -
- **Status code sukses:** **200**
- **Contoh response:**

```json
{
  "data": [
    {
      "id": 1,
      "member": {
        "id": 1,
        "nama": "Budi Santoso"
      },
      "petugas": {
        "id": 1,
        "name": "Admin Perpustakaan"
      },
      "tanggal_pinjam": "2026-10-25",
      "tanggal_kembali": "2026-11-08",
      "tanggal_dikembalikan": null,
      "status": "dipinjam",
      "books": [
        {
          "id": 1,
          "judul": "Clean Code"
        }
      ]
    }
  ],
  "links": {
    "first": "http://localhost:8000/api/loans?page=1",
    "last": "http://localhost:8000/api/loans?page=1"
  },
  "meta": {
    "current_page": 1,
    "data": 1,
    "per_page": 10,
    "total": 1
  }
}
```

#### 2. POST /api/loans

- **Method:** POST
- **URL:** `/api/loans`
- **Body:** Ada (validasi di controller)
- **Status code sukses:** **201**
- **Status code gagal:** **422** (validasi gagal)
- **Body (request):**

```json
{
  "member_id": 1,
  "user_id": 1,
  "tanggal_pinjam": "2026-10-25",
  "tanggal_kembali": "2026-11-08",
  "book_ids": [1, 2]
}
```

- **Contoh response sukses (201):**

```json
{
  "id": 1,
  "member": {
    "id": 1,
    "nama": "Budi Santoso"
  },
  "petugas": {
    "id": 1,
    "name": "Admin Perpustakaan"
  },
  "tanggal_pinjam": "2026-10-25",
  "tanggal_kembali": "2026-11-08",
  "tanggal_dikembalikan": null,
  "status": "dipinjam",
  "books": [
    {
      "id": 1,
      "judul": "Clean Code"
    }
  ]
}
```

- **Contoh response gagal (422):**

```json
{
  "message": "The tanggal_kembali field is required.",
  "errors": {
    "tanggal_kembali": [
      "Tanggal kembali wajib diisi."
    ]
  }
}
```

#### 3. PUT /api/loans/{id}/kembalikan

- **Method:** PUT
- **URL:** `/api/loans/{id}/kembalikan`
- **Body:** -
- **Status code sukses:** **200**
- **Status code gagal:** **404** (peminjaman tidak ditemukan)
- **Contoh response sukses (200):**

```json
{
  "id": 1,
  "member": {
    "id": 1,
    "nama": "Budi Santoso"
  },
  "petugas": {
    "id": 1,
    "name": "Admin Perpustakaan"
  },
  "tanggal_pinjam": "2026-10-25",
  "tanggal_kembali": "2026-11-08",
  "tanggal_dikembalikan": "2026-11-08",
  "status": "dikembalikan",
  "books": [
    {
      "id": 1,
      "judul": "Clean Code"
    }
  ]
}
```

- **Contoh response gagal (404):**

```json
{
  "message": "No query results for model [App\\Models\\Loan] with key [id] (id: 999)"
}
```

### Stats

#### GET /api/stats

- **Method:** GET
- **URL:** `/api/stats`
- **Body:** -
- **Status code sukses:** **200**
- **Contoh response:**

```json
{
  "total_buku": 12,
  "total_anggota": 5,
  "peminjaman_aktif": 2
}
```

---

## Catatan

- Contoh response di atas mengikuti struktur serializer (`BookResource`, `MemberResource`, `LoanResource`) dan controller yang ada; nilainya bersifat contoh dan sebaiknya disesuaikan dengan hasil **copy-paste dari Postman** saat dokumentasi diperiksa.
- Status code **422** dihasilkan oleh Laravel ketika validasi gagal (misal `POST /api/books` dengan data tidak valid, atau `POST /api/loans` dengan tanggal kembali sebelum tanggal pinjam).
- Endpoint `PUT /api/books/{id}` dan `DELETE /api/books/{id}` mengembalikan **404** jika data tidak ditemukan.
