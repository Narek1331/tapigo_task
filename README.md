# Tapigo API Service

This is a RESTful API service for managing posts.

## Setup and Run

1. **Clone Repository:** Clone this repository to your local machine.

2. **Install Docker:** Ensure Docker is installed on your machine.

3. **Build Docker Image:**

    ```bash
    docker-compose build
    ```

4. **Run Docker Containers:**

    ```bash
    docker-compose up -d
    ```

5. **Access API:** The API will be accessible at `http://localhost/api/posts`.

## API Endpoints

### 1. Get Posts

- **URL:** `/api/posts`
- **Method:** `GET`
- **Description:** Retrieves a list of all posts.
- **Response:** Array of post objects.

### 2. Get Post by ID

- **URL:** `/api/posts/{post_id}`
- **Method:** `GET`
- **Description:** Retrieves a specific post by its ID.
- **Parameters:**
  - `{post_id}`: ID of the post to retrieve.
- **Response:** Post object.

### 3. Create Post

- **URL:** `/api/posts`
- **Method:** `POST`
- **Description:** Creates a new post.
- **Body:** JSON object containing `title` and `content`.
- **Response:** Newly created post object.

### 4. Update Post by ID

- **URL:** `/api/posts/{post_id}`
- **Method:** `PUT`
- **Description:** Updates an existing post by its ID.
- **Parameters:**
  - `{post_id}`: ID of the post to update.
- **Body:** JSON object containing updated `title` and/or `content`.
- **Response:** Updated post object.

### 5. Delete Post by ID

- **URL:** `/api/posts/{post_id}`
- **Method:** `DELETE`
- **Description:** Deletes a post by its ID.
- **Parameters:**
  - `{post_id}`: ID of the post to delete.
- **Response:** No content.

