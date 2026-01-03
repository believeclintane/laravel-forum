## Features

### Core Forum Functionality
- User registration and authentication
- Create discussion posts (topics)
- View all discussion posts
- View individual post pages
- Comment on discussion posts
- Comments displayed in chronological order
- Posts and comments linked to authenticated users

### Access Control
- Only authenticated users can create posts
- Only authenticated users can comment
- Guest users can browse posts and comments
- Users can manage their own content (where implemented)

### User Experience
- Simple and clean forum layout
- Server-side validation for posts and comments
- Success and error feedback messages
- Pagination for posts and/or comments (if enabled)

### Backend & Architecture
- Laravel MVC architecture
- Database migrations for users, posts, and comments
- Database seeders for test users and sample data
- Faker used for generating realistic dummy content
- Environment-based configuration using `.env`

### Development Tooling
- Composer for PHP dependency management
- Vite for frontend asset bundling (if enabled)
- Git version control with a clean commit history
