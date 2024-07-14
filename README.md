# Twitter Clone

This project is a Twitter clone built using Laravel. The application allows users to sign up, sign in, post tweets with text, images, or videos, view their posts, retweet, like other users' posts, and edit their profiles. Users can also follow other users, view tweets on their home feed, access a dashboard, and log out.

## Features

### User Authentication
- **Sign Up**: Users can create an account.
- **Sign In**: Users can log in to their account.
- **Logout**: Users can log out from their account.

### Tweeting
- **Post Tweets**: Users can post tweets containing text, images, or videos.
- **View Own Tweets**: Users can view their own tweets on their profile.
- **Retweet**: Users can retweet posts from other users.
- **Like**: Users can like posts from other users.
- **Restrictions**: Users cannot like or retweet their own posts.

### Profile Management
- **Edit Profile**: Users can update their profile picture, username, bio, and other details.
- **View Other Profiles**: Users can view profiles of other users.
- **Follow/Unfollow**: Users can follow or unfollow other users.

### Dashboard
- **Home Feed**: Users can see all tweets on their home feed.
- **Dashboard**: Users can access their dashboard by clicking on their profile image.

## Getting Started

### Prerequisites

- PHP >= 7.4
- Composer
- Node.js & NPM
- Laravel CLI
- MySQL

### Installation

1. **Clone the repository**:

    ```bash
    git clone https://github.com/your-username/clone-twitter.git
    cd clone-twitter
    ```

2. **Install dependencies**:

    ```bash
    composer install
    npm install
    ```

3. **Create a copy of the `.env` file**:

    ```bash
    cp .env.example .env
    ```

4. **Generate an application key**:

    ```bash
    php artisan key:generate
    ```

5. **Configure your database** in the `.env` file:

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your_database
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

6. **Run database migrations**:

    ```bash
    php artisan migrate
    ```

7. **Run database seeders** (if any):

    ```bash
    php artisan db:seed
    ```

8. **Start the local development server**:

    ```bash
    php artisan serve
    ```

### Running the Application

Visit `http://localhost:8000` in your browser to see the application in action.

## Usage

1. **Sign Up**: Create a new account by providing a username, email, and password.
2. **Sign In**: Log in to your account using your credentials.
3. **Post Tweets**: Create tweets with text, images, or videos.
4. **Edit Profile**: Update your profile picture, username, bio, and other details.
5. **Follow Users**: Follow other users to see their tweets in your home feed.
6. **Interact with Tweets**: Like and retweet tweets from other users.
7. **Dashboard**: Access your dashboard by clicking on your profile image.
8. **Logout**: Log out from your account.

## Contributing

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Make your changes.
4. Commit your changes (`git commit -m 'Add some feature'`).
5. Push to the branch (`git push origin feature-branch`).
6. Open a pull request.

## License

This project is open-sourced software licensed under the MIT license.

## Contact

If you have any questions or suggestions, feel free to contact me at vikas.kumar@example.com.

---

*This is a clone of Twitter built for learning and demonstration purposes only.*
