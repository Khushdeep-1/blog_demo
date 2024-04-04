-- Create database
CREATE DATABASE IF NOT EXISTS blog_demo;
USE blog_demo;

-- Table for blog posts
CREATE TABLE IF NOT EXISTS posts (
    post_id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table for comments
CREATE TABLE IF NOT EXISTS comments (
    comment_id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT,
    commenter_name VARCHAR(100) NOT NULL,
    comment_content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES posts(post_id) ON DELETE CASCADE
);



-- Sample data
-- Insert sample data into posts table
INSERT INTO posts (title, content) VALUES 
('First Post', 'This is the content of the first blog post.'),
('Second Post', 'This is the content of the second blog post.'),
('Third Post', 'This is the content of the third blog post.');

-- Insert sample data into comments table
INSERT INTO comments (post_id, commenter_name, comment_content) VALUES 
(1, 'John', 'Nice post!'),
(1, 'Alice', 'Great job, keep it up!'),
(2, 'Bob', 'Interesting topic. I enjoyed reading this post.'),
(3, 'Emma', 'I found this post very informative.'),
(3, 'Mike', 'Thanks for sharing your insights.');
