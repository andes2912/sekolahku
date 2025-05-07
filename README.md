# Fork of [Sekolahku](https://github.com/andes2912/sekolahku) App

**Sekolahku** is a web-based School Management Information System (SMIS) built with the [Laravel](https://github.com/laravel/laravel) framework.

## 🚩Getting Started

This project is dedicated to enhancing education through technology, focusing on delivering an intuitive and user-friendly experience. While many similar applications exist, Sekolahku aims to stand out by prioritizing superior and modern UI/UX design.

Most features are currently under development by the initial developer. However, contributions from other developers are highly encouraged to advance open-source educational technology (Ed-Tech) in Indonesia.

## 🚀 Features

* **Role-Based User Management**: Manage users based on their roles and positions within the school.
* **School Website**: A public-facing website to showcase school information and updates.
* **Student Admission (PPDB)**: Online student registration and admission process.
* **Library Management**: Organize and manage the school's library resources.
* **Tuition Payment System (SPP)**: Handle student tuition payments efficiently.
* **Alumni Management**: Maintain records and facilitate communication with alumni.

## 🛠️ Requirements

To set up and run Sekolahku, ensure your system meets the following requirements:

* **PHP**: Version 7.4 or higher
* [**Laravel**](https://laravel.com): Version 9
* [**Node.js**](https://nodejs.org/en/download): Version 7
* [**Composer**](https://getcomposer.org/download): Dependency management for PHP
* **MySQL**: Database management system

## 💉 Installation

Follow these steps to install and run Sekolahku on your local machine:

1. **Clone the Repository**

   ```bash
   git clone https://github.com/alarwasyi98/sekolahku.git
   ```

   Otherwise, you can clone from the original repo

   ```bash
   git clone https://github.com/andes2912/sekolahku.git
   ```

2. **Install PHP Dependencies**

   ```bash
   composer install
   ```

3. **Install Node.js Dependencies**

   ```bash
   npm install
   ```

4. **Copy the Environment File**

   ```bash
   cp .env.example .env
   ```

5. **Generate Application Key**

   ```bash
   php artisan key:generate
   ```

6. **Configure Environment Variables**

   Update the `.env` file with your database credentials and other necessary configurations.

7. **Run Migrations and Seeders**

   ```bash
   php artisan migrate && php artisan db:seed
   # or
   php artisan migrate --seed
   ```

8. **Create Storage Link**

   ```bash
   php artisan storage:link
   ```

9. **Compile Assets**

   ```bash
   npm run dev
   ```

10. **Start the Development Server**

    ```bash
    php artisan serve
    ```

    Access the application at `http://localhost:8000`.

## 🛳️ Usage

Login as Admin with this credential

```text
User: kepsek@sch.id
Password: Bismillah
```

Login as other user

```text
User: [ppdb, Perpustakaan, Staf, Bendahara, Pengajar]@sch.id
Password: 12345678
```

## 🎨 Miscellaneous

[IndoBank](https://github.com/andes2912/indobank) Laravel packages to store Indonesia's Banks Name

> [!NOTE]
> This app will be actively developed. Feel free to reach out thr developer for more details. [andridesmana29@outlook.com](mailto:andridesmana29@outlook.com)

## 🤝 Contributing

Contributions are welcome! If you're interested in improving Sekolahku, please fork the repository and submit a pull request. Together, we can enhance educational technology in Indonesia.

## 📄 License

This project is open-source and available under the [MIT License](https://opensource.org/licenses/MIT)
