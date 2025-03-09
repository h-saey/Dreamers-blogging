# Blogging Dreamers 🌟

A blogging platform to share your thoughts, ideas, and stories with the world!

## 📋 Features

- 📝 Create, edit, and delete blog posts
- 👥 User registration and login system
- 📅 Timestamp for each post
- 🔍 Admin panel for managing blogs, users, and contact messages

## 🗂 Database Structure

**Database Name:** `blogging_dreamers`

### 📄 Table: `blogposts`

```sql
CREATE TABLE blogposts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    author_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE CASCADE
);

📄 Table: users
sql
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
📄 Table: contact_messages
sql
CREATE TABLE contact_messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
📄 Table: comments
sql
CREATE TABLE comments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    post_id INT NOT NULL,
    user_id INT NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES blogposts(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);


## 🚀 Getting Started
1. Clone the repository:
git clone https://github.com/h-saey/Dreamers-blogging

markdown
Copy
Edit
2. Import the database (`blogging_dreamers.sql`) into **phpMyAdmin**.
3. Update the database connection in `config.php`.
4. Run the website on **XAMPP**.

## 🔧 Admin Panel Features
- **Add Blog:** Create new blog posts.
- **View Blogs:** See, delete, or view blog posts.
- **Manage Users:** View and delete users.
- **Contact Messages:** View and delete messages.

## 📚 Tech Stack
- **Frontend:** HTML, CSS, bootstrap CSS, JavaScript
- **Backend:** PHP, MySQL
- **Tools:** XAMPP, phpMyAdmin, Git

---

⭐ **Feel free to contribute and star this repository if you like it!** ⭐
```
